@extends('template')

@section('titrePage')
    Liste des formations
@endsection

@section('titreItem')
    <h1>Les Formations</h1>
@endsection

@section('contenu')
    @foreach ($lesFormations as $formation)
        <formation>
            <h2>{{ $formation->getIdForm() }} {{ $formation->getIntituleForm() }}</h2>
            <p>{{ $formation->getDescriptionForm() }}</p>
        </formation>
    @endforeach
@endsection