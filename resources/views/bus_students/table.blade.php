<table class="table table-striped">
  
    <thead>
    <tr>
      <th scope="col">الطلاب</th>
      <th width="30%" scope="col">Actions</th>

    </tr>
  </thead>

  <tbody>
      @if ($bus->busStudents->count()>0)
      @foreach ($bus->busStudents as $student)
          
        <tr>

            <td>{{$student->student->name}}</td>
            <td>
                {!! Form::open(['route' => ['busStudents.destroy', $student->id], 'method' => 'delete']) !!}
                <div style="display: flex;" class='btn-group'>                 
                   
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'onclick' => "return confirm('Are you sure?')"
                    ]) !!}
                </div>
{!! Form::close() !!}

            
            
            
            </td>

        </tr>

      @endforeach

    
    
  </tbody>
 @endif

</table>


 
