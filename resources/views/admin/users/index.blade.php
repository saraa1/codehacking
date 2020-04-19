@extends('layouts.admin')

@section('content')
    <h1>Index</h1>
     <table class="table table-striped">
         <thead>
           <tr>
               <th>Id</th>
               <th>Photo</th>
               <th>Name</th>
               <th>Email</th>
               <td>Role</td>
               <td>Status</td>
               <th>Created At</th>
               <th>Updated At</th>
           </tr>
         </thead>
         <tbody>
          @if($users)
              @foreach($users as $user)
           <tr>
               <td>{{$user['id']}}</td>
               <td><img height="50px" src="{{asset($user->photo ? $user->photo['file'] : "https://placehold.it/400x400")}}"></td>
               <td><a href="{{route('admin.user.edit',$user->id)}}">{{$user['name']}}</a></td>
               <td>{{$user['email']}}</td>
               <td>{{$user->role ? $user->role['name'] : "No Role "}}</td>
               <td>{{$user['is_active']==1 ? 'Active' : 'Not Active'}}</td>
               <td>{{$user->created_at->diffForHumans()}}</td>
               <td>{{$user->updated_at->diffForHumans()}}</td>
           </tr>
              @endforeach
           @endif
         </tbody>
       </table>
@endsection