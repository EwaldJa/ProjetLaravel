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
        <div class="d-inline-block col-md-10 offset-md-1 col-lg-8 offset-lg-2 grisclair">
            <table class="table table-bordered table-stripped">
                <thead>
                <th>Société</th>
                <th>Nom</th>
                <th>Objet</th>
                <th></th>
                </thead>
                @foreach ($lesContacts as $contact)

                    <tr>
                        {!! Form::open(['url' => 'VoirContact']) !!}

                        <td>{{{ $contact->getSocieteContact() }}}</td>
                        <td>{{{ $contact->getNomContact() }}}</td>
                        <td>{{{ $contact->getObjetContact() }}}</td>

                        <div class="form-group">
                            {{ Form::hidden('id_Contact', $contact->getIdContact()) }}
                        </div>
                        <td>
                        {!! Form::submit('Voir le message', ['name' => 'Valider', 'class' => 'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                        </td>
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection