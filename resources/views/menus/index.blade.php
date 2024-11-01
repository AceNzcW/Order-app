@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10">
        <!-- Heading -->
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Daftar Menu</h1>

        <!-- Menu List -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <ul class="space-y-4 text-lg">
                <li class="flex justify-between items-center">
                    <span>Nasi Goreng Spesial</span>
                    <span class="font-semibold">25,000.00</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Mie Ayam</span>
                    <span class="font-semibold">20,000.00</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Es Teh Manis</span>
                    <span class="font-semibold">5,000.00</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Sate Ayam</span>
                    <span class="font-semibold">30,000.00</span>
                </li>
                <li class="flex justify-between items-center">
                    <span>Ayam Bakar</span>
                    <span class="font-semibold">35,000.00</span>
                </li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center mt-8 space-x-4">
            <a href="/orders/create" class="bg-green-500 text-white font-semibold py-2 px-6 rounded hover:bg-green-600 transition">
                Pesan
            </a>
            <a href="/order" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded hover:bg-blue-600 transition">
                Pesanan Anda
            </a>
        </div>
    </div>
@endsection
