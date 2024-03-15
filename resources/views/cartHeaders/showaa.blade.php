@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div>
        <div class="row">
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
                  <td class="d-none d-md-table-cell text-center">@if ($cartHeaderCartDetail->dish_image) <a
                      href="/storage/dishs/{{$cartHeaderCartDetail->dish_image}}" target="_blank"
                      title="{{$cartHeaderCartDetail->dish_image}}"><img class="img-list"
                        src="/storage/dishs/{{$cartHeaderCartDetail->dish_image}}" /></a> @endif</td>
                  <td>{{$cartHeaderCartDetail->dish_name}}</td>
                  <td class="text-right">{{$cartHeaderCartDetail->qty}}</td>
                  <td class="text-right">{{$cartHeaderCartDetail->dish_price}}</td>
                  <td class="text-center">
                    <!-- <a class="btn btn-sm btn-success" href="/cartDetails/{{$cartHeaderCartDetail->id}}/edit"
                      title="Edit"><i class="fa fa-pencil"></i></a> -->
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
            <hr />
          </div>
          <div class="col-12 d-flex flex-row">
            <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
            <form action="{{ route('payment.pay') }}" method="POST">
              @csrf
              <input type="hidden" name="order_items" value="{{ json_encode($cartHeaderCartDetails) }}">
              <button class="btn btn-sm btn-success" type="submit">Proceed to Checkout</button>
            </form>
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
