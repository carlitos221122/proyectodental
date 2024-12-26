<!DOCTYPE html>
<html>
<head>
    <title>Crear Paciente</title>
</head>
<body>
    <h1>Crear Nuevo Paciente</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.store') }}" method="POST">
        @csrf
        <label>Nombres:</label>
        <input type="text" name="nombres" value="{{ old('nombres') }}">
        <br>

        <label>Apellido Paterno:</label>
        <input type="text" name="ape_paterno" value="{{ old('ape_paterno') }}">
        <br>

        <label>Apellido Materno:</label>
        <input type="text" name="ape_materno" value="{{ old('ape_materno') }}">
        <br>

        <label>Edad:</label>
        <input type="number" name="edad" value="{{ old('edad') }}">
        <br>

        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        <br>

        <label>Número de Teléfono:</label>
        <input type="text" name="numero_telefono" value="{{ old('numero_telefono') }}">
        <br>

        <label>Colonia:</label>
        <input type="text" name="colonia" value="{{ old('colonia') }}">
        <br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('pacientes.index') }}">Volver a la lista</a>
</body>
</html>
