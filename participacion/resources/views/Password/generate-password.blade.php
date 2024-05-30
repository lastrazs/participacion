<!DOCTYPE html>
<html>
<head>
    <title>Generar Contraseña</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <button id="generate-password">Generar Contraseña</button>
    <p id="password"></p>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#generate-password').click(function(){
                $.ajax({
                    url: '{{ route('generate-password') }}',
                    method: 'POST',
                    data: {
                        length: 16,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        $('#password').text(response.password);
                    }
                });
            });
        });
    </script>
</body>
</html>
