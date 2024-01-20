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
                    <h1 class="page-banner-title">{{ __("website.$pageTitle") }}</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="{{route("website")}}">{{ __('website.home') }}</a></li>
                        <li class="active">

                            {{ __("website.$pageTitle") }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <div class="contact-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">

            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>{{ __("website.$pageTitle") }}</h1>
                    </div>
                    <div class="contact-form-wrap col-12">
                        <div class="contact-form">
                            {!! $policyTerm->value !!}
                        </div>
                    </div>
                </div>
            </div>
            <!--Section Title end-->


        </div>
    </div>
@endsection
