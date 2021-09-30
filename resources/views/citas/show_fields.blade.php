<!-- Id Paciente Field -->
<div class="col-sm-4">
    {!! Form::label('id_paciente', 'Id Paciente:') !!}
    <p>{{ $citas->id_paciente }}</p>
</div>

<!-- Fecha Cita Field -->
<div class="col-sm-4">
    {!! Form::label('fecha_cita', 'Fecha de Citas:') !!}
    <p>{{ $citas->fecha_cita }}</p>
</div>

<!-- Id Doctor Field -->
<div class="col-sm-4">
    {!! Form::label('id_doctor', 'Id Doctor:') !!}
    <p>{{ $citas->id_doctor }}</p>
</div>

