@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')
    <div class="row mt-2">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Nos prestations</h1>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('contenu')
    <div class="row mt-2">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="d-none">{{$i = 0}}</div>
            @foreach ($lesServices as $service)
                <div class="row">
                        @if ($service->getLesImages())
                            <div class="d-none">{{$i = $i + 1}}</div>
                            @if ( ($i%2) == 0)
                                <div class="col-sm-12 col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $service->getIntituleService() }}</h5>
                                            <p class="card-text">{{ $service->getDescriptionService() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-3">
                                    <img src="{{ ($service->getLesImages())[0]->getLienImage() }}" class="img-fluid" alt="Responsive image">
                                </div>
                            @endif
                        @else
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $service->getIntituleService() }}</h5>
                                        <p class="card-text">{{ $service->getDescriptionService() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                 </div>
            @endforeach
        </div>
    </div>
@endsection