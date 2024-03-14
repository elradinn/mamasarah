@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_id">Id</label>
                        <input readonly id="order_header_id" name="id" class="form-control form-control-sm" value="{{$orderHeader->id}}" type="number" required />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_order_date">Order Date</label>
                        <input readonly id="order_header_order_date" name="order_date" class="form-control form-control-sm" value="{{$orderHeader->order_date}}" data-type="date" autocomplete="off" required />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_name">User Account Name</label>
                        <input readonly id="user_account_name" name="user_account_name" class="form-control form-control-sm" value="{{$orderHeader->user_account_name}}" maxlength="50" />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_address">User Account Address</label>
                        <input readonly id="user_account_address" name="user_account_address" class="form-control form-control-sm" value="{{$orderHeader->user_account_address}}" maxlength="50" />
                    </div>
                    <div class="col-12">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Dish Image</th>
                                    <th>Dish</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Remarks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderHeaderOrderDetails as $orderHeaderOrderDetail)
                                <tr>
                                    <td>{{$orderHeaderOrderDetail->dish_image}}</td>
                                    <td>{{$orderHeaderOrderDetail->dish_name}}</td>
                                    <td class="text-right">{{$orderHeaderOrderDetail->qty}}</td>
                                    <td class="text-right">{{$orderHeaderOrderDetail->dish_price}}</td>
                                    <td>{{$orderHeaderOrderDetail->remarks}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="/orderDetails/{{$orderHeaderOrderDetail->id}}/edit" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <form action="/orderDetails/{{$orderHeaderOrderDetail->id}}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i class="fa fa-times"></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-sm btn-primary" href="/orderDetails/create?order_detail_order_id={{$orderHeader->id}}">Add</a>
                        <hr />
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
                        <a class="btn btn-sm btn-primary" href="/orderHeaders/{{$orderHeader->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    initPage(true)
</script>
@endsection