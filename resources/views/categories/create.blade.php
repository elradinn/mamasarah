@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/categories?ref={{urlencode($ref)}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="category_name">Name</label>
                        <input id="category_name" name="name" class="form-control form-control-sm" value="{{old('name')}}" required maxlength="50" />
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
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