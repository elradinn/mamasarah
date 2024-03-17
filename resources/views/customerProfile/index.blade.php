@extends('layout.customer')
@section('content')
<section id="profile" class="profile">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <p>Profile Account</p>
    </div>

    <form action="/updateProfile" method="post" onsubmit="return validateForm()" role="form" data-aos="fade-up"
      data-aos-delay="100" class="php-email-form p-3 p-md-4">
      @csrf
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <input id="user_account_name" value="{{old('name', $userAccount->name)}}" type="text" name="name"
              class="form-control mb-4" id="user_account_name" placeholder="Enter username" required />
            <input value="{{old('email', $userAccount->email)}}" type="text" name="email" class="form-control mb-4"
              id="user_account_email" placeholder="Enter email" required />
            <input value="{{old('address', $userAccount->address)}}" type="text" name="address"
              class="form-control mb-4" id="user_account_address" placeholder="Enter delivery address" required />
            <button class="profileButton w-100 mb-3">Update</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script>
initPage()
</script>
@endsection