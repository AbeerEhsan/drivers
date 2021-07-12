@extends('layouts.app') 
@section('title')
Student Bus
@endsection


@section('content')
    <section class="content-header">
        <h1>
        اضافة طالب جديد للباص "{{$bus->name??''}}"
        </h1>
    </section>
    <div style="margin-top: -20px," class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'busStudents.store']) !!}

                        @include('bus_students.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
