@extends('frontEnd.master')

@section('title')
Category
@endsection

@section('mainContent')
<div class="checkout">
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

             
                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                            <a href="" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </div>
                    </td>
                    <td class="invert"></td>
                    <td class="invert">
                        <div class="quantity">
                            <form>
                                <div class="input-group">
                                    <input type="number" name="qty" class="form-control" value="">
                                    <span class="input-group-btn">
                                        <button type="submit" name="btn" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-upload"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </td>

                    <td class="invert">TK.</td>
                    <td class="invert">TK.</td>
                </tr>

            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay="5s">
                <a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true" ></span>Back To Shopping</a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft"data-wow-delay="5s">
                <h4>Shopping Basket</h4>
                <ul>
                    <li>Total<i>-</i> <span>TK.</span></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <hr/>
        <a href="{{url('/')}}" class="btn btn-primary pull-right">Checkout</a>
    </div>
</div>
@endsection