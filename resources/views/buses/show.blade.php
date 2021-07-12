@extends('layouts.app') 
@section('title')
Show Bus
@endsection


@section('css')
   <style>
        .panel-info>.panel-heading {
        background-color: #e3829c;
        color: white;
        border-color: #e3829c;
        }

        .nav-stacked>li.active>a, .nav-stacked>li.active>a:hover {
        background: transparent;
        color: #444;
        border-top: 0;
        border-left-color: #D5436A;
        }

        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        color: #fff;
        background-color: #D5436A;
}


   </style> 
@endsection
@section('content')
    <section class="content-header">
        <h1>
            عرض بيانات الباص
        </h1>
    </section>
    <div style="margin-top: -40px;" class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('buses.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
