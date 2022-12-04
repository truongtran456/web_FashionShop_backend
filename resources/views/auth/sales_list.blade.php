<div class="container-fluid">
    <h3 class="ltext-103 cl5" style="
    margin-left: 90px;">
        SALE OFF
    </h3>
    <div class="row">
        <div class="col-lg-3">
            <div class="product-large set-bg" data-setbg="/template/images/women-large.jpg" style="background-image: url(&quot;/template/images/women-large.jpg&quot;);">
                <h2>Sale hấp dẫn 50%</h2>
                <a href="#">Discover More</a>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-1" style="max-width: 74.666667%;padding-right: 43px;
    padding-left: 105px;">

            <div class="filter-control">
                <ul>
                    <li>All</li>
                    @foreach($menus as $menu)
                        <li>
                            {{ $menu->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
                <div class="product-slider owl-carousel">
                    @foreach($sales as $key => $sale)
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ $sale->thumb }}" alt="{{ $sale->name }}">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href=""><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>

                        <div class="pi-text">
{{--                            <div class="catagory-name">Coat</div>--}}
                            <a href="#">

                                <h5>{{$sale->name}}</h5>
                            </a>
                            <div class="product-price">
                                {!!  \App\Helpers\Helper::price($sale->price, $sale->price_sale)  !!}
                                <span>{{$sale->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>
