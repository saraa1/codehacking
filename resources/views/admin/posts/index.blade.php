@extends('layouts.admin')

@section('content')

    <h1>Index</h1>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category </th>
            <td>Title</td>
            <td>Body</td>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td><img height=50px src="{{asset($post->photo ? $post->photo->file : "https://placehold.it/400x400")}}" ></td>
                    <td>{{$post->user_id ? $post->user->name : 'no owner'}}</td>
                    <td>{{{$post->category_id ? $post->category->name : "No category selected"}}}</td>
                    <td><a href={{route('admin.post.edit',$post->id)}}> {{$post->title}}</a></td>
                    <td>{{str_limit($post->body,7)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop