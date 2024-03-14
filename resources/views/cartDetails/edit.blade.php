@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <form method="post" action="/cartDetails/?ref={{urlencode($ref)}}">
        @method("PATCH")
        @csrf
        <div class="row">
          <!-- <div class="form-group col-md-6 col-lg-4">
                        <label for="cart_detail_cart_id">Cart Id</label>
                        <input id="cart_detail_cart_id" name="cart_id" class="form-control form-control-sm" value="{{old('cart_id', $cartDetail->cart_id)}}" type="number" />
                        @error('cart_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="cart_detail_dish_id">Dish Id</label>
                        <select id="cart_detail_dish_id" name="dish_id" class="form-control form-control-sm" required>
                            @foreach ($dishs as $dish)
                            <option value="{{$dish->id}}" {{old('dish_id', $cartDetail->dish_id) == $dish->id ? 'selected' : ''}}>{{$dish->name}}</option>
                            @endforeach
                        </select>
                        @error('dish_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div> -->
          <div class="form-group col-md-6 col-lg-4">
            <label for="cart_detail_qty">Qty</label>
            <input id="cart_detail_qty" name="qty" class="form-control form-control-sm"
              value="{{old('qty', $cartDetail->qty)}}" type="number" required />
            @error('qty')<span class="text-danger">{{$message}}</span>@enderror
          </div>
          <div class="col-12">
            <a class="btn btn-sm btn-secondary" href="{{$ref}}">Cancel</a>
            <button class="btn btn-sm btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
initPage(true)
</script>

@endsection