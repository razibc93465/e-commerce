@extends('admin.master')

@section('content')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<h2>{{$users->count() }} Users out of {{$users->total() }} Users</h2>
<!--<h2>{{$users->count() }} Users</h2>-->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Serial</th>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($users as $user)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$user->id}}</td>
<!--            <th scope="row">{{$user->id}}</th>-->
            <td>{{$user->name}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
           
            <td>
                <a href="{{url('/user/edit/'.$user->id)}}" class="btn btn-success">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/user/delete/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
       
    </tbody>
</table>
<hr/>
<div> 
 {{$users->links()}}
</div>
@endsection