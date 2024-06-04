@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->content }}</p>
    <p><strong>Categoría:</strong> {{ $note->category->name }}</p>
    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
