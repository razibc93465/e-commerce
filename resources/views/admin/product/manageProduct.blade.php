@extends('admin.master')

@section('content')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Manufacturer Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Publication Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{$product->productName}}</th>
            <td>{{$product->categoryName}}</td>
            <td>{{$product->manufacturerName}}</td>
            <td>Tk. {{$product->productPrice}}</td>
            <td>{{$product->productQuantity}}</td>
            <td>{{$product->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
            <td>
                <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="Product View">
                    <span class="glyphicon glyphicon-info-sign"></span>
                </a>
                <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" title="Product Delete" onclick="return confirm('Are you sure to delete this');">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection