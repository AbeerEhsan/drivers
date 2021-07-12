@extends('layouts.app') 
@section('title')
Students Info
@endsection


@section('content')
    <section class="content-header">
        <h1 class="pull-left">بيانات الطلاب</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('studentInfos.create') }}">اضافة جديدة </a>
        </h1>
    </section>
    <div style="margin-top: -20px;" class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('student_infos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

