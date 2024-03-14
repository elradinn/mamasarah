@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="center-container">
        <div class="row justify-content-center">
          <div class="card card-width">
            <div class="card-header">
              <h3>Register</h3>
            </div>
            <div class="card-body">
              <i class="login fa fa-user-circle"></i>
              <form method="post" action="/register">
                @csrf
                <div class="row">
                  <div class="form-group col-12">
                    <label for="user_account_name">User Name</label>
                    <input id="user_account_name" name="name" class="form-control form-control-sm"
                      value="{{old('name')}}" required maxlength="50" />
                  </div>
                  <div class="form-group col-12">
                    <label for="user_account_email">Email</label>
                    <input id="user_account_email" name="email" class="form-control form-control-sm"
                      value="{{old('email')}}" required maxlength="50" />
                  </div>
                  <div class="form-group col-12">
                    <label for="user_account_password">Password</label>
                    <input id="user_account_password" name="password" class="form-control form-control-sm"
                      value="{{old('password')}}" type="password" required maxlength="100" />
                  </div>
                  <div class="form-group col-12">
                    <label for="user_account_address">Address</label>
                    <input id="user_account_address" name="address" class="form-control form-control-sm"
                      value="{{old('address')}}" required maxlength="100" />
                  </div>
                  <div class="col-12">
                    <button class="btn btn-sm btn-secondary btn-block">Register</button>
                    <a href="/login">Already have account? Login in.</a>
                  </div>
                </div>
              </form>
              @foreach($errors->all() as $message )<span class="text-danger">{{$message}}</span>@endforeach
            </div>
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