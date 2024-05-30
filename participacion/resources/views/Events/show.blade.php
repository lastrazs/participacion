<!DOCTYPE html>
<html>
<head>
    <title>{{ $event->title }}</title>
</head>
<body>
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->description }}</p>
    <p>Desde: {{ $event->start_time }}</p>
    <p>Hasta: {{ $event->end_time }}</p>
    <a href="{{ route('events.edit', $event) }}">Editar Evento</a>
    <form action="{{ route('events.destroy', $event) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Evento</button>
    </form>

    <h2>Reservas</h2>
    <form action="{{ route('reservations.store', $event) }}" method="POST">
        @csrf
        <label for="user_name">Nombre</label>
        <input type="text" name="user_name" id="user_name" required>
        <br>
        <label for="user_email">Email</label>
        <input type="email" name="user_email" id="user_email" required>
        <br>
        <button type="submit">Reservar</button>
    </form>
    <ul>
        @foreach ($event->reservations as $reservation)
            <li>{{ $reservation->user_name }} ({{ $reservation->user_email }})</li>
        @endforeach
    </ul>
</body>
</html>
