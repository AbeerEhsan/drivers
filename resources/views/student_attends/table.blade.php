<table class="table table-striped">
  
    <thead>
    <tr>
      <th scope="col">التاريخ</th>
      <th scope="col">الحضور</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

  <tbody>
      @if ($student->studentAttends->count()>0)
      @foreach ($student->studentAttends as $attend)
          
        <tr>

          <td>{{$attend->created_at->format('m/d/Y') }}</td>
          <td>  <input  type="checkbox" disabled {{ $attend->attendance?"checked":""}} /> </td>
          <td> 
            
          {!! Form::open(['route' => ['studentAttends.destroy', $attend->id], 'method' => 'delete']) !!}
              <div style="display: flex;" class='btn-group'>
             
                
                  <a href="/studentAttends/{{$attend->id}}/edit/{{$attend->student_id}}" class='btn btn-default btn-xs'>
                      <i class="glyphicon glyphicon-edit"></i>
                  </a>
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


 
