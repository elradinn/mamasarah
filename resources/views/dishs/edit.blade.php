@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <form method="post" action="/dishs/{{$dish->id}}?ref={{urlencode($ref)}}" enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="row">
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_image">Image</label>
            <input type="file" id="dish_image" name="image" class="form-control form-control-sm" maxlength="50" />
            <a href="/storage/dishs/{{old('image', $dish->image)}}" target="_blank"
              title="{{old('image', $dish->image)}}"><img class="img-item"
                src="/storage/dishs/{{old('image', $dish->image)}}" /></a>
            @error('image')<span class="text-danger">{{$message}}</span>@enderror
          </div>
          <input type="hidden" id="dish_id" name="id" value="{{old('id', $dish->id)}}" />
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_name">Name</label>
            <input id="dish_name" name="name" class="form-control form-control-sm" value="{{old('name', $dish->name)}}"
              required maxlength="50" />
            @error('name')<span class="text-danger">{{$message}}</span>@enderror
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_price">Price</label>
            <input id="dish_price" name="price" class="form-control form-control-sm"
              value="{{old('price', $dish->price)}}" type="number" step="0.1" required />
            @error('price')<span class="text-danger">{{$message}}</span>@enderror
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_category_id">Category</label>
            <select id="dish_category_id" name="category_id" class="form-control form-control-sm" required>
              @foreach ($categories as $category)
              <option value="{{$category->id}}"
                {{old('category_id', $dish->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}
              </option>
              @endforeach
            </select>
            @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
          </div>
          <div class="form-group col-md-6 col-lg-4">
            <label for="dish_description">Description</label>
            <input id="dish_description" name="description" class="form-control form-control-sm"
              value="{{old('description', $dish->description)}}" maxlength="50" />
            @error('description')<span class="text-danger">{{$message}}</span>@enderror
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
