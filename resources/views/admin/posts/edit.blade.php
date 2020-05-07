@extends('layouts/admin')

@section('content')
    @include('includes.tinyeditor')
    <h1>Edit Post</h1>
     <div class="col-sm-3">
        <img height=100 src="{{asset($post->photo ? $post->photo->file: 'https://placehold.it/400x400')}}"  class="img-responsive img-rounded">
        
    </div>


    <div class="col-sm-9" style="width: 1200px">
        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',$category,null,['class'=>'form-control']) !!}
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
            {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-3']) !!}
        </div>
        {!! Form::close() !!}



        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-3 ']) !!}
        </div>
        {!! Form::close() !!}
    </div>





    <div class="row">
        @include('includes.form_error')
    </div>



@endsection
