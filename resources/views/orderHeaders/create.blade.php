@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="post" action="/orderHeaders?ref={{urlencode($ref)}}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_order_date">Order Date</label>
                        <input id="order_header_order_date" name="order_date" class="form-control form-control-sm" value="{{old('order_date')}}" data-type="date" autocomplete="off" required />
                        @error('order_date')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6 col-lg-4">
                        <label for="order_header_user_id">User</label>
                        <select id="order_header_user_id" name="user_id" class="form-control form-control-sm" required>
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