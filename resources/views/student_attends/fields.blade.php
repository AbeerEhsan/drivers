<!-- Student Id Field -->

{{-- <div class="form-group col-sm-6">
    {!! Form::label('attendance', 'Attendance:') !!}
    {!! Form::text('attendance', null, ['class' => 'form-control']) !!}
</div> --}}
<input type='hidden' value='{{$student->id}}' name='student_id'/>


<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'التاريخ') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control','id'=>'created_at']) !!}
</div>


@push('scripts')
    <script type="text/javascript">
        $('#created_at').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush 



<div class="form-group col-sm-12">
  {!! Form::label('attendance', 'حضور الطالب:') !!}
</div>
<div class="form-group col-sm-12">
  {{-- 
  <input  id="toggle-state"  value='1' name="attendance" type="checkbox" data-toggle="toggle"> --}}

      <input type='hidden' value='0' name='attendance'/>

      <input {{ isset($studentAttend) && $studentAttend->attendance?"checked":""}} id="toggle-state"  value='1' name="attendance" type="checkbox" data-toggle="toggle">
      {{-- <input id="toggle-state"  value='1' name="attendance" type="checkbox" data-toggle="toggle"> --}}
     


</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendance',$student->id) }}" class="btn btn-default">رجوع</a>
</div>
