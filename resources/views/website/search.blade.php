@extends('layouts.website')

@section('content')
        <!--Page Banner Section start-->
        <div class="page-banner-section section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="page-banner-title">{{ __('website.posts') }}</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="{{ route("website") }}">{{ __('website.home') }}</a></li>
                            <li class="active">{{ __('website.search') }}</li>
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

                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    <div class="property-item list col-md-6 col-12 mb-40">
                                        <div class="property-inner">
                                            <div class="image">
                                                <a href="{{ route("website.post.show",$post->id) }}"><img src="{{asset("$post->photo")}}" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <div class="left">
                                                    <h3 class="title"><a href="{{ route("website.post.show",$post->id) }}">{{ $post->title }}</a></h3>
                                                    <span class="location"><img src="{{asset("website")}}/assets/images/icons/marker.png" alt="">{{ $post->country->name .'-'.$post->city->name }}</span>
                                                </div>
                                                <div class="right">
                                                    <div class="type-wrap">
                                                        <span class="price">{{ $post->currency.' '.$post->price }}</span>
                                                        <span class="type">{{ $post->category->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="desc">
                                                    <p>{{ $post->title .' - '. $post->desc}} </p>
                                                </div>
                                                <a href="{{ route("website.post.show",$post->id) }}" class="read-more">{{ __('website.view_post') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif



                        </div>

                        <div class="row mt-20">
                            <div class="col">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 order-2 order-lg-1 pr-30 pr-sm-15 pr-xs-15">

                        <!--Sidebar start-->
                        <div class="sidebar">
                            <h4 class="sidebar-title"><span class="text">Search Property</span><span class="shape"></span></h4>


                            <!--Property Search start-->
                                <div class="property-search sidebar-property-search">

                                    <form action="{{ route("website.posts.search") }}" method="GET">

                                        <div>
                                            <select class="form-control country" name="country_id" >
                                                    <option>{{ __('website.all_countries') }}</option>
                                                    @if(count($countries) > 0)
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}" @if(isset($data['country_id'])) @if($country->id == $data['country_id']) selected @endif @endif>{{ $country->name }}</option>
                                                        @endforeach
                                                    @endif
                                            </select>
                                        </div>

                                        <div >
                                            <select class="form-control city" name="city_id" >
                                                <option>{{ __('website.all_cities') }}</option>
                                                @if(count($cities) > 0)
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" @if(isset($data['city_id'])) @if($city->id == $data['city_id']) selected @endif @endif>{{ $city->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>


                                        <div>
                                            <select class="form-control category "  name="category_id" >
                                                <option>{{ __('website.all_categories') }}</option>
                                                @if(count($categories) > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"  @if(isset($data['category_id'])) @if($category->id == $data['category_id']) selected @endif @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div>
                                            <select class="form-control sub_category"  name="sub_category_id">
                                                <option>{{  __('website.all_sub_categories') }}</option>
                                                @if(count($subcategories) > 0)
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}" @if(isset($data['sub_category_id'])) @if($subcategory->id == $data['sub_category_id']) selected @endif @endif>{{ $subcategory->name }}</option>
                                                    @endforeach
                                                @endif
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

