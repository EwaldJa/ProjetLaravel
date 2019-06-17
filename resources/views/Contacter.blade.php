@extends('template')

@section('titrePage')
    Liste des prestations
@endsection

@section('titreItem')
    <div class="row mt-5 sansmarge">
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <h1 class=" mt-3 mb-3">Les messages</h1>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="row mt-2 sansmarge">
        <div class="col-xs-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            {!! Form::open(['url' => 'envoyerContact']) !!}
            <div class="form-group {!! $errors->has('nom_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('nom_Contact', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                {!! $errors->first('nom_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('prenom_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('prenom_Contact', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
                {!! $errors->first('prenom_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('email_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('email_Contact', null, ['class' => 'form-control', 'placeholder' => 'Adresse email']) !!}
                {!! $errors->first('email_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('telephone_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('telephone_Contact', null, ['class' => 'form-control', 'placeholder' => 'Numéro de téléphone']) !!}
                {!! $errors->first('telephone_Contact', '<small class="help-block">:message</small>') !!}
            </div>


            <div class="form-group {!! $errors->has('societe_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('societe_Contact', null, ['class' => 'form-control', 'placeholder' => 'Votre société']) !!}
                {!! $errors->first('societe_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('codepostal_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('codepostal_Contact', null, ['class' => 'form-control', 'placeholder' => 'codepostal']) !!}
                {!! $errors->first('codepostal_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('adresse_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('adresse_Contact', null, ['class' => 'form-control', 'placeholder' => 'Adresse']) !!}
                {!! $errors->first('adresse_Contact', '<small class="help-block">:message</small>') !!}
            </div>




            <div class="form-group {!! $errors->has('objet_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('objet_Contact', null, ['class' => 'form-control', 'placeholder' => 'Objet du message']) !!}
                {!! $errors->first('objet_Contact', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('message_Contact') ? 'has-error' : '' !!}">
                {!! Form::text('message_Contact', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
                {!! $errors->first('message_Contact', '<small class="help-block">:message</small>') !!}
            </div>


            {!! Form::submit('Valider l\'envoi', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection