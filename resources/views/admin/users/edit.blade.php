@extends('layouts/admin')

@section('content')
    <h1>Edit User</h1>
    <div class="col-sm-3">
        <img height=50 src="{{asset($user->photo ? $user->photo->file: 'https://placehold.it/400x400')}}"  class="img-responsive img-rounded">
        
    </div>
    

    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','File:') !!}
        {!! Form::file('photo_id') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    </div>

    @include('includes.form_error')


@endsection
