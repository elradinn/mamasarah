@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div>
        <div class="row">
          <div class="form-group col-md-6 col-lg-4"><label>Image</label>
            <div><a href="/storage/dishs/{{$dish->image}}" target="_blank" title="{{$dish->image}}"><img
                  class="img-item" src="/storage/dishs/{{$dish->image}}" /></a></div>
          </div>
          <input readonly type="hidden" id="dish_id" name="id" value="{{$dish->id}}" />
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_name">Name</label>
            <input readonly id="dish_name" name="name" class="form-control form-control-sm" value="{{$dish->name}}"
              required maxlength="50" />
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_price">Price</label>
            <input readonly id="dish_price" name="price" class="form-control form-control-sm" value="{{$dish->price}}"
              type="number" step="0.1" required />
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_category_id">Category</label>
            <input readonly id="dish_category_id" name="category_id" class="form-control form-control-sm"
              value="{{$dish->category_id}}" type="number" required />
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_description">Description</label>
            <input readonly id="dish_description" name="description" class="form-control form-control-sm"
              value="{{$dish->description}}" maxlength="50" />
          </div>
          <div class="col-12">
            <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
            <a class="btn btn-sm btn-primary" href="/dishs/{{$dish->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
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