@extends('layouts.website')

@section('content')

    <style>

        .carousel-item img{
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .banner-icons{
            display:flex;
            align-items:center;
            justify-content:center;
            width:40px;
            height:40px;
            border-radius:50%;
            cursor: pointer;
            background-color: white;
            color: black;

        }
        .carousel-indicators li{
            height: 0.8rem;
            width: .8rem;
            border-radius: 50%;
            background-color: white;
        }
        html { scroll-behavior: smooth; }
    </style>
    <!--slider section start-->
    <div class="hero-section section position-relative">

        <div class="container">
            <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0"  class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
                <li data-target="#mycarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @if(count($slider) > 0)
                        @foreach ($slider as $index=>$item)
                            @if($index == 0)
                                <div class="carousel-item active">
                                    <img src="{{ $item->photo }}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ $item->photo }}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="https://images.pexels.com/photos/462024/pexels-photo-462024.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/258109/pexels-photo-258109.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/432013/pexels-photo-432013.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                    <div class="banner-icons">
                        {{-- <span class="fas fa-angle-left"></span> --}}
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                    <div class="banner-icons">
                        {{-- <span class="fas fa-angle-right"></span> --}}
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Hero Item start-->
        {{-- <div >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-12 ">
                                <div class="property-slider-2">
                                    <div class="property-2" style="    height: 500px;">
                                        <div class="property-inner">
                                            <a href="single-properties.html" class="image"><img src="{{asset("website/assets")}}/images/property/property-13.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="property-2" style="    height: 500px;">
                                        <div class="property-inner">
                                            <a href="single-properties.html" class="image"><img src="{{asset("website/assets")}}/images/property/property-14.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--Hero Item end-->

    </div>
    <!--slider section end-->

    <!--Search Section start-->
    <div class="search-section section pt-0 pt-sm-60 pt-xs-50 ">
        <div class="container">

            <!--Section Title start-->
            <div class="row d-flex d-lg-none">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Find Your Home</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row" style="    margin-top: 100px;">
                <div class="col-12">

                    <!--Hero Search start-->
                    <div class="hero-search">

                        <form action="{{ route("website.posts.search") }}" method="GET">

                            <div>
                                <h4>{{ __('website.country') }}</h4>
                                <select class="nice-select country" name="country_id">
                                    <option>{{ __('website.all_countries') }}</option>
                                    @if(count($countries) > 0)
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div>
                                <h4>{{ __('website.city') }}</h4>
                                <select class="nice-select city" name="city_id">
                                    <option class="current">{{ __('website.all_cities') }}</option>
                                </select>
                            </div>

                            <div>
                                <h4>{{ __('website.category') }}</h4>
                                <select class="nice-select category "  name="category_id" >
                                    <option class="option selected focus">{{ __('website.all_categories') }}</option>
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>

                            <div>
                                <h4>{{  __('website.sub_category') }}</h4>
                                <select class="nice-select sub_category"  name="sub_category_id">
                                    <option class="current">{{  __('website.all_sub_categories') }}</option>
                                </select>
                            </div>
{{--
                            <div>
                                <h4>Bathrooms</h4>
                                <div>
                                    <div id="search-price-range"></div>
                                </div>
                            </div> --}}

                            <div>
                               <h4>{{ __('website.search') }}</h4>
                                <div class="submit">
                                    <button>{{ __('website.search') }}</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!--Hero Search end-->

                </div>
            </div>

        </div>
    </div>
    <!--Search Section end-->

    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10" id="posts">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>{{ __("website.newly_added_property") }}</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                @if(count($posts) >0)
                    @foreach ($posts as $post)
                        <!--Property start-->
                        <div class="property-item col-lg-4 col-md-6 col-12 mb-40 ">
                            <div class="property-inner">
                                <div class="image">
                                    <a href="{{ route("website.post.show",@$post->id) }}"><img src="{{asset("@$post->photo")}}" alt=""></a>
                                    {{-- <ul class="property-feature">
                                        <li>
                                            <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                        </li>
                                        <li>
                                            <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                        </li>
                                        <li>
                                            <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                        </li>
                                        <li>
                                            <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                        </li>
                                    </ul> --}}
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <h3 class="title"><a href="{{ route("website.post.show",@$post->id) }}">{{ @$post->title }}</a></h3>
                                        <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">{{ @$post->country->name }}  &nbsp; {{ @$post->city->name }}</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">{{  @$post->price }}<span>{{ @$post->currency }}</span></span>
                                            <span class="type">{{  @$post->category->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                    @endforeach

                @endif

                <!--Property start-->
                {{-- <div class="property-item col-lg-4 col-md-6 col-12 mb-40">
                    <div class="property-inner">
                        <div class="image">
                            <span class="label">Feature</span>
                            <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-6.jpg" alt=""></a>
                            <ul class="property-feature">
                                <li>
                                    <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                </li>
                                <li>
                                    <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                </li>
                                <li>
                                    <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                </li>
                                <li>
                                    <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <div class="left">
                                <h3 class="title"><a href="single-properties.html">Radison de Villa</a></h3>
                                <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span>
                            </div>
                            <div class="right">
                                <div class="type-wrap">
                                    <span class="price">$550<span>M</span></span>
                                    <span class="type">For Rent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!--Property end-->

            </div>

        </div>
    </div>
    <!--New property section end-->

    <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection-->
    <div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10" id="feature">
        <div class="container">
            <div class="row row-25 align-items-center">

                <!--Feature Image start-->
                <div class="col-lg-5 col-12 order-1 order-lg-2 mb-40">
                    <div class="feature-image"><img src="{{asset("website/assets")}}/images/others/feature.png" alt=""></div>
                </div>
                <!--Feature Image end-->

                <div class="col-lg-7 col-12 order-2 order-lg-1 mb-40">
                    <div class="feature-wrap row row-25">

                        <!--Feature start-->
                        <div class="col-sm-6 col-12 mb-50">
                            <div class="feature">
                                <div class="icon"><i class="pe-7s-piggy"></i></div>
                                <div class="content">
                                    <h4>Low Cost</h4>
                                    <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                                </div>
                            </div>
                        </div>
                        <!--Feature end-->

                        <!--Feature start-->
                        <div class="col-sm-6 col-12 mb-50">
                            <div class="feature">
                                <div class="icon"><i class="pe-7s-display1"></i></div>
                                <div class="content">
                                    <h4>Good Marketing</h4>
                                    <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                                </div>
                            </div>
                        </div>
                        <!--Feature end-->

                        <!--Feature start-->
                        <div class="col-sm-6 col-12 mb-50">
                            <div class="feature">
                                <div class="icon"><i class="pe-7s-map"></i></div>
                                <div class="content">
                                    <h4>Easy to Find</h4>
                                    <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                                </div>
                            </div>
                        </div>
                        <!--Feature end-->

                        <!--Feature start-->
                        <div class="col-sm-6 col-12 mb-50">
                            <div class="feature">
                                <div class="icon"><i class="pe-7s-shield"></i></div>
                                <div class="content">
                                    <h4>Reliable</h4>
                                    <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                                </div>
                            </div>
                        </div>
                        <!--Feature end-->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection end-->

    <!--Download apps section start-->
    <div class="download-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50" style="background-image: url({{asset("website/assets")}}/images/bg/download-bg.jpg)" id="app">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--Download Content start-->
                    <div class="download-content">
                        <h1>{{__('website.download_app')}}</h1>
                        <div class="buttons">
                            <a href="#">
                                <i class="fa-brands fa-apple"></i>
                                <span class="text">
                                    <span>Available on the</span>
                                    Apple Store
                                </span>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-android"></i>
                                <span class="text">
                                    <span>Get it on</span>
                                    Google Play
                                </span>
                            </a>
                        </div>
                        <div class="image"><img src="{{asset("website/assets")}}/images/others/app.png" style="    width: 700px;" alt=""></div>
                    </div>
                    <!--Download Content end-->

                </div>
            </div>
        </div>
    </div>
    <!--Download apps section end-->

    <!--Services section start-->
    <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" id="our_service">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>{{ __('website.our_service') }}</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row row-30 align-items-center">
                <div class="col-lg-5 col-12 mb-30">
                    <div class="property-slider-2">

                        @if(count($slider) > 0)
                            @foreach ($slider as $index=>$item)
                                <div class="property-2">
                                    <div class="property-inner">
                                        <a href="#" class="image"><img src="{{asset("$item->photo")}}" alt=""></a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="property-2">
                                <div class="property-inner">
                                    <a href="#" class="image"><img src="{{asset("website/assets")}}/images/property/property-13.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="property-2">
                                <div class="property-inner">
                                    <a href="#" class="image"><img src="{{asset("website/assets")}}/images/property/property-14.jpg" alt=""></a>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row row-20">

                        @if(count($categories) > 0)
                            @foreach ($categories as $category )
                                <!--Service start-->
                                <div class="col-md-6 col-12 mb-30">
                                    <div class="service">
                                        <div class="service-inner">
                                            <div class="head">
                                                <div class="icon"><img src="{{ asset("$category->icon") }}" alt=""></div>
                                                <h4>{{ $category->name }}</h4>
                                            </div>
                                            <div class="content">
                                                <p>{{ $category->desc }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Service end-->
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Services section end-->

    <!--Feature property section start-->
    <div class="property-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" id="feature_post">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>{{ __('admin.feature_post') }}</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                <!--Property Slider start-->
                <div class="property-carousel section">

                    @if(count($postFeatures) > 0)
                        @foreach ($postFeatures as $post )
                            <!--Property start-->
                            <div class="property-item col">
                                <div class="property-inner">
                                    <div class="image">
                                        <a href="{{ route("website.post.show",@$post->id) }}"><img src="{{asset("@$post->photo")}}" alt=""></a>
                                        {{-- <ul class="property-feature">
                                            <li>
                                                <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                            </li>
                                            <li>
                                                <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                            </li>
                                            <li>
                                                <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                            </li>
                                            <li>
                                                <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <div class="content">
                                        <div class="left">
                                            <h3 class="title"><a href="single-properties.html">{{ @$post->title }}</a></h3>
                                            <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">{{ @$post->country->name }}  &nbsp; {{ @$post->city->name }}</span>
                                        </div>
                                        <div class="right">
                                            <div class="type-wrap">
                                                <span class="price">{{  @$post->price }}<span>{{ @$post->currency }}</span></span>
                                                <span class="type">{{  @$post->category->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Property end-->
                        @endforeach
                    @endif

                    <!--Property start-->
                    {{-- <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <span class="label">Feature</span>
                                <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-2.jpg" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="single-properties.html">Marvel de Villa</a></h3>
                                    <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">$2550</span>
                                        <span class="type">For Sale</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--Property end-->

                    <!--Property start-->
                    {{-- <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <span class="label">popular</span>
                                <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-3.jpg" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h3>
                                    <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">215 L AH Rod, California</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">$550<span>M</span></span>
                                        <span class="type">For Rent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--Property end-->

                    <!--Property start-->
                    {{-- <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-4.jpg" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="single-properties.html">MayaKanon de Villa</a></h3>
                                    <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">12 EA 1st Ave, Washington</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">$550<span>M</span></span>
                                        <span class="type">For Rent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--Property end-->

                    <!--Property start-->
                    {{-- <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-5.jpg" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="single-properties.html">Azorex de South Villa</a></h3>
                                    <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">668 L 2nd Ave, Boston</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">$2550</span>
                                        <span class="type">For Sale</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--Property end-->

                    <!--Property start-->
                    {{-- <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <span class="label">Feature</span>
                                <a href="single-properties.html"><img src="{{asset("website/assets")}}/images/property/property-6.jpg" alt=""></a>
                                <ul class="property-feature">
                                    <li>
                                        <span class="area"><img src="{{asset("website/assets")}}/images/icons/area.png" alt="">550 SqFt</span>
                                    </li>
                                    <li>
                                        <span class="bed"><img src="{{asset("website/assets")}}/images/icons/bed.png" alt="">6</span>
                                    </li>
                                    <li>
                                        <span class="bath"><img src="{{asset("website/assets")}}/images/icons/bath.png" alt="">4</span>
                                    </li>
                                    <li>
                                        <span class="parking"><img src="{{asset("website/assets")}}/images/icons/parking.png" alt="">3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <h3 class="title"><a href="single-properties.html">Radison de Villa</a></h3>
                                    <span class="location"><img src="{{asset("website/assets")}}/images/icons/marker.png" alt="">12 1st Ave, New Yourk</span>
                                </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price">$550<span>M</span></span>
                                        <span class="type">For Rent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--Property end-->

                </div>
                <!--Property Slider end-->

            </div>

        </div>
    </div>
    <!--Feature property section end-->

    <!--CTA Section start-->
    {{-- <div class="cta-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-image: url({{asset("website/assets")}}/images/bg/cta-bg.jpg)">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!--CTA start-->
                    <div class="cta-content text-center">
                        <h1>Want to <span>Buy</span> New Property or <span>Sell</span> One <br> Do it in Seconds With <span>Khonike</span></h1>
                        <div class="buttons">
                            <a href="add-properties.html">Add Property</a>
                            <a href="properties.html">Browse Properties</a>
                        </div>
                    </div>
                    <!--CTA end-->

                </div>
            </div>
        </div>
    </div> --}}
    <!--CTA Section end-->

    <!--Agent Section start-->
    {{-- <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Agents</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">
                <div class="agent-carousel section">

                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="{{asset("website/assets")}}/images/agent/agent-1.jpg" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html">Donald Palmer</a></h4>
                                <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">5 Properties</span>
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->

                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="{{asset("website/assets")}}/images/agent/agent-2.jpg" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html">Sean Hamilton</a></h4>
                                <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">2 Properties</span>
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->

                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="{{asset("website/assets")}}/images/agent/agent-3.jpg" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html">Christine Gilbert</a></h4>
                                <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">4 Properties</span>
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->

                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="{{asset("website/assets")}}/images/agent/agent-4.jpg" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html">Jason Patel</a></h4>
                                <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">2 Properties</span>
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->

                    <!--Agent satrt-->
                    <div class="col">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="agent-details.html"><img src="{{asset("website/assets")}}/images/agent/agent-5.jpg" alt=""></a>
                                <div class="social">
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="agent-details.html">Debra Myers</a></h4>
                                <a href="#" class="phone">(756) 447 5779</a>
                                <a href="#" class="email">info@example.com</a>
                                <span class="properties">3 Properties</span>
                            </div>
                        </div>
                    </div>
                    <!--Agent end-->

                </div>
            </div>
        </div>
    </div> --}}
    <!--Agent Section end-->

    <!--News Section start-->
    {{-- <div class="news-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Latest News</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">
                <div class="news-carousel section">

                    <!--News start-->
                    <div class="col">
                        <div class="news">
                            <div class="image">
                                <a href="news-details.html"><img src="{{asset("website/assets")}}/images/news/news-1.jpg" alt=""></a>
                                <div class="meta-wrap">
                                    <ul class="meta">
                                        <li>By <a href="#">Donald</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                    <ul class="meta back">
                                        <li>By <a href="#">Donald</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="news-details.html">Duplex Villa with Altra Concept</a></h4>
                                <div class="desc">
                                    <p>Khonike - Real Estate Bootstrap 4 Template the best theme for  elit, sed do to eiumod tempor dolor sit amet.</p>
                                </div>
                                <a href="news-details.html" class="readmore">Continure Reading</a>
                            </div>
                        </div>
                    </div>
                    <!--News end-->

                    <!--News start-->
                    <div class="col">
                        <div class="news">
                            <div class="image">
                                <a href="news-details.html"><img src="{{asset("website/assets")}}/images/news/news-2.jpg" alt=""></a>
                                <div class="meta-wrap">
                                    <ul class="meta">
                                        <li>By <a href="#">Donald</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                    <ul class="meta back">
                                        <li>By <a href="#">Donald</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="news-details.html">Joint Mortgage: Pros vs. Cons</a></h4>
                                <div class="desc">
                                    <p>Khonike - Real Estate Bootstrap 4 Template the best theme for  elit, sed do to eiumod tempor dolor sit amet.</p>
                                </div>
                                <a href="news-details.html" class="readmore">Continure Reading</a>
                            </div>
                        </div>
                    </div>
                    <!--News end-->

                    <!--News start-->
                    <div class="col">
                        <div class="news">
                            <div class="image">
                                <a href="news-details.html"><img src="{{asset("website/assets")}}/images/news/news-3.jpg" alt=""></a>
                                <div class="meta-wrap">
                                    <ul class="meta">
                                        <li>By <a href="#">Sean</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                    <ul class="meta back">
                                        <li>By <a href="#">Sean</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="news-details.html">Dealing with Student Loan Debt</a></h4>
                                <div class="desc">
                                    <p>Khonike - Real Estate Bootstrap 4 Template the best theme for  elit, sed do to eiumod tempor dolor sit amet.</p>
                                </div>
                                <a href="news-details.html" class="readmore">Continure Reading</a>
                            </div>
                        </div>
                    </div>
                    <!--News end-->

                    <!--News start-->
                    <div class="col">
                        <div class="news">
                            <div class="image">
                                <a href="news-details.html"><img src="{{asset("website/assets")}}/images/news/news-4.jpg" alt=""></a>
                                <div class="meta-wrap">
                                    <ul class="meta">
                                        <li>By <a href="#">Sean</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                    <ul class="meta back">
                                        <li>By <a href="#">Sean</a></li>
                                        <li>September 30, 2018</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="news-details.html">Bridging the home ownership gap</a></h4>
                                <div class="desc">
                                    <p>Khonike - Real Estate Bootstrap 4 Template the best theme for  elit, sed do to eiumod tempor dolor sit amet.</p>
                                </div>
                                <a href="news-details.html" class="readmore">Continure Reading</a>
                            </div>
                        </div>
                    </div>
                    <!--News end-->

                </div>
            </div>
        </div>
    </div> --}}
    <!--News Section end-->

    <!--Brand section start-->
    {{-- <div class="brand-section section pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Our Partners</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->

            <div class="row">

                <!--Brand Slider start-->
                <div class="brand-carousel section">
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-1.png" alt=""></div>
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-2.png" alt=""></div>
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-3.png" alt=""></div>
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-4.png" alt=""></div>
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-5.png" alt=""></div>
                    <div class="brand col"><img src="{{asset("website/assets")}}/images/brands/brand-6.png" alt=""></div>
                </div>
                <!--Brand Slider end-->

            </div>

        </div>
    </div> --}}
    <!--Brand section end-->
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.country').change(function(){
            var id = $(this).val();
            $.ajax({
            type:'POST',
            url:'{{ route("country_get_cities") }}',
            data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : id,
            },
            success:function(response) {
                console.log(response.data);
                    var data = response.data;

                    $('.city .list .option').each(function() {
                        $(this).remove();
                    });
                    // $('.city').append('<option>{{ __("website.all_cities") }}</option>');
                    $('.city .list').append('<li data-value="{{ __("website.all_cities") }}" class="option selected">{{ __("website.all_cities") }}</li>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.city .list').append('<li data-value="'+val.id+'" class="option selected">'+val.name+'</li>');
                    });
            }
            });
        });

        $('.category').change(function(){
            var id = $(this).val();
            $.ajax({
            type:'POST',
            url:'{{ route("country_get_sub_categories") }}',
            data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : id,
            },
            success:function(response) {
                console.log(response.data);
                    var data = response.data;

                    // $('.sub_category option').each(function() {
                    //     $(this).remove();
                    // });
                    // $('.sub_category').append(' <option value="">{{ __("website.all_sub_categories") }}</option>');
                    // $.each(data, function(key,val) {
                    //     // console.log(val);
                    //     $('.sub_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                    // });

                    $('.sub_category .list .option').each(function() {
                        $(this).remove();
                    });
                    // $('.city').append('<option>{{ __("website.all_cities") }}</option>');
                    $('.sub_category .list').append('<li data-value="{{ __("website.all_sub_categories") }}" class="option selected">{{ __("website.all_sub_categories") }}</li>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.sub_category .list').append('<li data-value="'+val.id+'" class="option selected">'+val.name+'</li>');
                    });
            }
            });
        });
    });

</script>
@endsection

