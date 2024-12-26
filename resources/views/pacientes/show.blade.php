<!DOCTYPE html>
<html>
<head>
    <title>Ver Paciente</title>
</head>
<body>
    <h1>Paciente: {{ $paciente->nombres }} {{ $paciente->ape_paterno }} {{ $paciente->ape_materno }}</h1>

    <p><strong>ID:</strong> {{ $paciente->id }}</p>
    <p><strong>Nombres:</strong> {{ $paciente->nombres }}</p>
    <p><strong>Apellido Paterno:</strong> {{ $paciente->ape_paterno }}</p>
    <p><strong>Apellido Materno:</strong> {{ $paciente->ape_materno }}</p>
    <p><strong>Edad:</strong> {{ $paciente->edad }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
    <p><strong>Número de Teléfono:</strong> {{ $paciente->numero_telefono }}</p>
    <p><strong>Colonia:</strong> {{ $paciente->colonia }}</p>

    <a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>
    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <a href="{{ route('pacientes.index') }}">Volver a la lista</a>
</body>
</html>
