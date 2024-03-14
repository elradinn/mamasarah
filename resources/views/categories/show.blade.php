@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="category_id">Id</label>
                        <input readonly id="category_id" name="id" class="form-control form-control-sm" value="{{$category->id}}" type="number" required />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="category_name">Name</label>
                        <input readonly id="category_name" name="name" class="form-control form-control-sm" value="{{$category->name}}" required maxlength="50" />
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
                        <a class="btn btn-sm btn-primary" href="/categories/{{$category->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
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