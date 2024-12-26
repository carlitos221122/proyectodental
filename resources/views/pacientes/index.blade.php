<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pacientes</title>
</head>
<body>
    <h1>Pacientes</h1>

    <a href="{{ route('pacientes.create') }}">Crear Nuevo Paciente</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombres }}</td>
                    <td>{{ $paciente->ape_paterno }}</td>
                    <td>{{ $paciente->ape_materno }}</td>
                    <td>{{ $paciente->edad }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
