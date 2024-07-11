@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
    <div class="container mx-auto max-w-3xl">
        <h1 class="text-3xl font-semibold mb-6">Editar Producto</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops! Hubo algunos errores:</strong>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="editForm" action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nombre del Producto</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Nombre del Producto" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="currency" class="block text-sm font-bold text-gray-700 mb-2">Moneda</label>
                <select name="currency" id="currency" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-3 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="$">Dólar ($)</option>
                    <option value="€">Euro (€)</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-bold text-gray-700 mb-2">Precio del Producto</label>
                <div class="relative">
                    <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="Precio del Producto" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <span id="currencySymbol" class="text-gray-500"></span>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Descripción del Producto</label>
                <textarea id="description" name="description" placeholder="Descripción del Producto"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32 resize-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" id="editButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar Producto
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            const currencySelect = document.querySelector('#currency');
            const currencySymbol = document.querySelector('#currencySymbol');
            const initialCurrency = '{{ $product->currency }}'; // Moneda inicial del producto

            currencySelect.value = initialCurrency;
            currencySymbol.textContent = initialCurrency;

            currencySelect.addEventListener('change', function () {
                currencySymbol.textContent = currencySelect.value;
            });

          
            const form = document.querySelector('#editForm');
            const editButton = document.querySelector('#editButton');

            form.addEventListener('submit', function () {
                editButton.textContent = 'Actualizando...';
                editButton.disabled = true;
            });
        });
    </script>
@endsection

