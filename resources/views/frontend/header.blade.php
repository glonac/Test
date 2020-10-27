<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/13b4fcb406.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <title>TEST</title>
    <nav class="navbar navbar-expand-md navbar-dark site-header border-bottom ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
        </button>
        <div class="navbar-collapse ju collapse show " id="navbarCollapse">
            <ul class="navbar-nav mr-auto container justify-content-between ">
                <li class="nav-item active">
                    <a class="p-2 nav-link d-md-inline-block nav-item" href="test">Тест</a>
                </li>
                <li class="nav-item active">
                    <a class="p-2 nav-link d-md-inline-block nav-item" href="check">Проверка</a>
                </li>
                <li class="nav-item active  ">
                    <a class="p-2 nav-link d-md-inline-block  nav-item" href="log">Личный кабинет</a>
                </li>
            </ul>
        </div>
    </nav>

</head>
<body>
<div class="container-fluid ">
    @yield('log')
    @yield('section-main')
    @yield('test')
    @yield('check')
    @yield('trening')
    @yield('auto')
    @yield('register')
</div>
</body>
<footer id="footer">
    <div class="row ml-0 mr-0 pt-4 pb-4">
        <div class="col-12 text-white">
            Footer
        </div>
    </div>
</footer>
</html>

