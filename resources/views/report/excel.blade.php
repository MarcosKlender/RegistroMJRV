<table>
    <thead>
        <tr>
            <th bgcolor="#00FF00">PROVINCIA</th>
            <th bgcolor="#00FF00">CANTÓN</th>
            <th bgcolor="#00FF00">PARROQUIA</th>
            <th bgcolor="#00FF00">ZONA</th>
            <th bgcolor="#00FF00">RECINTO</th>
            <th bgcolor="#00FF00">INSTITUCIÓN</th>
            <th bgcolor="#00FF00">EDITADO</th>
            <th bgcolor="#00FF00">JUNTA</th>
            <th bgcolor="#00FF00">SEXO</th>
            <th bgcolor="#00FF00" width="80px">CÉDULA</th>
            <th bgcolor="#00FF00">NOMBRES</th>
            <th bgcolor="#00FF00">CELULAR</th>
            <th bgcolor="#00FFFF" width="80px">CÉDULA COORDINADOR</th>
            <th bgcolor="#00FFFF">NOMBRES COORDINADOR</th>
            <th bgcolor="#00FFFF">CELULAR COORDINADOR</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->provincia }}</td>
                <td>{{ $member->canton }}</td>
                <td>{{ $member->parroquia }}</td>
                <td>{{ $member->zona }}</td>
                <td>{{ $member->recinto }}</td>
                <td>{{ $member->institucion }}</td>
                <td>{{ $member->editado }}</td>
                <td>{{ $member->junta }}</td>
                <td>{{ $member->sexo }}</td>
                <td>{{ $member->cedula }}</td>
                <td>{{ $member->nombre }}</td>
                <td>{{ $member->celular }}</td>
                <td>{{ $member->coordinador_cedula }}</td>
                <td>{{ $member->coordinador_nombre }}</td>
                <td>{{ $member->coordinador_celular }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
