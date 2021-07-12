{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<div style="display: flex;" class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>

    @if (APP\Models\User::find($id)->type == 'student' )
        <a href="{{ route('attendance', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-calendar" ></i>

    </a>
    @endif


    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
