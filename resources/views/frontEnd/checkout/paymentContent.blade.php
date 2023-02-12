@extends('frontEnd.master')

@section('title')
Category
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to give us product Payment Information </div  >
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center">Payment Form</h3>
            <hr/>
            <div class="well box box-primary">

                {!! Form::open(['url'=>'/checkout/save-order','method'=>'POST', 'name'=>'shippingForm']) !!}
                <div class="form-group">
                    <label>
                        <input type="radio" value="CashOnDelivery"  name="paymentType" > Cash on Delivery</label>
                </div> 
                <div class="form-group">
                    <label>
                    <input type="radio" value="bkash"  name="paymentType"  >Bkash</label>
                </div>  
                <div class="form-group">
                    <label>
                    <input type="radio" value="paypal"  name="paymentType"  >Paypal</label>
                </div>  
                <div class="box-footer">
                    <button name="submit" class="btn btn-primary btn-block">Submit Order</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>








    </div>
</div>





@endsection