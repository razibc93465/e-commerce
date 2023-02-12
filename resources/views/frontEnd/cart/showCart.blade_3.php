@extends('frontEnd.master')

@section('title')
Category
@endsection

@section('mainContent')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>



<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php $total = 0 ?>
                @foreach($cartProducts as $cartProduct)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <div class="close1"> </div>
                        </div>
                        <script>$(document).ready(function (c) {
                                $('.close1').on('click', function (c) {
                                    $('.rem1').fadeOut('slow', function (c) {
                                        $('.rem1').remove();
                                    });
                                });
                            });
                        </script>
                    </td>
<!--                    class="img-responsive"-->
                    <td class="invert-image"><a href=""><img src="{{asset($cartProduct->productImage)}}" width="100" height="100" alt=" "  /></a></td>
                    <td class="invert">
                        <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{$cartProduct->productName}}</td>
                    <td class="invert">TK.{{$cartProduct->productPrice}}</td>
                </tr>
                
                @endforeach
                
              

                <!--quantity-->
                <script>
                    $('.value-plus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
                        divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function () {
                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
                        if (newVal >= 1)
                            divUpd.text(newVal);
                    });
                </script>
                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left">	

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                 
               
                
                <ul>
                     @foreach($cartProducts as $cartProduct)
                     
                    <li>{{$cartProduct->productName}}<i>-</i> <span>TK.{{$itemTotal = $cartProduct->productPrice*$cartProduct->productQuantity}}</span></li>
                    <?php $total = $total + $itemTotal ?>
                    
                     @endforeach
                     <hr/>
                    <li>Total<i>-</i> <span>TK.{{$total}}</span></li>
                </ul>
                
                
               
            </div>
            
             
              
            
            <div class="clearfix"> </div>
        </div>
    </div>
</div>	
<!-- //check out -->


<!--<div class="checkout">
    <div class="container">
        <h3>My Shopping Bag</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay="5s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Item Total</th>
                    </tr>
                </thead>
<?php $total = 0 ?>
                @foreach($cartProducts as $cartProduct)
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a href="{{url('/delete/'.$cartProduct->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </div>
                    </td>
                    <td class="invert">{{$cartProduct->productName}}</td>
                    <td class="invert">
                        <div class="quantity">
                            <form>
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control" value="{{$cartProduct->productQuantity}}">
                                    <span class="input-group-btn">
                                        <button type="submit" name="btn" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-upload"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td class="invert">TK.{{$cartProduct->productPrice}}</td>
                    <td class="invert">TK.{{$itemTotal = $cartProduct->productPrice*$cartProduct->productQuantity}}</td>
                </tr>
<?php $total = $total + $itemTotal ?>
                @endforeach
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay="5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" ></span>Back To Shopping</a>
                <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true" ></span>Checkout</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft"data-wow-delay="5s">
                <h4>Shopping Basket</h4>
                <ul>
                    <li>Total<i>-</i> <span>TK.{{$total}}</span></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
                <hr/>
                <a href="{{url('/')}}" class="btn btn-primary pull-right">Checkout</a>
    </div>
</div>-->
@endsection