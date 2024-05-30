<!DOCTYPE html>
<html>
<head>
    <title>Crear Evento</title>
</head>
<body>
    <h1>Crear Nuevo Evento</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="start_time">Hora de Inicio</label>
        <input type="datetime-local" name="start_time" id="start_time" required>
        <br>
        <label for="end_time">Hora de Fin</label>
        <input type="datetime-local" name="end_time" id="end_time" required>
        <br>
        <button type="submit">Crear Evento</button>
    </form>
</body>
</html>
