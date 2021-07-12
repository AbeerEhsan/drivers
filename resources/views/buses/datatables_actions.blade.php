{!! Form::open(['route' => ['busess.destroy', $id], 'method' => 'delete']) !!}
<div style="display: flex;" class='btn-group'>
    <a href="{{ route('busess.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('busess.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    <a href="{{ route('bus_Students', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-users" aria-hidden="true"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
