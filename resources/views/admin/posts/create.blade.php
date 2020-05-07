@extends('layouts/admin')

@section('content')
    @include('includes.tinyeditor')
    <h1>Create Post</h1>


    <div class="col-sm-9" style="width: 1200px">

        {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>true]) !!}

        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Options']+$category,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','File:') !!}
            {!! Form::file('photo_id') !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>




@endsection
