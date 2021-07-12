@extends('layouts.app') 
@section('title')
Edit Student Attendance
@endsection


@section('content')
    <section class="content-header">
        <h1>
            Student Attend
        </h1>
   </section>
    <div style="margin-top:-40px; " class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($studentAttend, ['route' => ['studentAttends.update', $studentAttend->id], 'method' => 'patch']) !!}

                        @include('student_attends.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection