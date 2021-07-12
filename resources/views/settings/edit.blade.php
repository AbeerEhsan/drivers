@extends('layouts.app') 
@section('title')
Edit Settings
@endsection


@section('content')
    <section class="content-header">
        <h1>
            الاعدادات
        </h1>
   </section>
   <div style="margin-top: -40px;" class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($setting, ['route' => ['settings.update', $setting->id], 'method' => 'patch']) !!}

                        @include('settings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection