<!-- Ape Nom Field -->
<div class="col-sm-12">
    {!! Form::label('ape_nom', 'Ape Nom:') !!}
    <p>{{ $usuario->ape_nom }}</p>
</div>

<!-- Usuario Field -->
<div class="col-sm-12">
    {!! Form::label('usuario', 'Usuario:') !!}
    <p>{{ $usuario->usuario }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Contraseña:') !!}
    <p>{{ $usuario->password }}</p>
</div>

