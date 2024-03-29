@extends('layout.customer')
@section('content')
    <section id="cart" class="cart">
        <div class="container" data-aos="fade-up">
            <div class="section-header d-flex justify-content-between align-items-center">
                <p>Your <span>Cart</span></p>
                @if (count($cartHeaderCartDetails) > 0)
                    <form action="{{ route('payment.pay') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_items" value="{{ json_encode($cartHeaderCartDetails) }}">
                        <button class="proceed-checkout-btn" type="submit">Proceed to Checkout</button>
                    </form>
                @endif
            </div>
            @if (count($cartHeaderCartDetails) > 0)
                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    <div class="tab-pane fade active show" id="cart-starters">
                        <div class="row gy-5">
                            @foreach ($cartHeaderCartDetails as $cartHeaderCartDetail)
                                <div class="col-lg-4 cart-item">
                                    <a href="/storage/dishs/{{ $cartHeaderCartDetail->dish_image }}" class="glightbox"><img
                                            src="/storage/dishs/{{ $cartHeaderCartDetail->dish_image }}"
                                            class="cart-img img-fluid" alt="" /></a>
                                    <h4>{{ $cartHeaderCartDetail->dish_name }}</h4>
                                    <p class="ingredients">
                                        Qty:
                                    <form action="{{ route('cart.updateQuantity') }}" method="POST"
                                        class="quantity-updater">
                                        @csrf
                                        <input type="hidden" name="cartDetail_id"
                                            value="{{ $cartHeaderCartDetail->id }}" />
                                        <input type="number" name="qty" value="{{ $cartHeaderCartDetail->qty }}"
                                            min="1">
                                        <button type="submit">Update</button>
                                    </form>
                                    </p>
                                    <h6>Total</h6>
                                    <p class="price">PHP
                                        {{ $cartHeaderCartDetail->dish_price * $cartHeaderCartDetail->qty }}</p>
                                    <form action="/cartDetails/{{ $cartHeaderCartDetail->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="remove-order" onclick="deleteItem(this)"
                                            title="Delete">Remove</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <h2>Your cart is empty</h2>
                    <p>Check our delicious dishes on <a href="/browse-cart">Browse Dish</a> section!</p>
                </div>
            @endif

        </div>
    </section>
    <script>
        initPage(true)
    </script>
@endsection
