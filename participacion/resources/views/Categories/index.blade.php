@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Categorías</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Crear Categoría</a>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <h5>{{ $category->name }}</h5>
                <div class="mt-2">
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
