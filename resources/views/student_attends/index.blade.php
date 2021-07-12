@extends('layouts.app') 
@section('title')
Student Attendance
@endsection



@section('content')
    <section class="content-header">
    <h1 class="pull-left"> سجل غياب الطالب "{{$student->name??""}}"</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('attend.create',$student->id) }}">اضافة جديدة </a>
        </h1>
    </section>
    <div  style="margin-top: -20px;" class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              @include('student_attends.table')
            </div>

        </div>
        <div class="text-right">
                    <a href="/users/student" class="btn btn-default">رجوع</a>

        </div>
    </div>
@endsection

