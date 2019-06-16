@extends('template')

@section('titrePage')
    Liste des conférences
@endsection

@section('titreItem')
    <h1>Les conférences</h1>
@endsection

@section('contenu')
    @foreach ($lesConferences as $conference)
        <conference>
                <h2><a href="{{ url('/Conference') }}/{{ $conference->getIdConf() }}">{{ $conference->getIdConf() }} {{ $conference->getIntituleConf() }}</a></h2>
                <p>{{ $conference->getDescriptionConf() }}</p>
        </conference>
    @endforeach
@endsection