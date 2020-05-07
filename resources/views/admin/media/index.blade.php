@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_at'))
        <p class="bg-danger"> {{session('deleted_at')}} </p>

    @endif
    <form action="{{url('delete/media')}}" method="post" class="form-inline mt-3">
        {{csrf_field()}}
        {{method_field('delete')}}

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group ml-2">
            <input type="submit"  name='delete_all' class="btn-primary">
        </div>
    <table class="table table-striped " style="width: 1000px">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
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
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img height=100px src="{{asset($photo->file ? $photo->file : 'https://placeholder.it/400x400')}}"></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'no date'}}</td>
                    <td>


{{--                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]]) !!}--}}

{{--                        <div class="form-group">--}}
{{--                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}--}}
{{--                        </div>--}}
{{--                        {!! Form::close() !!}--}}

                        <div class="form-group">
                            <input type="hidden" name="photo" value="{{$photo->id}}">
                            <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        @endif

    </table>
    </form>


@stop
@section('scripts')
<script>

    $(document).ready(function(){

        $('#options').click(function () {

            if(this.checked){
                $('.checkBoxes').each(function(){

                    this.checked=true;
                });
            }
            else{
                $('.checkBoxes').each(function(){

                    this.checked=false;
                });
            }
        });

    });
</script>
@stop
