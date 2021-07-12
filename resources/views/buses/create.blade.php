@extends('layouts.app') 
@section('title')
Create Bus 
@endsection


@section('content')
    <section class="content-header">
        <h1>
            اضافة باص جديد
        </h1>
    </section>
    <div style="margin-top: -40px;" class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'busess.store']) !!}

                        @include('buses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
