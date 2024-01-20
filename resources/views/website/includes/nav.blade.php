<div id="main-wrapper">

    <!--Header section start-->
    <header class="header header-sticky">
        <div class="header-bottom menu-center">
            <div class="container">
                <div class="row justify-content-between">

                    <!--Logo start-->
                    <div class="col mt-10 mb-10">
                        <div class="logo">
                            <a href="{{ route('website') }}">
                                @php
                                    $logo = @App\Models\General::first()->logo;
                                @endphp
                                <img src="{{asset("$logo")}}" style="    width: 100px;">
                                {{-- <img src="{{asset("website/assets")}}/images/logo.svg" style="    width:70px;" alt=""> --}}
                            </a>
                        </div>
                    </div>
                    <!--Logo end-->

                     <!--Menu start-->
                     <div class="col d-none d-lg-flex">
                        <nav class="main-menu">
                            <ul>
                                <li ><a href="{{ route('website') }}">{{ __('website.home') }}</a></li>
                                <li ><a href="{{ route('website') }}#posts">{{ __('website.posts') }}</a></li>
                                <li ><a href="{{ route('website') }}#feature">{{ __('website.feature') }}</a></li>
                                <li ><a href="{{ route('website') }}#app">{{ __('website.app') }}</a></li>
                                <li ><a href="{{ route('website') }}#our_service">{{ __('website.our_service') }}</a></li>
                                <li ><a href="{{ route('website') }}#feature_post">{{ __('website.feature_post') }}</a></li>
                                <li ><a href="{{ route('website') }}#contact_us">{{ __('website.contact_us') }}</a></li>

                                <li class="has-dropdown" @if(Config::get('app.locale') == "ar") style="margin-right: 20px;" @endif>
                                    <a href="#">{{ __('website.'.LaravelLocalization::getCurrentLocaleName()) }}</a>
                                    <ul class="sub-menu">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    @if($localeCode == 'en')
                                                        <i class="fi fi-us fis rounded-circle fs-4 me-1"></i>
                                                        <span class="align-middle">{{ __('admin.english') }}</span>
                                                    @else
                                                        <i class="fi fi-sa fis rounded-circle fs-4 me-1"></i>
                                                        <span class="align-middle">{{ __('admin.arabic') }}</span>
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->

                    <!--User start-->
                    <div class="col mr-sm-50 mr-xs-50">
                        {{-- <div class="header-user">
                            <a href="login-register.html" class="user-toggle"><i class="pe-7s-user"></i><span>Login or Register</span></a>
                        </div> --}}
                    </div>
                    <!--User end-->
                </div>

                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->

            </div>
        </div>
    </header>
    <!--Header section end-->
