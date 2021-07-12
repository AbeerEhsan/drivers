<!-- Privacy Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('privacy', 'السياسات:') !!}
    {!! Form::textarea('privacy', null, ['class' => 'form-control','rows'=>'5']) !!}
</div>

<!-- Terms Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('terms', 'الشروط والأحكام:') !!}
    {!! Form::textarea('terms', null, ['class' => 'form-control' ,'rows'=>'5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">رجوع</a>
</div>
