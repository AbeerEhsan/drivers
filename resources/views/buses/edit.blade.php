@extends('layouts.app') 
@section('title')
Edit Bus
@endsection


@section('content')
    <section class="content-header">
        <h1>
            تعديل بيانات الباص
        </h1>
   </section>
   <div style="margin-top: -40px;" class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bus, ['route' => ['busess.update', $bus->id], 'method' => 'patch']) !!}

                        @include('buses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection