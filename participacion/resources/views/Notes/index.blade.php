@extends('layouts.app')

@section('content')
<h1>Notas</h1>
<a href="{{ route('notes.create') }}" class="btn btn-primary mb-3">Crear Nota</a>

<form action="{{ route('notes.index') }}" method="GET" class="form-inline mb-3">
    <div class="form-group">
        <select name="category_id" class="form-control">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(request('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-secondary ml-2">Filtrar</button>
    </div>
</form>

<ul class="list-group">
    @foreach($notes as $note)
        <li class="list-group-item">
            <h5>{{ $note->title }}</h5>
            <p>{{ $note->content }}</p>
            <small>Categoria: {{ $note->category->name }}</small>
            <div class="mt-2">
                <a href="{{ route('notes.show', $note->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
@endsection
