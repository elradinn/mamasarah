@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_id">Id</label>
                        <input readonly id="user_account_id" name="id" class="form-control form-control-sm" value="{{$userAccount->id}}" type="number" required />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_name">Name</label>
                        <input readonly id="user_account_name" name="name" class="form-control form-control-sm" value="{{$userAccount->name}}" required maxlength="50" />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_email">Email</label>
                        <input readonly id="user_account_email" name="email" class="form-control form-control-sm" value="{{$userAccount->email}}" type="email" required maxlength="50" />
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="user_account_address">Address</label>
                        <input readonly id="user_account_address" name="address" class="form-control form-control-sm" value="{{$userAccount->address}}" required maxlength="50" />
                    </div>
                    <div class="form-check col-md-6 col-lg-4">
                        <input readonly id="user_account_active" name="active" class="form-check-input" type="checkbox" value="1" {{$userAccount->active ? 'checked' : ''}} />
                        <label class="form-check-label" for="user_account_active">Active</label>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-secondary" href="{{$ref}}">Back</a>
                        <a class="btn btn-sm btn-primary" href="/userAccounts/{{$userAccount->id}}/edit?ref={{urlencode($ref)}}">Edit</a>
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