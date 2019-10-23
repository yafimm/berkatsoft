@extends('layouts.template')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Cart</h2>
            <p>Home <span>-</span> Shop <span>-</span>Cart Products</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->
<!--================Cart Area =================-->
@include('_partial.flash_message')
<section class="cart_area padding_top">
  <div class="container">
    <div class="cart_inner">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <form class="" action="{{ route('cart.update') }}" method="post">
            @csrf
            @method('put')
            @foreach($all_cart as $cart)
            <tr id="row-{{$cart->id}}">
              <input type="hidden" name="rowId[]" value="{{ $cart->rowId }}">
              <td>
                <div class="media">
                  <div class="d-flex">
                    <img class="img-fluid" src="{{ asset('img/product/'. $cart->options->image) }}" alt="" />
                  </div>
                  <div class="media-body">
                    <a href="{{ route('product.shop.show', $cart->options->slug) }}">{{ $cart->name }}</a>
                  </div>
                </div>
              </td>
              <td>
                <h5>Rp. {{ yaff_money_format($cart->price) }}</h5>
              </td>
              <td>
                <div class="product_count">
                  <input class="input-number" name="qty[]" type="number" value="{{ $cart->qty }}" min="0" max="10">
                </div>
              </td>
              <td>
                <h5>Rp. {{ yaff_money_format($cart->price * $cart->qty) }}</h5>
              </td>
            </tr>
            @endforeach

            <tr class="bottom_button">
              <td>

              </td>
              <td></td>
              <td>
              </td>
              <td>
                <div class="cupon_text float-right">
                  <form id="delete_cart" action="{{ route('cart.destroy') }}" method="POST">
                  @csrf
                  @method('delete')
                  </form>
                  <a class="btn btn-danger" href="{{ route('cart.destroy' )}}"  onclick="event.preventDefault();
              document.getElementById('delete_cart').submit();">Delete Cart</a>
                  <button class="btn btn-success" type="submit" href="#">Update Cart</button>
                </div>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <h5>Subtotal</h5>
              </td>
              <td>
                <h5>Rp. {{ yaff_money_format(integer_format(Cart::subtotal())) }}</h5>
              </td>
            </tr>
          </form>
          </tbody>
        </table>
        <div class="mb-10">
          <form id="order_checkout" action="{{ route('order.checkout') }}" method="POST">
          @csrf
          @method('POST')
          <textarea class="single-textarea" name="address" placeholder="Address" onfocus="this.placeholder = ''"
          onblur="this.placeholder = 'Address'" required></textarea>
          </form>
        </div>
        <small class="form-text text-info">*specify your address for free shipping</small>

        <div class="checkout_btn_inner float-right">
          <a class="btn_1" href="{{ route('product.shop') }}">Continue Shopping</a>
          <a class="btn_1 checkout_btn_1" href="{{route('order.store')}}" onclick="event.preventDefault();
      document.getElementById('order_checkout').submit();">Proceed to checkout</a>

        </div>
      </div>
    </div>
</section>
<!--================End Cart Area =================-->

@endsection
