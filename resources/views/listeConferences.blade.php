<table class="table table-bordered table-stripped">
    <thead>
    <th>Id</th>
    <th>Description</th>
    <th>Intitulé</th>
    </thead>
    @foreach ($lesConferences as $conference)
        <tr>
            <td>{{{ $conference->getIdConf() }}}</td>
            <td>{{{ $conference->getDescriptionConf() }}}</td>
            <td>{{{ $conference->getIntituleConf() }}}</td>
        </tr>
    @endforeach
</table>
