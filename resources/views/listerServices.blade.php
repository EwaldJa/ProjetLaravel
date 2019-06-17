@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')

    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <div class="card mt-3 mb-3" style="width: 25em">
                <div class="card-body">
                    <h1 class="card-title">Nos prestations</h1>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('contenu')
        <div class="row mt-2 sansmarge">
            <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
                <div class="d-none">{{$i = 0}}</div>
                @foreach ($lesServices as $service)
                    <div class="row">
                        @if ($service->getLesImages() != null)
                            <div class="d-none">{{$i = $i + 1}}</div>
                            @if ( ($i%2) != 0)
                                <div class="col-sm-12 col-md-9 col-lg-8 mt-3 mb-3">
                                    <div class="card" style="height: auto">
                                        <div class="card-body">
                                            @auth
                                                {!! Form::open(['url' => 'modifPrestation']) !!}
                                                    <div class="form-group {!! $errors->has('intitule_Service') ? 'has-error' : '' !!}">
                                                        {!! Form::text('intitule_Service', $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                        {!! $errors->first('intitule_Service', '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group {!! $errors->has('description_Service') ? 'has-error' : '' !!}">
                                                        {!! Form::textarea ('description_Service', $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                        {!! $errors->first('description_Service', '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group {!! $errors->has('image_Service') ? 'has-error' : '' !!}">
                                                        {!! Form::text('image_Service', ($service->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                        {!! $errors->first('image_Service', '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                {!! Form::submit('Valider les modifications', ['class' => 'btn btn-info pull-right']) !!}
                                                {!! Form::close() !!}
                                            @else
                                                <h5 class="card-title">{{ $service->getIntituleService() }}</h5>
                                                <p class="card-text">{{ $service->getDescriptionService() }}</p>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-4 mt-3 mb-3">
                                    <img src="{{ ($service->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                                </div>
                            @else
                                <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-4 mt-3 mb-3">
                                    <img src="{{ ($service->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                                </div>
                                <div class="col-sm-12 col-md-9 col-lg-8 mt-3 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            @auth
                                                {!! Form::open(['url' => 'modifPrestation']) !!}
                                                <div class="form-group {!! $errors->has('intitule_Service') ? 'has-error' : '' !!}">
                                                    {!! Form::text('intitule_Service', $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                    {!! $errors->first('intitule_Service', '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="form-group {!! $errors->has('description_Service') ? 'has-error' : '' !!}">
                                                    {!! Form::textarea ('description_Service', $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                    {!! $errors->first('description_Service', '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="form-group {!! $errors->has('image_Service') ? 'has-error' : '' !!}">
                                                    {!! Form::text('image_Service', ($service->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                    {!! $errors->first('image_Service', '<small class="help-block">:message</small>') !!}
                                                </div>
                                                {!! Form::submit('Valider les modifications', ['class' => 'btn btn-info pull-right']) !!}
                                                {!! Form::close() !!}
                                            @else
                                                <h5 class="card-title">{{ $service->getIntituleService() }}</h5>
                                                <p class="card-text">{{ $service->getDescriptionService() }}</p>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="col-sm-12 mt-3 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        @auth
                                            {!! Form::open(['url' => 'modifPrestation']) !!}
                                            <div class="form-group {!! $errors->has('intitule_Service') ? 'has-error' : '' !!}">
                                                {!! Form::text('intitule_Service', $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                {!! $errors->first('intitule_Service', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('description_Service') ? 'has-error' : '' !!}">
                                                {!! Form::textarea ('description_Service', $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                {!! $errors->first('description_Service', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('image_Service') ? 'has-error' : '' !!}">
                                                {!! Form::text('image_Service', null, ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                {!! $errors->first('image_Service', '<small class="help-block">:message</small>') !!}
                                            </div>
                                            {!! Form::submit('Valider les modifications', ['class' => 'btn btn-info pull-right']) !!}
                                            {!! Form::close() !!}
                                        @else
                                                <h5 class="card-title">{{ $service->getIntituleService() }}</h5>
                                                <p class="card-text">{{ $service->getDescriptionService() }}</p>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
@endsection