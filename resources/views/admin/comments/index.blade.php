@extends('layouts.admin')

@section('content')




    @if(count($comments)>0)
        <h1>
            Comments
        </h1>
         <table class="table table-striped">
             <thead>
               <tr>
                   <th>Id</th>
                   <th>Post Id</th>
                   <th>Author</th>
                   <th>Email</th>
                   <th>Body</th>
                   <th>Photo</th>


               </tr>
             </thead>
             @foreach($comments as $comment)
             <tbody>
               <tr>
                   <td>{{$comment->id}}</td>
                   <td>{{$comment->post_id}}</td>
                   <td>{{$comment->author}}</td>
                   <td>{{$comment->email}}</td>
                   <td>{{$comment->body}}</td>
                   <td><img height="64" src="{{asset($comment->photo ? $comment->photo : "https://placeholder.it/64x64")}}"></td>
                   <td><a href="{{route('home.post',$comment->slug)}}"> View Post</a></td>
                   <td><a href="{{route('admin.comment.replies.show',$comment->id)}}"> View Replies</a></td>
                   <td>
                       @if($comment->is_active==1)

                       {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}
                       <input type="hidden" name="is_active" value="0">

                       <div class="form-group">
                           {!! Form::submit('Reject',['class'=>'btn btn-success']) !!}
                       </div>
                       {!! Form::close() !!}
                        @else
                           {!! Form::model($comment,['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}
                           <input type="hidden" name="is_active" value="1">

                           <div class="form-group">
                               {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                           </div>
                           {!! Form::close() !!}


                       @endif
                   </td>
                   <td>
                       {!! Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]]) !!}

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
         No comments
     </h1>
    @endif
@stop