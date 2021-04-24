<div class="table-responsive-sm">
    <table class="table table-striped" id="flights-table">
        <thead>
            <tr>
                <th>Movie</th>
        <th>Start</th>
        <th>Stop</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($flights as $flight)
            <tr>
                <td>{{ $flight->movie }}</td>
            <td>{{ $flight->start }}</td>
            <td>{{ $flight->stop }}</td>
                <td>
                    {!! Form::open(['route' => ['flights.destroy', $flight->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('flights.show', [$flight->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('flights.edit', [$flight->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>