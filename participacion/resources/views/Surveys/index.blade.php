<!DOCTYPE html>
<html>
<head>
    <title>Encuestas</title>
</head>
<body>
    <h1>Encuestas</h1>
    <a href="{{ route('surveys.create') }}">Crear Nueva Encuesta</a>
    <ul>
        @foreach ($surveys as $survey)
            <li><a href="{{ route('surveys.show', $survey) }}">{{ $survey->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>
