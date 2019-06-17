@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')

    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
                <h1 class=" mt-3 mb-3">Nos prestations</h1>
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
                                                    <div class="form-group {!! $errors->has('intitule_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                        {!! Form::text('intitule_Service'.$service->getIdService(), $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                        {!! $errors->first('intitule_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group {!! $errors->has('description_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                        {!! Form::textarea ('description_Service'.$service->getIdService(), $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                        {!! $errors->first('description_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group {!! $errors->has('image_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                        {!! Form::text('image_Service'.$service->getIdService(), ($service->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                        {!! $errors->first('image_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ Form::hidden('id_Service', $service->getIdService()) }}
                                                    </div>
                                                {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                                {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
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
                                    @auth
                                        {!! Form::open(['url' => 'supprImagePresta']) !!}
                                        <div class="form-group">
                                            {{ Form::hidden('id_Image', ($service->getLesImages())[0]->getIdImage()) }}
                                        </div>
                                        {!! Form::submit('Supprimer l\'image', ['class' => 'btn btn-danger pull-right']) !!}
                                        {!! Form::close() !!}
                                    @endauth
                                </div>
                            @else
                                <div class="d-none d-none-sm d-md-inline-block col-md-3 col-lg-4 mt-3 mb-3">
                                    <img src="{{ ($service->getLesImages())[0]->getLienImage() }}" class="img-fluid rounded" alt="Image prestation manquante">
                                    @auth
                                        {!! Form::open(['url' => 'supprImagePresta']) !!}
                                        <div class="form-group">
                                            {{ Form::hidden('id_Image', ($service->getLesImages())[0]->getIdImage()) }}
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
                                                <div class="form-group {!! $errors->has('intitule_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                    {!! Form::text('intitule_Service'.$service->getIdService(), $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                    {!! $errors->first('intitule_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="form-group {!! $errors->has('description_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                    {!! Form::textarea ('description_Service'.$service->getIdService(), $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                    {!! $errors->first('description_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="form-group {!! $errors->has('image_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                    {!! Form::text('image_Service'.$service->getIdService(), ($service->getLesImages())[0]->getLienImage(), ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                    {!! $errors->first('image_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::hidden('id_Service', $service->getIdService()) }}
                                                </div>
                                                {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                                {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
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
                                            <div class="form-group {!! $errors->has('intitule_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                {!! Form::text('intitule_Service'.$service->getIdService(), $service->getIntituleService(), ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                                {!! $errors->first('intitule_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('description_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                {!! Form::textarea ('description_Service'.$service->getIdService(), $service->getDescriptionService(), ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                                {!! $errors->first('description_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group {!! $errors->has('image_Service'.$service->getIdService()) ? 'has-error' : '' !!}">
                                                {!! Form::text('image_Service'.$service->getIdService(), null, ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                                {!! $errors->first('image_Service'.$service->getIdService(), '<small class="help-block">:message</small>') !!}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::hidden('id_Service', $service->getIdService()) }}
                                            </div>
                                            {!! Form::submit('Valider les modifications', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                                            {!! Form::submit('Supprimer la prestation', ['name' => 'Supprimer', 'class' => 'btn btn-danger pull-right']) !!}
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
                @auth
                    <div class="row">
                        <div class="col-sm-12 mt-3 mb-3">
                            <div class="card" style="height: auto">
                                <div class="card-body">
                                    {!! Form::open(['url' => 'ajoutPrestation']) !!}
                                        <div class="form-group {!! $errors->has('intitule_Service') ? 'has-error' : '' !!}">
                                            {!! Form::text('intitule_Service', null, ['class' => 'form-control', 'placeholder' => 'Intitulé de la prestation']) !!}
                                            {!! $errors->first('intitule_Service', '<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="form-group {!! $errors->has('description_Service') ? 'has-error' : '' !!}">
                                            {!! Form::textarea ('description_Service', null, ['class' => 'form-control', 'placeholder' => 'Description de la prestation']) !!}
                                            {!! $errors->first('description_Service', '<small class="help-block">:message</small>') !!}
                                        </div>
                                        <div class="form-group {!! $errors->has('image_Service') ? 'has-error' : '' !!}">
                                            {!! Form::text('image_Service', null, ['class' => 'form-control', 'placeholder' => 'Placer ici le lien de l\'image']) !!}
                                            {!! $errors->first('image_Service', '<small class="help-block">:message</small>') !!}
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