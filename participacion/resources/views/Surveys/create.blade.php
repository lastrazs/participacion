<!DOCTYPE html>
<html>
<head>
    <title>Crear Encuesta</title>
</head>
<body>
    <h1>Crear Nueva Encuesta</h1>
    <form action="{{ route('surveys.store') }}" method="POST">
        @csrf
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <button type="submit">Crear Encuesta</button>
    </form>
</body>
</html>
