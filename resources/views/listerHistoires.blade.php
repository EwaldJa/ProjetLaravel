@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')

    <div class="row mt-5 ml-0 mr-2">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <div class="card mt-3 mb-3" style="width: 25em">
                <div class="card-body">
                    <h1 class="card-title">Notre histoire</h1>
                </div>
            </div>
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
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{{ $histoire->getParagrapheHistoire() }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection