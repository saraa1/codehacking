@extends('layouts.blog-post')

@section('content')
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
                <div class="col-lg-8">

                    <!-- Title -->
                    <h1 class="mt-4">{{$post->title}}</h1>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="#">{{$post->user->name}}</a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p>Posted on {{$post->created_at->diffForHumans()}}</p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="{{asset($post->photo->file)}}" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead">{{$post->body}}
                    <hr>
                    @if(Auth::check())

                    <!-- Comments Form -->
                        @if(Session::has('comment_msg'))
                            <p class="bg-info">{{session('comment_msg')}} </p>

                        @endif

                        <h5 class="card-header">Leave a Comment:</h5>


                        {!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!}
                        <input type="hidden" name="post_id" value={{$post->id}}>


                        <div class="form-group">

                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                    @if(count($comment)>0)
                        @foreach($comment as $comment)

                        <!-- Single Comment -->
                            <div class="media mb-4">
                                <img height="50" class="d-flex mr-3 rounded-circle" src="{{asset($comment->photo)}}"
                                     alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">{{$comment->author}}
                                        <small>
                                            {{$comment->created_at->diffForHumans()}}
                                        </small></h5>
                                    <p>{{$comment->body}}</p>

                                    <!-- Nested Comment -->
                                    @if(count($comment->replies)> 0)
                                        @foreach($comment->replies as $replies)
                                            @if($replies->is_active==1)

                                                <div class="media mt-4">
                                                    <img height="50" class="d-flex mr-3 rounded-circle"
                                                         src="{{asset($replies->photo ? $replies->photo : "https://placeholder.it/40x40")}}"
                                                         alt="">
                                                    <div class="media-body">
                                                        <h5 class="media-heading">
                                                            <small>{{$replies->created_at->diffForHumans()}}</small>
                                                        </h5>
                                                        <p>{{$replies->body}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        @endforeach
                            @if(Session::has('reply_msg'))
                                <p class="bg-info"> {{session('reply_msg')}}</p>
                            @endif
                            <div class="comment-reply-container">
                                <div class="comment-reply col-sm-6 ">

                                    {!! Form::open(['method'=>'POST','action'=>'CommentReplyController@createReply']) !!}
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    <div class="form-group">
                                        {!! Form::label('body','Reply:') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('Reply Comment',['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                    @endif


                    <!-- Comment with nested comments -->


                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">

                                        <li>
                                            <a href="#">{{$post->category->name}}</a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">
                            You can put anything you want inside of these side widgets. They are easy to use, and
                            feature the new Bootstrap 4 card containers!
                        </div>
                    </div>

                </div>


        </div>
        <!-- /.row -->

    </div>

@stop
@section('scripts')
<script >
    $(".comment-reply-container.toggle-reply").click(function () {

        $(this).next().slideToggle('slow');
    });


</script>
@stop
