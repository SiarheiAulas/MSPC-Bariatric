<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author", content="Siarhei Aulas">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MSPC Bariatric Center</title>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Своя CSS-->
        <link rel="stylesheet" href="{{asset('css/my.css')}}">
        <!--ChartJS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="conteiner">
            <main>
                <div class="col-md-7 col-lg-12">
                    @yield('content')
                </div>
            </main>
        </div>
    </body>
</html>
