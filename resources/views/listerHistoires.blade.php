@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')
    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <h1 class=" mt-3 mb-3">Notre histoire</h1>
        </div>
    </div>

@endsection

@section('contenu')
    <div class="row mt-2 ml-0 mr-2">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <div class="d-none">{{$i = 0}}</div>
            @foreach ($lesHistoires as $histoire)
                <div class="row">

                    <div class="col-sm-12 mt-3 mb-3">
                        <p class="card-text">{{ $histoire->getParagrapheHistoire() }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection