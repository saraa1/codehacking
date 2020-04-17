@extends('layouts.admin')

@section('content')
    <h1>user</h1>
     <table class="table table-striped">
         <thead>
           <tr>
               <th>Id</th>
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
               <td>{{$user['name']}}</td>
               <td>{{$user['email']}}</td>
               <td>{{$user->role['name']}}</td>
               <td>{{$user['is_active']==1 ? 'Active' : 'Not Active'}}</td>
               <td>{{$user['created_at']}}</td>
               <td>{{$user['updated_at']}}</td>
           </tr>
              @endforeach
           @endif
         </tbody>
       </table>
@endsection