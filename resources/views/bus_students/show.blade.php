@extends('layouts.app') 
@section('title')
Show Student Bus

@endsection


@section('content')
    <section class="content-header">
        <h1>
            Bus Student
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bus_students.show_fields')
                    <a href="{{ route('busStudents.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
