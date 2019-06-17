@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')
    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <h1 class=" mt-3 mb-3">Les secteurs d'activité de nos clients</h1>
        </div>
    </div>
@endsection


@section('contenu')
    <div class="row mt-2 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <div class="d-none">{{$i = 0}}</div>
            @foreach ($lesSecteursActivite as $secteurActivite)
                <div class="row">
                    @if ($secteurActivite->getLesImages() != null)
                        <div class="d-none">{{$i = $i + 1}}</div>
                        @if ( ($i%2) != 0)
                            <div class="col-sm-12 col-md-9 col-lg-8 mt-3 mb-3">
                                <div class="card" style="height: auto">
                                    <div class="card-body">
                                        @auth
                                            {!! Form::open(['url' => 'modifPrestation']) !!}
                                            <div class="form-group {!! $errors->has('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::text('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getIntituleSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                {!! $errors->first('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::textarea ('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getDescriptionSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                {!! $errors->first('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::text('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), ($secteurActivite->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                {!! $errors->first('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::hidden('id_SecteurActivite', $secteurActivite->getIdSecteurActivite()) }}
                                            </div>
                                            {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                            {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
                                            {!! Form::close() !!}
                                        @else
                                            <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                            <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-4 mt-3 mb-3">
                                <img src="{{ ($secteurActivite->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                                @auth
                                    {!! Form::open(['url' => 'supprImagePresta']) !!}
                                    <div class="form-group">
                                        {{ Form::hidden('id_Image', ($secteurActivite->getLesImages())[0]->getIdImage()) }}
                                    </div>
                                    {!! Form::submit('Supprimer l\'image', ['class' => 'btn btn-danger pull-right']) !!}
                                    {!! Form::close() !!}
                                @endauth
                            </div>
                        @else
                            <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-4 mt-3 mb-3">
                                <img src="{{ ($secteurActivite->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                                @auth
                                    {!! Form::open(['url' => 'supprImagePresta']) !!}
                                    <div class="form-group">
                                        {{ Form::hidden('id_Image', ($secteurActivite->getLesImages())[0]->getIdImage()) }}
                                    </div>
                                    {!! Form::submit('Supprimer l\'image', ['class' => 'btn btn-danger pull-right']) !!}
                                    {!! Form::close() !!}
                                @endauth
                            </div>
                            <div class="col-sm-12 col-md-9 col-lg-8 mt-3 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        @auth
                                            {!! Form::open(['url' => 'modifPrestation']) !!}
                                            <div class="form-group {!! $errors->has('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::text('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getIntituleSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                {!! $errors->first('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::textarea ('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getDescriptionSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                {!! $errors->first('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                                {!! Form::text('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), ($secteurActivite->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                {!! $errors->first('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::hidden('id_SecteurActivite', $secteurActivite->getIdSecteurActivite()) }}
                                            </div>
                                            {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                            {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
                                            {!! Form::close() !!}
                                        @else
                                            <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                            <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
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
                                        <div class="form-group {!! $errors->has('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                            {!! Form::text('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getIntituleSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                            {!! $errors->first('intitule_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="form-group {!! $errors->has('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                            {!! Form::textarea ('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), $secteurActivite->getDescriptionSecteurActivite(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                            {!! $errors->first('description_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="form-group {!! $errors->has('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite()) ? 'has-error' : '' !!}">
                                            {!! Form::text('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), null, ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                            {!! $errors->first('image_SecteurActivite'.$secteurActivite->getIdSecteurActivite(), '<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::hidden('id_SecteurActivite', $secteurActivite->getIdSecteurActivite()) }}
                                        </div>
                                        {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                        {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
                                        {!! Form::close() !!}
                                    @else
                                        <h5 class="card-title">{{ $secteurActivite->getIntituleSecteurActivite() }}</h5>
                                        <p class="card-text">{{ $secteurActivite->getDescriptionSecteurActivite() }}</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
            @auth
                <div class="row">
                    <div class="col-sm-12 mt-3 mb-3">
                        <div class="card" style="height: auto">
                            <div class="card-body">
                                {!! Form::open(['url' => 'ajoutPrestation']) !!}
                                <div class="form-group {!! $errors->has('intitule_SecteurActivite') ? 'has-error' : '' !!}">
                                    {!! Form::text('intitule_SecteurActivite', null, ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                    {!! $errors->first('intitule_SecteurActivite', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {!! $errors->has('description_SecteurActivite') ? 'has-error' : '' !!}">
                                    {!! Form::textarea ('description_SecteurActivite', null, ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                    {!! $errors->first('description_SecteurActivite', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group {!! $errors->has('image_SecteurActivite') ? 'has-error' : '' !!}">
                                    {!! Form::text('image_SecteurActivite', null, ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                    {!! $errors->first('image_SecteurActivite', '<small class="help-block">:message</small>') !!}
                                </div>
                                {!! Form::submit('Ajouter la prestation', ['class' => 'btn btn-info pull-right']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
@endsection