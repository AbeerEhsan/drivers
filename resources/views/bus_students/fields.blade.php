
<input type='hidden' value='{{$bus->id}}' name='bus_id'/>

<div class="form-group col-sm-12">
    {!! Form::label('student_id', 'اسم الطالب:') !!}

    <select style="height: 40px;" name="student_id" id="user" class="js-states form-control">
        
        @foreach($users as $user)
            <option {{isset($studentInfo) && $studentInfo->student_id==$user->id?"selected":" "}}
            value='{{$user->id}}'> {{$user->name}} </option>

        @endforeach

    </select>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('bus_Students',$bus->id) }}" class="btn btn-default">رجوع</a>

</div>
