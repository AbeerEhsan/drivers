@extends('layouts.app') 
@section('title')
Bus Students 
@endsection


@section('content')
    <section class="content-header">
    <h1 class="pull-left">  طلاب الباص  "{{$bus->name??""}}"</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('bus_Students.create',$bus->id) }}">اضافة جديدة </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('bus_students.table')
            </div>
        </div>
        <div class="text-right">
            
            <a href="/busess" class="btn btn-default">رجوع</a>

        </div>
    </div>
@endsection

