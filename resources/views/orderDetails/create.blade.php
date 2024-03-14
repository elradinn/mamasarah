@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/orderDetails?ref={{urlencode($ref)}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_detail_order_id">Order Id</label>
                        <input id="order_detail_order_id" name="order_id" class="form-control form-control-sm" value="{{old('order_id')}}" type="number" />
                        @error('order_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_detail_qty">Qty</label>
                        <input id="order_detail_qty" name="qty" class="form-control form-control-sm" value="{{old('qty')}}" type="number" required />
                        @error('qty')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_detail_dish_id">Dish</label>
                        <select id="order_detail_dish_id" name="dish_id" class="form-control form-control-sm" required>
                            @foreach ($dishs as $dish)
                            <option value="{{$dish->id}}" {{old('dish_id') == $dish->id ? 'selected' : ''}}>{{$dish->name}}</option>
                            @endforeach
                        </select>
                        @error('dish_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_detail_remarks">Remarks</label>
                        <input id="order_detail_remarks" name="remarks" class="form-control form-control-sm" value="{{old('remarks')}}" maxlength="50" />
                        @error('remarks')<span class="text-danger">{{$message}}</span>@enderror
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