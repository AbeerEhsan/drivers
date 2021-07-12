@extends('layouts.app') 
@section('title')
Student Info
@endsection


@section('content')
    <section class="content-header">
        <h1>
            اضافة معلومات الطالب
        </h1>
    </section>
    <div style="margin-top: -40px;" class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'studentInfos.store']) !!}

                        @include('student_infos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
