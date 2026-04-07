@extends('layouts.adopter.app')

@section('title', 'Productos | SDAANIM')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/shared/products.css') }}">
@endsection

@section('content')
<section class="adopta-section">
    <h2>Productos</h2>
    <p>Encuentra accesorios o alimento para tu amigo animal apoyando al refugio.</p>

    <div class="adopta-grid">
        @forelse($products as $product)
            <div class="adopta-card">
                <img src="{{ asset('img/' . ($product->prod_imagen ?? 'placeholder.jpg')) }}" alt="{{ $product->prod_nombre }}">
                <h3>{{ $product->prod_nombre }}</h3>
                <p><strong>Categoría:</strong> {{ $product->prod_categoria }}</p>
                <p><strong>Precio:</strong> ${{ number_format($product->prod_precio, 0, ',', '.') }}</p>
                <p><strong>Stock:</strong> {{ $product->prod_cantidad }}</p>
                <a href="#" class="buy-btn">🛒 Comprar</a>
            </div>
        @empty
            <p>No hay productos registrados actualmente 🐾</p>
        @endforelse
    </div>
</section>
@endsection
