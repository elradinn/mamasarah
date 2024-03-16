@extends('layout')
@section('content')
<div class="container home">
  <div class="row justify-content-center">

    <div class="col-md-12 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <h2>
            Date: <?php echo date('M j, Y'); ?><br>
            Time: <?php echo date('h:i:s A'); ?>
          </h2>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-users fa-4x mb-3"></i>
          <h5 class="card-title">Users</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-cutlery fa-4x mb-3"></i>
          <h5 class="card-title">Dishes</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-shopping-cart fa-4x mb-3"></i>
          <h5 class="card-title">Orders</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-money fa-4x mb-3"></i>
          <h5 class="card-title">Total Earnings</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-cog fa-4x mb-3"></i>
          <h5 class="card-title">Processing Orders</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-check-circle fa-4x mb-3"></i>
          <h5 class="card-title">Delivered Orders</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-times-circle fa-4x mb-3"></i>
          <h5 class="card-title">Cancelled Orders</h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card text-center">
        <div class="card-body">
          <i class="fa fa-truck fa-4x mb-3"></i>
          <h5 class="card-title">Dispatched Orders</h5>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection