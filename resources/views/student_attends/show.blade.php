@extends('layouts.app') 
@section('title')
Student Attendance
@endsection


@section('content')
    <section class="content-header">
        <h1>
            Student Attend
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('student_attends.show_fields')
                    <a href="{{ route('studentAttends.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
