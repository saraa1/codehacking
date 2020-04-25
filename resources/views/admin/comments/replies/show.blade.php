@extends('layouts.admin')

@section('content')




    @if($reply)
        <h1>
            Replies
        </h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Comment Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>


            </tr>
            </thead>
            @foreach($reply as $reply)
                <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->comment_id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}"> View Post</a></td>

                    <td>
                        @if($reply->is_active==1)

                            {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentReplyController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Reject',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentReplyController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}


                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['CommentReplyController@destroy',$reply->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>

                </tbody>
            @endforeach
        </table>
    @else

        <h1>
            No replies
        </h1>
    @endif
@stop