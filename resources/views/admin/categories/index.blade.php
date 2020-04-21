@extends ('layouts.admin')

@section ('content')

<div class="col-sm-12">
        {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true]) !!}


        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary ']) !!}
        </div>
        {!! Form::close() !!}

</div>

<div class="">
<table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
           
        </tr>
        </thead>
        <tbody>
        @if($category)
            @foreach($category as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td><a href={{route('admin.categories.edit' ,$category->id)}}>{{$category->name}}</a></td>
                    <td>{{{$category->created_at ? $category->created_at->diffForHumans() : "No date found"}}}</td>
                    
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>




@stop