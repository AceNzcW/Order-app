@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Pesanan</h1>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Nama Pelanggan</th>
                        <th class="py-3 px-6 text-left">Harga</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Update Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-semibold">
                    @foreach($orders as $order)
                    <tr class="border-b border-gray-200 hover:bg-gray-100" id="order-{{ $order->id }}">
                        <td class="py-3 px-6">{{ $order->id }}</td>
                        <td class="py-3 px-6">{{ $order->customer_name }}</td>
                        <td class="py-3 px-6">Rp {{ number_format($order->total_price, 2) }}</td>
                        <td class="py-3 px-6 status">{{ $order->status }}</td>
                        <td class="py-3 px-6">
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <select name="status" class="px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                                    <option value="Dibuat" {{ $order->status == 'Dibuat' ? 'selected' : '' }}>Dibuat</option>
                                    <option value="Diproses" {{ $order->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Dibatalkan" {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        window.Echo.channel('orders')
            .listen('OrderStatusUpdated', (e) => {
                const orderRow = document.getElementById('order-' + e.order_id);
                if (orderRow) {
                    orderRow.querySelector('.status').innerText = e.status;
                }
            });
    </script>
@endsection