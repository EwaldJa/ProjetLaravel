<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/formaweb.css') !!}
    <title>@yield('titrePage')</title>
</head>
<body>

<nav class="d-block navbar navbar-expand-lg grey-text static-top" style= "background-color: #eee;">
    <div class="container-fluid">

        <a class="navbar-brand" style="width:30%; min-width: 300px;" href="{{url('/home')}}" ><img src="Images/ImageCoordonnee/logo_ombre_transparent.png" class="img-fluid rounded" alt="Logo manquant"></a>
        <button class="navbar-toggler" type="button" style="width:30%; max-width: 100px;" data-toggle="collapse" data-target="#LimpiluxNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="Images/hamburger_menu.png" class="img-fluid float-right"  alt="Menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="LimpiluxNavbar">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link red-text" href="{{url('/accueil')}}">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/prestations')}}">Prestations
                        <span class="sr-only">(current)</span>
                    </a>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/secteurs')}}">Secteurs d'activité
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Qui sommes nous ?
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbardrop" style= "background-color: #d1cece; color: #fa4040 ">
                        <a class="dropdown-item" href="{{url('/histoire')}}">Notre histoire</a>
                        <a class="dropdown-item" href="{{url('/engagements')}}">Nos engagements</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/contact')}}">Contact
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/recrutement')}}">Recrutement
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<header>

    @yield('titreItem')

</header>

@yield('contenu')

<footer class="footer mt-5" style="background-color: #eee">
    <p class="mb-0">Tel : 0820 205 122</p>
    <p class="mb-0">Copyright © Limpilux 2019 - Tous droits réservés</p>
</footer>
{!! Html::script('lib/jquery/jquery-3.3.1.slim.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
{!! Html::script('lib/js/bootstrap.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
</body>
</html>