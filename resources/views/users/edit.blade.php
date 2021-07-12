@extends('layouts.app') 
@section('title')
Edit User
@endsection


@section('content')
    <section class="content-header">
        <h1>
            تعديل بيانات المستخدم
        </h1>
   </section>
   <div style="margin-top: -40px;" class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'enctype'=>"multipart/form-data" , 'method' => 'patch']) !!}

                        @include('users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection