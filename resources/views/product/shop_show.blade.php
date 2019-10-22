    @extends('layouts.template')

@section('content')

<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Product Detail</h2>
            <p><a href="{{ url('') }}">Home</a> <span>-</span> <a href="{{ route('product.shop') }}">Shop</a> <span>-</span>  {{ $product->name }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner justify-content-between">
      <div class="col-lg-7 col-xl-7">
        <div class="xzoom-container">
             @if($product->stock <= 0)
             <div class="centered">
               <h4>Out of Stock</h4>
             </div>
             @endif
           <img class="xzoom img-fluid" id="xzoom-default" src="{{ asset('img/product/'. $product->image)  }}" xoriginal="{{ asset('img/product/'. $product->image)  }}" />
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="s_product_text">
          <h3>{{ $product->name }}</h3>
          <h2>Rp. {{ yaff_money_format($product->price) }}</h2>
          <ul class="list">
            <li>
              <a class="active" href="#">
                <span>Category</span> : Household</a>
            </li>
            <li>
              <a href="#"> <span>Availibility</span> : {{ $product->stock }} Stock</a>
            </li>
          </ul>
          <p>
            {{ $product->desc }}
          </p>
          <div class="card_area d-flex justify-content-between align-items-center">
            <div class="product_count">
              <span class="inumber-decrement"> <i class="ti-minus"></i></span>
              <input class="input-number" type="text" value="1" min="0" max="10">
              <span class="number-increment"> <i class="ti-plus"></i></span>
            </div>
            <a href="#" class="btn_3">add to cart</a>
            <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->


<!-- product_list part start-->
<section class="product_list best_seller">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="section_tittle text-center">
          <h2>Related Products <span>shop</span></h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="best_product_slider owl-carousel">
          @foreach($related_products as $product)
            <div class="single_product_item">
              <img src="{{ asset('img/product/'. $product->image) }}" alt="">
              <a href="{{ route('product.shop.show', $product->slug) }}">
                <div class="single_product_text">
                  <h4>{{ $product->name }}</h4>
                  <h3>Rp. {{ $product->price }}</h3>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- product_list part end-->



@endsection
