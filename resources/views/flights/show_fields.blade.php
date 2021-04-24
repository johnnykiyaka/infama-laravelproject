<!-- Movie Field -->
<div class="form-group">
    {!! Form::label('movie', 'Movie:') !!}
    <p>{{ $flight->movie }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $flight->start }}</p>
</div>

<!-- Stop Field -->
<div class="form-group">
    {!! Form::label('stop', 'Stop:') !!}
    <p>{{ $flight->stop }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $flight->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $flight->updated_at }}</p>
</div>

