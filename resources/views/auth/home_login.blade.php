@extends('auth.login')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1" >
                <section class="user" style=" display: flex; height: 700px; ">
                    <div class="user_options-container" >
                        <div class="user_options-text">
                            <div class="user_options-unregistered">
                                <h2 class="user_unregistered-title">Don't have an account?</h2>
                                <p class="user_unregistered-text">Create now!</p>
                                <button class="user_unregistered-signup" id="signup-button">Sign up</button>
                            </div>

                            <div class="user_options-registered">
                                <h2 class="user_registered-title">Already have a account!</h2>
                                <p class="user_registered-text">Get started..</p>
                                <button class="user_registered-login" id="login-button">Login</button>
                            </div>
                        </div>

                        <div class="user_options-forms" id="user_options-forms">
                            <div class="user_forms-login">
                                <h2 class="forms_title">Login</h2>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                <form class="forms_form" action="{{route('login-user')}}" method="post">
                                    @csrf
                                    <fieldset class="forms_fieldset">
                                        <div class="forms_field">
                                            <input type="email" placeholder="Email" class="forms_field-input" name="email" value="{{old('email')}}" />
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                        <div class="forms_field">
                                            <input type="password" placeholder="Password" class="forms_field-input" name="password" value="{{old('password')}}" />
                                            <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                        </div>
                                    </fieldset>
                                    <div class="forms_buttons">
                                        <button type="button" class="forms_buttons-forgot">Forgot password?</button>
                                        <input type="submit" value="Log In" class="forms_buttons-action">
                                    </div>
                                </form>
                            </div>
                            <div class="user_forms-signup">
                                <h2 class="forms_title">Sign Up</h2>
{{--                                @include('admin.alert')--}}

                                <form class="forms_form" action="{{route('register-user')}}" method="post">

                                    @csrf
                                    <fieldset class="forms_fieldset">
                                        <div class="forms_field">
                                            <input type="text" placeholder="Full Name" class="forms_field-input" id="name" name="name" value="{{old('name')}}" required />
                                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                        </div>
                                        <div class="forms_field">
                                            <input type="email" placeholder="Email" class="forms_field-input" name="email" value="{{old('email')}}" required />
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                        <div class="forms_field">
                                            <input type="password" placeholder="Password" class="forms_field-input" name="password" value="{{old('password')}}" required />
                                            <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                        </div>
                                    </fieldset>
                                    <div class="forms_buttons">
                                        <input type="submit" value="Sign up" class="forms_buttons-action">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    </section>


    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @foreach($menus as $menu)
                    <div class="col-lg-4">
                        <div class="single-banner">
                            <img src="/template/images/banner-1.jpg" alt="">
                            <div class="inner-text">
                                <a href="/danh-muc/{{ $menu->id }}-{{\Str::slug($menu->name,'-')}}.html">
                                    <h4>
                                        {{ $menu->name }}
                                    </h4></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Section End -->


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>
                </div>
            </div>

            <div id="loadProduct">
                @include('auth.products_list')
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"
                   style="cursor:pointer;">
                    Load More
                </a>
            </div>
        </div>
    </section>

    <!-- woment -->
    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        @include('auth.sales_list')
    </section>
    <!-- Women Banner Section End -->
@endsection
