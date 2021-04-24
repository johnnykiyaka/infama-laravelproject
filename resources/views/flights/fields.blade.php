<!-- Movie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movie', 'Movie:') !!}
    {!! Form::select('movie', ['RAMBO' => 'RAMBO', 'RIO' => 'RIO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::text('start', null, ['class' => 'form-control','id'=>'start']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#start').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Stop Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stop', 'Stop:') !!}
    {!! Form::text('stop', null, ['class' => 'form-control','id'=>'stop']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#stop').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('flights.index') }}" class="btn btn-secondary">Cancel</a>
</div>
