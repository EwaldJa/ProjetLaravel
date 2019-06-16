@extends('template')

@section('titrePage')
    Liste des services
@endsection

@section('titreItem')
    <h1>Nos services</h1>
@endsection

@section('contenu')
    @foreach ($lesServices as $service)
        <service>
                <h2><a href="{{ url('Service') }}/{{ $service->getIdService() }}">{{ $service->getIdService() }} {{ $service->getIntituleService() }}</a></h2>
                <p>{{ $service->getDescriptionService() }}</p>
        </service>
    @endforeach
@endsection