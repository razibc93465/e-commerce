<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use Session;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;

class checkoutController extends Controller {

    public function index() {
        return view('frontEnd.checkout.checkoutContent');
    }

    public function customerRegistration(Request $request) {
        $customer = new Customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->emailAddress = $request->emailAddress;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->districtName = $request->districtName;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('/checkout/shipping');
    }

    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shippingContent', ['customerById' => $customerById]);
    }

    public function saveShippingInfo(Request $request) {
        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;

        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkout/payment');
    }

    public function showPaymentForm() {

        return view('frontEnd.checkout.paymentContent');
    }

    public function saveOrderInfo(Request $request) {
//        $cartProducts = Cart::content();
//        echo '<pre>';
//        print_r($cartProducts);
//        exit();        
        $paymentType = $request->paymentType;
        if ($paymentType == 'CashOnDelivery') {
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');
            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            //  $orderDetail = new OrderDetail();
            $orderDetail = new OrderDetail();
          //  $cartProducts = Cart::content();
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail->orderId = Session::get('orderId');
                $orderDetail->productId = $cartProduct->id;
                $orderDetail->productName = $cartProduct->name;
                $orderDetail->productPrice = $cartProduct->price;
                $orderDetail->productQuantity = $cartProduct->qty;
                $orderDetail->save();
            }
            return redirect('/checkout/my-home');
        } else if ($paymentType == 'bkash') {
            return 'Under construction bkash payment type. Please use cash on delivery type';
        } else if ($paymentType == 'paypal') {
            return 'Under construction paypal payment type. Please use cash on delivery type';
        }
    }

    public function customerHome() {

        return view('frontEnd.customer.customerHome');
    }

}
