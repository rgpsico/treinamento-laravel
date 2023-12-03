<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Machine Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .slot-machine-container {
            padding-top: 20px;
        }
        .slot-machine {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .slot {
            width: 100px; /* Ajuste a largura conforme necessário */
            height: 100px; /* Ajuste a altura conforme necessário */
            margin: 5px;
            border: 2px solid #000;
            background-size: cover;
            background-position: center;
        }
        #spinButton {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container slot-machine-container">
        <h1 class="text-center">Slot Machine Game</h1>
        <div class="slot-machine">
            <!-- Slots serão gerados aqui pelo código Laravel Blade -->
            @for ($x = 0; $x < 6; $x++)
                <div class="slot" style="background-image: url('placeholder.jpg');"></div>
            @endfor
        </div>
        <button id="spinButton" class="btn btn-lg btn-success">Spin!</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $('#spinButton').click(function() {
            // Simulação de giro dos slots com imagens aleatórias
            $('.slot').each(function() {
                var randomImage = 'placeholder.jpg'; // Aqui você deverá inserir a lógica para selecionar uma imagem aleatória
                $(this).css('background-image', 'url(' + randomImage + ')');
            });
        });
    </script>
</body>
</html>
