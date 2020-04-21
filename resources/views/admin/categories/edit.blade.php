@extends ('layouts.admin')

@section ('content')

<div class="col-sm-12">
        {!! Form::model($category,['method'=>'PUT','action'=>['AdminCategoriesController@update',$category->id],'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Category',['class'=>'btn btn-primary ']) !!}
        </div>
        {!! Form::close() !!}

         {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Category',['class'=>'btn btn-danger ']) !!}
        </div>
        {!! Form::close() !!}

</div>





@stop