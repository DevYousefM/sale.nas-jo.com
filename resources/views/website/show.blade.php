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
    <!--Page Banner Section start-->
    <!--  style="background-image: url({{asset("website")}}/assets/images/bg/single-property-bg.jpg)" -->
    <div class="page-banner-section section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">{{ __('website.posts') }}</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{route("website")}}">{{ __('website.home') }}</a></li>
                        <li class="active">{{ $post->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">

                                <div class="head">
                                    <div class="left">
                                        <h1 class="title">{{ $post->title }}</h1>
                                        <span class="location"><img src="{{asset("website")}}/assets/images/icons/marker.png" alt="">{{ $post->country->name .'-'.$post->city->name }}</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            <span class="price">{{ $post->currency.''. $post->price }}</span>
                                            <span class="type">{{ $post->category->name}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="image mb-30">
                                    <img src="{{asset("$post->photo")}}" alt="">
                                </div>

                                <div class="content">

                                    <h3>{{ __('website.description') }}</h3>

                                    {{-- <p>{{ $setting->title .' - '.  $setting->desc }}</p> --}}
                                    <p>{{ $post->title }} - {!! $post->desc !!}</p>

                                    <div class="row mt-30 mb-30">
                                        @if(count($post->features->where('inputType' , 'text')) > 0)
                                            <div class="col-md-5 col-12 mb-xs-30">
                                                <h3>{{ __('website.condition') }}</h3>
                                                <ul class="feature-list">
                                                    @foreach ($post->features->where('inputType' , 'text') as $feature)
                                                        <li>{{ $feature->name .' '.$feature->pivot->value }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if(count($post->features->where('inputType' , 'checkedBox')) > 0)
                                            <div class="col-md-7 col-12">
                                                <h3>{{ __('website.amenities') }}</h3>
                                                <ul class="amenities-list">
                                                    @foreach ($post->features->where('inputType' , 'checkedBox') as $feature)
                                                        @if($feature->pivot->value == 1)
                                                            <li>{{ $feature->name }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row">
                                        {{-- <div class="col-12 mb-30">
                                            <h3>Video</h3>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8CbvItGX7Vk"></iframe>
                                            </div>
                                        </div> --}}
                                        <div class="container">
                                            <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                                                <ol class="carousel-indicators">
                                                <li data-target="#mycarousel" data-slide-to="0"  class="active"></li>
                                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                                <li data-target="#mycarousel" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner">
                                                    @if(count($post->photos) > 0)
                                                        @foreach ($post->photos as $index=>$item)
                                                            @if($index == 0)
                                                                <div class="carousel-item active">
                                                                    <img src="{{ asset("$item->value") }}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
                                                                </div>
                                                            @else
                                                                <div class="carousel-item">
                                                                    <img src="{{ asset("$item->value") }}?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="d-block w-100" alt="...">
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
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Property end-->

                    </div>
                </div>

                <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">

                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">{{ __('website.search') }}</span><span class="shape"></span></h4>


                        <!--Property Search start-->
                        <div class="property-search sidebar-property-search">

                            <form action="{{ route("website.posts.search") }}" method="GET">

                                <div>
                                    <select class="form-control country" name="country_id" >
                                            <option>{{ __('website.all_countries') }}</option>
                                            @if(count($countries) > 0)
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>

                                <div >
                                    <select class="form-control city" name="city_id" >
                                        <option>{{ __('website.all_cities') }}</option>
                                    </select>
                                </div>


                                <div>
                                    <select class="form-control category "  name="category_id" >
                                        <option>{{ __('website.all_categories') }}</option>
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div>
                                    <select class="form-control sub_category"  name="sub_category_id">
                                        <option>{{  __('website.all_sub_categories') }}</option>

                                    </select>
                                </div>

                                <div>
                                    <div id="search-price-range"></div>
                                </div>

                                <div>
                                    <button type="submit">{{ __('website.search') }}</button>
                                </div>

                            </form>

                        </div>
                        <!--Property Search end-->

                    </div>
                    <!--Sidebar end-->

                    <!--Sidebar start-->
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">{{ __('admin.feature_post') }}</span><span class="shape"></span></h4>

                        <!--Sidebar Property start-->
                        <div class="sidebar-property-list">

                            @if(count($postFeatures) > 0)
                                @foreach ($postFeatures as $post)
                                    <div class="sidebar-property">
                                        <div class="image">
                                            <span class="type">{{ $post->category->name }}</span>
                                            <a href="{{ route("website.post.show",$post->id) }}"><img src="{{asset("$post->photo")}}" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="{{ route("website.post.show",$post->id) }}">{{ $post->title }}</a></h5>
                                            <span class="location"><img src="{{asset("website")}}/assets/images/icons/marker.png" alt="">{{ $post->country->name .' '.$post->city->name }}</span>
                                            <span class="price">{{ $post->currency .' '.$post->price }} </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                        <!--Sidebar Property end-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--New property section end-->
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

                    $('.city option').each(function() {
                        $(this).remove();
                    });
                    $('.city').append('<option>{{ __("website.all_cities") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.city').append('<option value="'+val.id+'">'+val.name+'</option>');
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

                    $('.sub_category option').each(function() {
                        $(this).remove();
                    });
                    $('.sub_category').append(' <option value="">{{ __("website.all_sub_categories") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.sub_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                    });
            }
            });
        });
    });

</script>
@endsection

