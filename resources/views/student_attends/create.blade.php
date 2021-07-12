@extends('layouts.app') 
@section('title')
Student Attendance
@endsection


@section('content')
    <section class="content-header">
        <h1>
    <h1 class="pull-left"> سجل غياب الطالب "{{$student->name??""}}"</h1>
        </h1>
    </section>
    <div style="margin-top:-20px; " class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'studentAttends.store']) !!}

                        @include('student_attends.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
