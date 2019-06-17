@extends('template')

@section('titrePage')
    Implantation
@endsection

@section('titreItem')
    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <h1 class=" mt-3 mb-3">Notre implantation</h1>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row mt-2 sansmarge">
        <div class="d-sm-block col-sm-12 d-md-none d-lg-none d-xl-none">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1JfQyhl3HjNOg01e3hSgraLyhoIZpsYVY" width="100%" class="map" style="height: 40vh"></iframe>
        </div>
        <div class="d-none d-md-block col-md-10 offset-md-1 d-lg-none d-xl-none">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1JfQyhl3HjNOg01e3hSgraLyhoIZpsYVY" width="100%" class="map" style="height: 50vh"></iframe>
        </div>
        <div class="d-none d-md-none d-lg-block col-lg-8 offset-lg-2 d-xl-none">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1JfQyhl3HjNOg01e3hSgraLyhoIZpsYVY" width="100%" class="map" style="height: 60vh"></iframe>
        </div>
        <div class="d-none d-md-none d-lg-none d-xl-block col-xl-8 offset-xl-2">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1JfQyhl3HjNOg01e3hSgraLyhoIZpsYVY" width="100%" class="map" style="height: 65vh"></iframe>
        </div>
    </div>
@endsection