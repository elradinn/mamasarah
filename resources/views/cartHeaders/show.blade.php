@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      @if($cartHeader)
      <div>
        <div class="row">
          <div class="form-group col-md-6 col-lg-4">
            <label for="cart_header_id">Id</label>
            <input readonly id="cart_header_id" name="id" class="form-control form-control-sm"
              value="{{$cartHeader->id}}" type="number" required />
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="cart_header_user_id">User Id</label>
            <input readonly id="cart_header_user_id" name="user_id" class="form-control form-control-sm"
              value="{{$cartHeader->user_id}}" type="number" required />
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="user_account_name">User Account Name</label>
            <input readonly id="user_account_name" name="user_account_name" class="form-control form-control-sm"
              value="{{$cartHeader->user_account_name}}" maxlength="50" />
          </div>
          <div class="col-12">
            <table class="table table-sm table-striped table-hover">
              <thead>
                <tr>
                  <th>Dish Image</th>
                  <th>Dish Name</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cartHeaderCartDetails as $cartHeaderCartDetail)
                <tr>
                  <td>{{$cartHeaderCartDetail->dish_image}}</td>
                  <td>{{$cartHeaderCartDetail->dish_name}}</td>
                  <td class="text-right">{{$cartHeaderCartDetail->qty}}</td>
                  <td class="text-right">{{$cartHeaderCartDetail->dish_price}}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-secondary" href="/cartDetails/{{$cartHeaderCartDetail->id}}"
                      title="View"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-primary" href="/cartDetails/{{$cartHeaderCartDetail->id}}/edit"
                      title="Edit"><i class="fa fa-pencil"></i></a>
                    <form action="/cartDetails/{{$cartHeaderCartDetail->id}}" method="POST">
                      @method("DELETE")
                      @csrf
                      <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i
                          class="fa fa-times"></i></a>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a class="btn btn-sm btn-primary" href="/cartDetails/create?cart_detail_cart_id={{$cartHeader->id}}">Add</a>
            <hr />
          </div>
          <div class="col-12">
            <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
            <a class="btn btn-sm btn-primary"
              href="/cartHeaders/{{$cartHeader->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
          </div>
        </div>
      </div>
      @else
      <div>
        <h1>Your cart is empty!</h1>
      </div>
      @endif
    </div>
  </div>
</div>
<script>
initPage(true)
</script>
@endsection
