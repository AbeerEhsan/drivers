<!-- Student Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('student_id', 'اسم الطالب:') !!}

    <select style="height: 40px;" name="student_id" id="user" class="js-states form-control">
        
        @foreach($users as $user)
            <option {{isset($studentInfo) && $studentInfo->student_id==$user->id?"selected":" "}}
            value='{{$user->id}}'> {{$user->name}} </option>

        @endforeach

    </select>

</div>

<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', 'المعدل:') !!}
    {!! Form::text('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'المستوى:') !!}
    {!! Form::text('level', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('studentInfos.index') }}" class="btn btn-default">رجوع</a>
</div>
