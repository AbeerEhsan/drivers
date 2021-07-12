@extends('layouts.app') 
@section('title')
Edit Student Info
@endsection


@section('content')
    <section class="content-header">
        <h1>
             تعديل سجل جحضور الطالب 
        </h1>
   </section>
   <div style="margin-top: -20px;" class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($studentInfo, ['route' => ['studentInfos.update', $studentInfo->id], 'method' => 'patch']) !!}

                        @include('student_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection