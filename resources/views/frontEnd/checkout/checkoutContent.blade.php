@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to login to complete your valueable order. If you are not registered please Sign Up first </div  >
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="text-center">Customer Register Here</h3>
            <hr/>
            <div class="well box box-primary">
                {!! Form::open(['url'=>'/checkout/sign-up','method'=>'POST'])!!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" required=""> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" required=""> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" name="emailAddress" class="form-control" placeholder="Email Address" required=""> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required=""> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter Address" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="number" name="phoneNumber" class="form-control" placeholder="Enter Phone Number" required=""> 
                    </div>
                    <div class="form-group">
                        <label>Dist. Name</label>
                        <select class="form-control" name="districtName" required="" >
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
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-lg-6">
            <h3 class="text-center">Login Here</h3>
            <hr/>
            <div class="well box box-primary">
                {!! Form::open(['url'=>'/customer/login','method'=>'POST']) !!}
                <div class="box-body">                                     
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="text" name="emailAddress" class="form-control" placeholder="Email Address" > 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" > 
                    </div>                                                      
                </div>              
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>

                </div>

                {!! Form::close() !!}
            </div>
        </div>






    </div>
</div>





@endsection