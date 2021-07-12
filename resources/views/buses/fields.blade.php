<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'الاسم:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'السائق:') !!}

    <select style="height: 40px;" name="user_id" id="user" class="js-states form-control">
        
        @foreach($users as $user)
            <option {{isset($bus) && $bus->user_id==$user->id?"selected":" "}}
            value='{{$user->id}}'> {{$user->name}} </option>

        @endforeach

    </select>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'الحالة : ') !!}
    <div  class="form-group">
        <select class="form-control" id="sel1"name="status">
          <option {{ isset($bus) && $bus->status == 'free' ?"selected":""}} value="free" > متاح</option>
          <option {{ isset($bus) && $bus->status == 'busy' ?"selected":""}} value="busy" >مشغول</option>
        </select>
      </div>
</div>





<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('busess.index') }}" class="btn btn-default">رجوع</a>
</div>
