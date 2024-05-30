<!DOCTYPE html>
<html>
<head>
    <title>Crear Pregunta</title>
</head>
<body>
    <h1>Crear Nueva Pregunta</h1>
    <form action="{{ route('questions.store', ['survey' => 1]) }}" method="POST">
        @csrf
        <label for="text">Pregunta</label>
        <input type="text" name="text" id="text" required>
        <button type="submit">Crear Pregunta</button>
    </form>
</body>
</html>
