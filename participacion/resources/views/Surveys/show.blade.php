<!DOCTYPE html>
<html>
<head>
    <title>{{ $survey->title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>{{ $survey->title }}</h1>
    <p>{{ $survey->description }}</p>
    <a href="{{ route('questions.create', $survey) }}">Agregar Pregunta</a>

    <h2>Preguntas</h2>
    <form action="{{ route('responses.store', $survey) }}" method="POST">
        @csrf
        @foreach ($survey->questions as $question)
            <div>
                <label>{{ $question->text }}</label>
                <input type="text" name="responses[{{ $question->id }}]" required>
            </div>
        @endforeach
        <button type="submit">Enviar Respuestas</button>
    </form>

    <h2>Respuestas</h2>
    @foreach ($survey->questions as $question)
        <div>
            <h3>{{ $question->text }}</h3>
            <canvas id="chart-{{ $question->id }}"></canvas>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('chart-{{ $question->id }}').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: @json($question->responses->pluck('answer')),
                            datasets: [{
                                label: 'Respuestas',
                                data: @json($question->responses->countBy('answer').values()),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
    @endforeach
</body>
</html>
