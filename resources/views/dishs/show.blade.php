@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4"><label>Image</label>
                        <div><a href="/storage/dishs/{{$dish->image}}" target="_blank" title="{{$dish->image}}"><img class="img-item" src="/storage/dishs/{{$dish->image}}" /></a></div>
                    </div>
                    <input readonly type="hidden" id="dish_id" name="id" value="{{$dish->id}}" />
                    <div class="form-group col-md-6 col-lg-4">
                        <label>Name</label>
                        <div class="form-control-plaintext form-control-sm ml-1">
                            {{$dish->name}}
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label>Price</label>
                        <div class="form-control-plaintext form-control-sm ml-1">
                            {{$dish->price}}
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label>Category Name</label>
                        <div class="form-control-plaintext form-control-sm ml-1">
                            {{$dish->category_name}}
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label>Description</label>
                        <div class="form-control-plaintext form-control-sm ml-1">
                            {{$dish->description}}
                        </div>
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