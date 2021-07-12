@extends('layouts.app') 
@section('title')
Create User
@endsection


@section('content')
    <section class="content-header">
        <h1>
            اضافة مستخدم جديد
        </h1>
    </section>
    <div style="margin-top: -40px;" class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'users.store','enctype'=>"multipart/form-data"]) !!}

                        @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
