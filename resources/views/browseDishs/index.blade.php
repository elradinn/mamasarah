@extends('layout.customer')
@section('content')
<section id="menu" class="menu">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h2>Already curious?</h2>
      <p>Check Our <span>Menu</span></p>
    </div>

    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
      <li class="nav-item">
        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-silog">
          <h4>Silog</h4>
        </a>
      </li>
      <!-- End tab nav item -->

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-drinks">
          <h4>Drinks</h4>
        </a><!-- End tab nav item -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-alacarte">
          <h4>AlaCarte</h4>
        </a>
      </li>
      <!-- End tab nav item -->
    </ul>

    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
      <div class="tab-pane fade active show" id="menu-silog">
        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>Silog</h3>
        </div>

        <div class="row gy-5">
          @foreach ($browseDishs as $browseDish)
          @if ($browseDish->category_name == 'Silog')
          <div class="col-lg-4 menu-item">
            <a href="/storage/dishs/{{$browseDish->image}}" class="glightbox"><img
                src="/storage/dishs/{{$browseDish->image}}" class="menu-img img-fluid" alt="" /></a>
            <h4>{{$browseDish->name}}</h4>
            <p class="ingredients">
              {{$browseDish->description}}
            </p>
            <p class="price">PHP {{$browseDish->price}}</p>
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
      <!-- End Silog Menu Content -->

      <div class="tab-pane fade" id="menu-drinks">
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
      <!-- End Drinks Menu Content -->

      <div class="tab-pane fade" id="menu-alacarte">
        <div class="tab-header text-center">
          <p>Menu</p>
          <h3>AlaCarte</h3>
        </div>

        <div class="row gy-5">
          <div class="row gy-5">
            @foreach ($browseDishs as $browseDish)
            @if ($browseDish->category_name == 'Ala Carte')
            <div class="col-lg-4 menu-item">
              <a href="/storage/dishs/{{$browseDish->image}}" class="glightbox"><img
                  src="/storage/dishs/{{$browseDish->image}}" class="menu-img img-fluid" alt="" /></a>
              <h4>{{$browseDish->name}}</h4>
              <p class="ingredients">
                {{$browseDish->description}}
              </p>
              <p class="price">PHP {{$browseDish->price}}</p>
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
      <!-- End AlaCarte Menu Content -->
    </div>
  </div>
</section>
<!-- End Menu Section -->
@endsection