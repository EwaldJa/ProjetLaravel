@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')
    <div class="row mt-5">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="card" style="width: 25em">
                <div class="card-body">
                    <h1 class="card-title">Nos secteurs d'activité</h1>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('contenu')
    <div class="row mt-2">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="d-none">{{$i = 0}}</div>
            @foreach ($lesSecteursActivite as $secteurActivite)
                <div class="row">
                    @if ($secteurActivite->getLesImages() != null)
                        <div class="d-none">{{$i = $i + 1}}</div>
                        @if ( ($i%2) != 0)
                            <div class="col-sm-12 col-md-9 col-lg-8">
                                <div class="card" style="height: auto">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                        <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-3">
                                <img src="{{ ($secteurActivite->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                            </div>
                        @else
                            <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-3">
                                <img src="{{ ($secteurActivite->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                            </div>
                            <div class="col-sm-12 col-md-9 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                        <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                    <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection