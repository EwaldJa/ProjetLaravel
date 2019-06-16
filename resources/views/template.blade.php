<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/formaweb.css') !!}
    <title>@yield('titrePage')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg grey-text  static-top" style= "background-color: #d1cece; color: #fa4040 ">
    <div class="container">

        <a class="navbar-brand" href="{{url('/Conferences')}}">Limpilux</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link red-text" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Les services proposés
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Nos secteurs d'activité
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                        Qui sommes nous ?
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/Formations')}}">Notre histoire</a>
                        <a class="dropdown-item" href="{{url('/Formations')}}">Nos engagements</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Demande d'info
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrière
                        <span class="sr-only">(current)</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<header>
    <h1>@yield('titreItem')</h1>
</header>
@yield('contenu')

<footer class="footer">
    <p>Formaweb est un petit site web construit comme exemple de développement moderne en php</p>
</footer>
{!! Html::script('lib/jquery/jquery-3.3.1.slim.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
{!! Html::script('lib/js/bootstrap.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
</body>
</html>