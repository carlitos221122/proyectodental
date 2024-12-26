<!DOCTYPE html>
<html>
<head>
    <link href='https://unpkg.com/@fullcalendar/core/main.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/daygrid/main.css' rel='stylesheet' />
</head>
<body>
    <div id='calendar'></div>

    <!-- Modal for creating cita -->
    <div id="createCitaModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('citas.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fecha_hora">Fecha y Hora</label>
                            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select id="paciente_id" name="paciente_id" class="form-control" required>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tratamiento_id">Tratamiento</label>
                            <select id="tratamiento_id" name="tratamiento_id" class="form-control" required>
                                @foreach($tratamientos as $tratamiento)
                                    <option value="{{ $tratamiento->id }}">{{ $tratamiento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="confirmada">Confirmada</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cita</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@fullcalendar/core/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction/main.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
