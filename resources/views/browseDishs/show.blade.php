@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div>
        <div class="row">
          <div class="form-group col-md-6 col-lg-4"><label>Image</label>
            <div><a href="/storage/dishs/{{$browseDish->image}}" target="_blank" title="{{$browseDish->image}}"><img
                  class="img-item" src="/storage/dishs/{{$browseDish->image}}" /></a></div>
          </div>
          <input readonly type="hidden" id="browse_dish_id" name="id" value="{{$browseDish->id}}" />
          <div class="form-group col-md-6 col-lg-4">
            <label>Name</label>
            <div class="form-control-plaintext form-control-sm ml-1">
              {{$browseDish->name}}
            </div>
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label>Price</label>
            <div class="form-control-plaintext form-control-sm ml-1">
              {{$browseDish->price}}
            </div>
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label>Category</label>
            <div class="form-control-plaintext form-control-sm ml-1">
              {{$browseDish->category_name}}
            </div>
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label>Description</label>
            <div class="form-control-plaintext form-control-sm ml-1">
              {{$browseDish->description}}
            </div>
          </div>
          <div class="col-12">
            <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
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