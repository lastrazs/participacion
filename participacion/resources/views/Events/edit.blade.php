<!DOCTYPE html>
<html>
<head>
    <title>Editar Evento</title>
</head>
<body>
    <h1>Editar Evento</h1>
    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Título</label>
        <input type="text" name="title" id="title" value="{{ $event->title }}" required>
        <br>
        <label for="description">Descripción</label>
        <textarea name="description" id="description">{{ $event->description }}</textarea>
        <br>
        <label for="start_time">Hora de Inicio</label>
        <input type="datetime-local" name="start_time" id="start_time" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required>
        <br>
        <label for="end_time">Hora de Fin</label>
        <input type="datetime-local" name="end_time" id="end_time" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required>
        <br>
        <button type="submit">Actualizar Evento</button>
    </form>
</body>
</html>
