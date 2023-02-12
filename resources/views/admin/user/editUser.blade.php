@extends('admin.master')

@section('content')

<hr/>
<div class="row">
    <div class="col-lg-12">

        <hr/>
        <div class="well">

            {!! Form::open(['url'=>'user/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoryForm'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$userById->name}}" class="form-control" name="name">
                    <input type="hidden" value="{{$userById->id}}" class="form-control" name="id">
                </div>
            </div> 

            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$userById->address}}" class="form-control" name="address">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" value="{{$userById->email}}" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Passwoed</label>
                <div class="col-sm-10">
                    <input type="password" value="{{$userById->password}}" class="form-control" name="password">
                </div>
            </div>


            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block">Update User Info</button>
                </div>
            </div>

            {!! Form::close()!!}

        </div>
    </div>

</div>



@endsection