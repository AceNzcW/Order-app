<?php

namespace App\Http\Controllers;

use App\Events\OrderStatusUpdated;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;   

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request) {
        $order = new Order();
        $order->customer_name = $request->input('customer_name');
        $order->total_price = 0;
        $order->status = 'Dibuat';
        $order->save();
    
        $total_price = 0;
    
        foreach($request->input('menu_id', []) as $key => $menu_id) {
            $menu = Menu::find($menu_id);
            $quantity = $request->input('quantity')[$key] ?? 1;
    
            // Hanya tambahkan jika menu dan quantity valid
            if ($menu && $quantity > 0) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->menu_id = $menu_id;
                $orderItem->quantity = $quantity;
                $orderItem->price = $menu->price * $quantity;
                $orderItem->save();
    
                $total_price += $orderItem->price;
            }
        }
    
        $order->total_price = $total_price;
        $order->save();
    
        return redirect()->route('orders.index')->with('success', 'Pemesanan berhasil dibuat');
    }
    

    public function updateStatus(Request $request, $id){

        $order = order::find($id);
        $order->status = $request->input('status');
        $order->save();

        //Memicu event setelah status diperbarui
        event(new OrderStatusUpdated($order));

        return redirect()->route('admin.index')->with('success', 'status pemesanan berhasil diperbarui');
    }
}
