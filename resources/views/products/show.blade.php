@extends('layouts.app')

@section('title', $product['name'])

@section('content')
    <section class="page-intro">
        <p class="category">{{ $product['category'] }}</p>
        <h1>{{ $product['name'] }}</h1>
        <p>{{ $product['description'] }}</p>
    </section>

    <section class="panel">
        <dl class="meta-grid">
            <div>
                <dt>Identificador</dt>
                <dd>{{ $product['id'] }}</dd>
            </div>
            <div>
                <dt>Categoría</dt>
                <dd>{{ $product['category'] }}</dd>
            </div>
            <div>
                <dt>Precio</dt>
                <dd class="price">{{ number_format($product['price'], 2, ',', '.') }} €</dd>
            </div>
        </dl>
    </section>

    <section class="actions">
        <a class="button" href="{{ route('products.index') }}">Volver al listado</a>
    </section>
@endsection
