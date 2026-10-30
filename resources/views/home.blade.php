@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section class="hero">
        <p class="eyebrow">Laboratorio ClonVercel</p>
        <h1>{{ $metadata['name'] }}</h1>
        <p class="lead">
            Aplicación Laravel mínima para validar detección PHP/Laravel,
            instalación con Composer, variables de entorno y ejecución en contenedores.
        </p>
    </section>

    <section class="panel">
        <h2>Metadatos del despliegue</h2>
        <dl class="meta-grid">
            <div>
                <dt>Nombre</dt>
                <dd>{{ $metadata['name'] }}</dd>
            </div>
            <div>
                <dt>Versión</dt>
                <dd>{{ $metadata['version'] }}</dd>
            </div>
            <div>
                <dt>Framework</dt>
                <dd>{{ $metadata['framework'] }} {{ $metadata['framework_version'] }}</dd>
            </div>
            <div>
                <dt>Rama Git</dt>
                <dd>{{ $metadata['git_branch'] }}</dd>
            </div>
            <div>
                <dt>Commit</dt>
                <dd class="mono">{{ $metadata['git_commit'] }}</dd>
            </div>
            <div>
                <dt>Fecha del despliegue</dt>
                <dd>{{ $metadata['deployed_at'] }}</dd>
            </div>
        </dl>
    </section>

    <section class="actions">
        <a class="button" href="{{ route('products.index') }}">Ver productos</a>
        <a class="button button-secondary" href="{{ url('/api/health') }}">API Health</a>
    </section>
@endsection
