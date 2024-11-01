@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Buat Pemesanan</h1>
        <form action="{{ route('orders.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-4">
                <label class="block text-lg font-semibold">Nama Pelanggan:</label>
                <input type="text" name="customer_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Pilih Menu:</h2>
                <div class="grid grid-cols-2 gap-4">
                @foreach($menus as $menu)
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" name="menu_id[]" value="{{ $menu->id }}" class="h-5 w-5 text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label class="text-lg">{{ $menu->name }} - {{ number_format($menu->price, 2) }}</label>
                        <label class="ml-2">Jumlah:</label>
                        <input type="number" name="quantity[]" min="1" class="w-20 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                @endforeach
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Pesan</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelectorAll('input[type="checkbox"][name="menu_id[]"]').forEach((checkbox, index) => {
            const quantityInput = document.querySelectorAll('input[type="number"][name="quantity[]"]')[index];
            
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    quantityInput.disabled = false;
                    quantityInput.value = 1; // Default quantity ke 1 saat checkbox dipilih
                } else {
                    quantityInput.disabled = true;
                    quantityInput.value = ''; // Kosongkan quantity saat checkbox tidak dipilih
                }
            });
            
            // Nonaktifkan semua input quantity saat pertama kali dimuat
            quantityInput.disabled = !checkbox.checked;
        });
    </script>
@endsection