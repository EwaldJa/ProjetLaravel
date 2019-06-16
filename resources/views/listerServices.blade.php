@extends('template')

@section('titrePage')
    Liste des services
@endsection

@section('titreItem')
    <div class="row">
        <div class="col-xs-12">

        </div>
        Nos services
    </div>
@endsection

@section('contenu')
    <div class="row">
        <div class="col-md-1 col-lg-2"></div>
        <div class="col-sm-12 col-md-10 col-lg-8">
            {{$i = 0}}
            @foreach ($lesServices as $service)
                <div class="row">
                    {{$i = $i + 1}}
                        @if ($service->getLesImages())
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