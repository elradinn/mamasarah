@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="center-container">
                <div class="row justify-content-center">
                    <div class="card card-width">
                        <div class="card-header">
                            <h3>Reset Password</h3>
                        </div>
                        <div class="card-body">
                            <i class="login fa fa-user-circle"></i>
                            <form method="post" action="/reset-password">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="user_account_email">Email</label>
                                        <input id="user_account_email" name="email" class="form-control form-control-sm" value="{{old('email')}}" type="email" required maxlength="50" />
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-sm btn-secondary btn-block">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                            @if(isset($success))<span class="text-success">A reset password link has been sent to your email</span>@endif
                            @if(isset($error))<span class="text-danger">Email not found!</span>@endif
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
