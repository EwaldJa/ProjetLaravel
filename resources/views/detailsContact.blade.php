@extends('template')

@section('titrePage')
    Contact
@endsection

@section('titreItem')

    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
                <h1 class=" mt-3 mb-3">Affichage du contact n°{{ $leContact->getIdContact() }}</h1>
        </div>
    </div>

@endsection

@section('contenu')
    <div class="row mt-2 sansmarge">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="card" style="width: 100%">
                <div class="card-header">
                    Message par {{$leContact->getPrenomContact()}} {{$leContact->getNomContact()}}, de la société {{$leContact->getSocieteContact()}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Objet : {{$leContact->getObjetContact()}}</h5>
                    <p class="card-text">{{$leContact->getMessageContact()}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Coordonnées de l'entreprise :</li>
                        <li class="list-group-item">{{$leContact->getAdresseContact()}}</li>
                        <li class="list-group-item">{{$leContact->getCodepostalContact()}}</li>
                    </ul>
                </div>
                <div class="card-footer">
                    {{$leContact->getTelephoneContact()}} - {{$leContact->getEmailContact()}}
                </div>
            </div>
        </div>
    </div>
@endsection