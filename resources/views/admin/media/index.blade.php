@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_at'))
        <p class="bg-danger"> {{session('deleted_at')}} </p>

    @endif
    <table class="table table-striped " style="width: 1000px">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        </thead>
        @if($photo)
            <tbody>
            @foreach($photo as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height=100px src="{{asset($photo->file ? $photo->file : 'https://placeholder.it/400x400')}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                    <td>


                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach
            </tbody>
        @endif
    </table>


@stop
