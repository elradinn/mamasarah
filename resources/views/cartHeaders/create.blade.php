@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/cartHeaders?ref={{urlencode($ref)}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="cart_header_user_id">User Id</label>
                        <select id="cart_header_user_id" name="user_id" class="form-control form-control-sm" required>
                            @foreach ($userAccounts as $userAccount)
                            <option value="{{$userAccount->id}}" {{old('user_id') == $userAccount->id ? 'selected' : ''}}>{{$userAccount->name}}</option>
                            @endforeach
                        </select>
                        @error('user_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Cancel</a>
                        <button class="btn btn-sm btn-primary">Submit</button>
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