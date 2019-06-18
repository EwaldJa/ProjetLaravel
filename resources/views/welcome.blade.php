<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Limpilux</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
        <!-- Styles -->
        <style>
            html, body {
                background-color: #eeeee0;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content, .foot {
                text-align: center;
            }


            .title {
                font-size: 84px;
            }

            .links a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 40px;
            }

            .foot p {
                margin-top: 0px;
                margin-bottom: 0px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref" >
            @if (Route::has('login'))
                <div class="top-right links login">
                    @auth
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content mt-5 pt-5" >
                <div class="title ">
                    <img src="Images/ImageCoordonnee/logo_ombre_transparent.png" class="img-fluid rounded" alt="Logo entreprise manquant" width="80%">
                </div>
                <div class="links mt-5 m-b-md">
                        Nettoyage et entretien de locaux à Paris et Ile de France
                </div>
                <div class="links m-b-md row">
                    <a class="col-md-2 mt-2" href="{{ url('/prestations') }}">Prestations</a>

                     <a class=" col-md-2 mt-2" href="{{ url('/secteurs') }}">Secteurs d'activité</a>

                    <a class="col-md-2 mt-2" href="{{ url('/histoire') }}">Histoire</a>

                    <a  class="col-md-2 mt-2" href="{{ url('/engagements') }}">Engagements</a>

                     <a class="col-md-2 mt-2" href="{{ url('/contact') }}">
                        @auth Demandes de contact
                        @else Nous contacter
                        @endauth
                    </a>
                    <a class="col-md-2 mt-1"  href="{{ url('/implantation') }}">
                        Implantation
                        <!--   <img src="Images/ImageCoordonnee/logoLoc.png" class="img-fluid rounded" alt="Logo Maps manquant" style="max-height: 50px"> -->
                    </a>
                <!--    <a href="{{ url('/home') }}">Recrutement</a> -->
                </div>

              </div>

          </div>
          <div class="flex-center mt-5 pt-5">
              <div class="foot row">
                  <p class="flex-center col-sm-12">Tel : 0820 205 122</p>
                  <p class="flex-center col-sm-12">14 avenue de l’Opéra 75001 PARIS</p>
                  <p class="flex-center col-sm-12">1 Place Paul Verlaine 92100 BOULOGNE BILLANCOURT</p>
                  <p class="flex-center col-sm-12">Copyright © Limpilux 2019</p>
                  <p class="flex-center col-sm-12">Tous droits réservés</p>
              </div>
          </div>
      </body>
  </html>
