@extends('layouts.app')

@section('content')

<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Shop</h2>
            <p class="text-gray-600 mt-2">Temukan produk terbaik untuk kebutuhanmu</p>
        </div>

        <!-- Alerts -->
        @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $p)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Product Image -->
                <div class="h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                    @if($p->image)
                    <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @else
                    <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="p-5">
                    <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $p->name }}</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-3">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-500">Stok: 
                            <span class="font-medium {{ $p->stock > 0 ? 'text-green-600' : 'text-red-600' }}">{{ $p->stock }}</span>
                        </span>
                    </div>

                    <!-- Buy Form -->
                    <form action="/checkout" method="POST" class="space-y-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $p->id }}">
                        <div class="flex items-center space-x-2">
                            <input type="number" name="qty" min="1" max="{{ $p->stock }}" value="1" required
                                class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" 
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center space-x-2"
                                {{ $p->stock < 1 ? 'disabled' : '' }}>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Beli</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        @if($products->isEmpty())
        <div class="text-center py-12">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <p class="text-gray-500 text-lg">Belum ada produk tersedia</p>
        </div>
        @endif
    </div>
</div>

@endsection