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
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1JfQyhl3HjNOg01e3hSgraLyhoIZpsYVY" width="100%" style="height: 25em"></iframe>
        </div>
    </div>
@endsection