@extends('layout.customer')
@section('content')
<section id="menu" class="menu">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Already curious?</h2>
      <p>Check Our <span>Menu</span></p>
    </div>

    <!-- Tab Contents -->
    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
      <!-- Tab Pane -->
      <div class="tab-pane fade active show" id="silog">
        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Silog</h3>
        </div>

        <div class="row gy-5">
          @foreach ($browseDishs as $browseDish)
          <div class="col-lg-4 menu-item">
            <a href="/storage/dishs/{{$browseDish->image}}" class="glightbox"><img
                src="/storage/dishs/{{$browseDish->image}}" class="menu-img img-fluid" alt="" /></a>
            <h4>{{$browseDish->name}}</h4>
            <p class="ingredients">
              {{$browseDish->description}}
            </p>
            <p class="price">PHP {{$browseDish->price}}</p>
            <!-- <a href="" class="add-order">Add to Order</a> -->
            <form action="{{ route('cart.add') }}" method="POST">
              @csrf
              <input type="hidden" name="dish_id" value="{{$browseDish->id}}" />
              <button class="add-order" type="submit" onclick="alert('Dish added successfully')">Add to Cart</button>
            </form>
          </div>
          @endforeach
        </div>
      </div>
      <!-- End Pane -->

      <!-- Tab Pane -->
      <div class="tab-pane fade active show" id="drinks">
        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Drinks</h3>
        </div>

        <div class="row gy-5">
          @foreach ($browseDishs as $browseDish)
          @if ($browseDish->category_name == 'Drinks')
          <div class="col-lg-4 menu-item">
            <a href="/storage/dishs/{{$browseDish->image}}" class="glightbox"><img
                src="/storage/dishs/{{$browseDish->image}}" class="menu-img img-fluid" alt="" /></a>
            <h4>{{$browseDish->name}}</h4>
            <p class="ingredients">
              {{$browseDish->description}}
            </p>
            <p class="price">PHP {{$browseDish->price}}</p>
            <!-- <a href="" class="add-order">Add to Order</a> -->
            <form action="{{ route('cart.add') }}" method="POST">
              @csrf
              <input type="hidden" name="dish_id" value="{{$browseDish->id}}" />
              <button class="add-order" type="submit" onclick="alert('Dish added successfully')">Add to Cart</button>
            </form>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection