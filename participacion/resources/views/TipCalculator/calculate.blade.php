<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Propinas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Calculadora de Propinas</h1>
        <form action="/calculate" method="POST">
            @csrf
            <div class="form-group">
                <label for="total_amount">Monto Total de la Cuenta</label>
                <input type="text" class="form-control" id="total_amount" name="total_amount" required>
            </div>
            <div class="form-group">
                <label for="tip_percentage">Porcentaje de Propina</label>
                <input type="text" class="form-control" id="tip_percentage" name="tip_percentage" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        @isset($totalAmount)
            <div class="mt-4">
                <p><strong>Monto Total de la Cuenta:</strong> ${{ number_format($totalAmount, 2) }}</p>
                <p><strong>Porcentaje de Propina:</strong> {{ $tipPercentage }}%</p>
                <p><strong>Monto de Propina:</strong> ${{ number_format($tipAmount, 2) }}</p>
                <p><strong>Total con Propina:</strong> ${{ number_format($totalWithTip, 2) }}</p>
            </div>
        @endisset
    </div>
</body>
</html>
