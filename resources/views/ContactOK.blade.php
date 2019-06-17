@extends('template')

@section('titrePage')
    Contact OK
@endsection

@section('titreItem')
    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <h1 class=" mt-3 mb-3">Validation</h1>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row mt-2 sansmarge">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="card" style="width: 100%">
                <div class="card-header">
                    Votre message a bien été transmis à nos équipes ! Merci pour l'intérêt que vous portez à notre entreprise. Récapitulatif de votre message :
                </div>
                <div class="card-body">
                    <h5 class="card-title">Objet : {{$leContact->getObjetContact()}}</h5>
                    <p class="card-text">{{$leContact->getMessageContact()}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Coordonnées de l'entreprise {{$leContact->getSocieteContact()}} : </li>
                        <li class="list-group-item">{{$leContact->getPrenomContact()}} {{$leContact->getNomContact()}}</li>
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