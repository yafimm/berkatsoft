@extends('layouts.template')
@section('content')

<!--================Home Banner Area =================-->
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Shop Category</h2>
                        <p><a href="{{ url('') }}">Home</a> <span>-</span> Shop</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <li>
                                    <a href="#">Frozen Fish</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Dried Fish</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Fresh Fish</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Meat Alternatives</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Fresh Fish</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Meat Alternatives</a>
                                    <span>(250)</span>
                                </li>
                                <li>
                                    <a href="#">Meat</a>
                                    <span>(250)</span>
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets price_rangs_aside">
                        <div class="l_w_title">
                            <h3>Price Filter</h3>
                        </div>
                        <div class="widgets_inner">
                            <div class="range_item">
                                <!-- <div id="slider-range"></div> -->
                                <input type="text" class="js-range-slider" value="" />
                                <div class="d-flex">
                                    <div class="price_text">
                                        <p>Price :</p>
                                    </div>
                                    <div class="price_value d-flex justify-content-center">
                                        <input type="text" class="js-input-from" id="amount" readonly />
                                        <span>to</span>
                                        <input type="text" class="js-input-to" id="amount" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span>{{ $all_product->total() }} </span> Product Found</p>
                            </div>
                            <div class="single_product_menu d-flex">
                              <form class="" action="{{ route('product.shop') }}" method="get">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="search"
                                        aria-describedby="inputGroupPrepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="ti-search"></i></span>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">

                    @foreach($all_product as $product)
                      <div class="col-lg-4 col-sm-6">
                          <div class="single_product_item">
                              <img src="{{ asset('img/product/'. $product->image) }}" alt="">
                              <a href="{{ route('product.shop.show', $product->slug) }}" class="product-link">
                                <div class="single_product_text">
                                    <h5>{{ $product->name }}</h5>
                                    <h3>Rp. {{ yaff_money_format($product->price) }}</h3>
                                    <a href="#" class="add_cart">+ add to cart<i class="ti-shopping-cart"></i></a>
                                </div>
                              </a>
                          </div>
                      </div>
                    @endforeach

                    <div class="col-lg-12">
                        <div class="pageination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <i class="ti-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <i class="ti-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="img/product/product_1.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="img/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->


@endsection()
