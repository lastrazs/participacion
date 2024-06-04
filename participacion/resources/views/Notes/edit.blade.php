@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Editar Nota</h1>
    <form action="{{ route('notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $note->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $note->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select name="category_id" class="form-control" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $note->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
