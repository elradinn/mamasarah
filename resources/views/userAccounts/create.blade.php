@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/userAccounts?ref={{urlencode($ref)}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_name">Name</label>
                        <input id="user_account_name" name="name" class="form-control form-control-sm" value="{{old('name')}}" required maxlength="50" />
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_email">Email</label>
                        <input id="user_account_email" name="email" class="form-control form-control-sm" value="{{old('email')}}" type="email" required maxlength="50" />
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_address">Address</label>
                        <input id="user_account_address" name="address" class="form-control form-control-sm" value="{{old('address')}}" required maxlength="50" />
                        @error('address')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-check col-md-6 col-lg-4">
                        <input id="user_account_active" name="active" class="form-check-input" type="checkbox" value="1" {{old('active') ? 'checked' : ''}} />
                        <label class="form-check-label" for="user_account_active">Active</label>
                        @error('active')<span class="text-danger">{{$message}}</span>@enderror
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