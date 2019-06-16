@extends('template')

@section('titrePage')
    Les commentaires de la conférence
@endsection

@section('titreItem')
    <h1>Commentaires :</h1>
@endsection

@section('contenu')
    <h2>{{$laConference->getIntituleConf()}}</h2>
    <p>{{$laConference->getDescriptionConf()}}</p>
    <h3>Commentaires :</h3>
    @if($lesCommentaires)
        @foreach ($lesCommentaires as $commentaire)
            <commentaire>
                <h2>{{ $commentaire->getAuteurCom()->getAuthIdentifierName() }}</h2>
                <p>{{ $commentaire->getContenuCom() }}</p>
            </commentaire>
        @endforeach
    @else
        <strong>Pas de commentaire enregistré</strong>
    @endif
    <h3>Ajouter un commentaire</h3>
    @auth
        La fonctionnalité sera bientôt fonctionnelle !
    @else
        <a href="{{ route('login') }}">Se connecter</a> pour ajouter un commentaire

    @endauth
@endsection