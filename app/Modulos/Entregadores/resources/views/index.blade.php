<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/owlcarousel/owl.carousel.min.css') }} />
    <link rel="stylesheet" href={{ asset('css/owlcarousel/owl.theme.default.min.css') }} />

    <title>Entregadores</title>
</head>

<body>

    <div class="container">
        @foreach ($users as $value)
            <div class="col-md-3 m-t-10">
                <div class="categories_box"> <a href="#">
                        <img src="images/Categories/categories3.png" alt="{{ $value }}" /></a>
                    <div class="overlay text-center"> <a href="#">
                            <img src="" alt="{{ $value->nome }}" />
                            <p> {{ $value->nome }}</p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
