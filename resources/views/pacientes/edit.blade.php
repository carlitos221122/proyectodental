<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
</head>
<body>
    <h1>Editar Paciente</h1>

    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" id="nombres" value="{{ $paciente->nombres }}" required><br>

        <label for="ape_paterno">Apellido Paterno:</label>
        <input type="text" name="ape_paterno" id="ape_paterno" value="{{ $paciente->ape_paterno }}" required><br>

        <label for="ape_materno">Apellido Materno:</label>
        <input type="text" name="ape_materno" id="ape_materno" value="{{ $paciente->ape_materno }}" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" value="{{ $paciente->edad }}" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}" required><br>

        <label for="numero_telefono">Número de Teléfono:</label>
        <input type="text" name="numero_telefono" id="numero_telefono" value="{{ $paciente->numero_telefono }}" required><br>

        <label for="colonia">Colonia:</label>
        <input type="text" name="colonia" id="colonia" value="{{ $paciente->colonia }}" required><br>

        <button type="submit">Actualizar Paciente</button>
    </form>
</body>
</html>
