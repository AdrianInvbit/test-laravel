@extends('layouts.app')

@section('title', 'No encontrado')

@section('content')
    <section class="page-intro">
        <h1>404 — Recurso no encontrado</h1>
        <p>{{ $exception->getMessage() ?: 'La página o el producto solicitado no existe.' }}</p>
    </section>

    <section class="actions">
        <a class="button" href="{{ route('home') }}">Ir al inicio</a>
        <a class="button button-secondary" href="{{ route('products.index') }}">Ver productos</a>
    </section>
@endsection
