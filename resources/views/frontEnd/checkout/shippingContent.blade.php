@extends('frontEnd.master')

@section('title')
Category
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello {{$customerById->firstname}} {{$customerById->lastname}} </div  >
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Shipping From Here</h3>
            <hr/>
            <div class="well box box-primary">

                {!! Form::open(['url'=>'/checkout/save-shipping','method'=>'POST', 'name'=>'shippingForm']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" value="{{$customerById->firstname.' '.$customerById->lastname}}" name="fullName" class="form-control" placeholder="First Name" > 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="text" value="{{$customerById->emailAddress}}" name="emailAddress" class="form-control" placeholder="Email Address" > 
                    </div>
<!--                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="text" value="{{$customerById->password}}" name="password" class="form-control" placeholder="Password" > 
                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter Address" >{{$customerById->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="number" value="{{$customerById->phoneNumber}}"  name="phoneNumber" class="form-control" placeholder="Enter Phone Number" > 
                    </div>
                    <div class="form-group">
                        <label>Dist. Name</label>
                        <select class="form-control" name="districtName">
                            <!--<option>{{$customerById->districtName}}</option>-->
                            <option>--Select District Name--</option>
                            <option>Dhaka</option>
                            <option>Manikganj</option>
                            <option>Tangail</option>
                            <option>Rajshahi</option>
                            <option>Chattogram</option>
                            <option>Khulna</option>
                        </select>
                    </div>
                </div>              
                <div class="box-footer">
                    <button name="submit" class="btn btn-primary btn-block">Save Shipping Info</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>








    </div>
</div>

<script>
    document.forms['shippingForm'].elements['districtName'].value = '{{$customerById->districtName}}';
</script>



@endsection