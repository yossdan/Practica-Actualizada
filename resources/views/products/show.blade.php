@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $product->description }}</p>
            <p><strong>Precio:</strong> {{ $product->price }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection
