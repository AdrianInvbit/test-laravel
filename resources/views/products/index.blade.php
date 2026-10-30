@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <section class="page-intro">
        <h1>Productos</h1>
        <p>Catálogo ficticio definido en PHP (sin base de datos).</p>
    </section>

    <ul class="product-list">
        @foreach ($products as $product)
            <li class="product-item">
                <div>
                    <p class="category">{{ $product['category'] }}</p>
                    <h2>
                        <a href="{{ route('products.show', $product['id']) }}">{{ $product['name'] }}</a>
                    </h2>
                    <p>{{ $product['description'] }}</p>
                </div>
                <div class="product-meta">
                    <p class="price">{{ number_format($product['price'], 2, ',', '.') }} €</p>
                    <a class="button button-small" href="{{ route('products.show', $product['id']) }}">Detalle</a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
