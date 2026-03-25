@extends('layouts.adopter.app')

@section('title', 'Productos | SDAANIM')

@section('styles')
<style>
    .adopta-section { padding: 40px 20px; max-width: 1200px; margin: 0 auto; text-align: center; }
    .adopta-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 30px; }
    .adopta-card { background: white; border-radius: 10px; padding: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .adopta-card img { width: 100%; height: 180px; object-fit: cover; border-radius: 8px; }
    .buy-btn { display: inline-block; margin-top: 15px; background: #2d7d46; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; }
</style>
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
