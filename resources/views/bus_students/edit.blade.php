@extends('layouts.app') 
@section('title')
Edit Student Bus
@endsection



@section('content')
    <section class="content-header">
        <h1>
            Bus Student
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($busStudent, ['route' => ['busStudents.update', $busStudent->id], 'method' => 'patch']) !!}

                        @include('bus_students.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection