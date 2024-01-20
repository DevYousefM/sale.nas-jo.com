@extends('layouts.admin')

@section('styles')

@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->


        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('get_website_setting') }}"> {{ __('admin.generalSetting') }} </a></h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.details') }}</h5>
                        @include('admin.includes._errors')


                        <form class="card-body" action="{{ route('post_website_setting') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-title">{{ __('admin.logo') }}</label>
                                    <input type="file" name="logo" id="multicol-title" class="form-control"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-main_photo">{{ __('admin.icon') }}</label>
                                    <input type="file" name="icon" id="multicol-title" class="form-control"  />
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <img  @if(!is_null($setting)) src="{{ asset("$setting->logo") }}" @endif style="width: 250px;" >
                                </div>
                                <div class="col-md-6">
                                    <img @if(!is_null($setting)) src="{{ asset("$setting->icon") }}" @endif style="width: 250px;" >
                                </div>
                            </div>


                            <div class="row g-3">
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="col-6">
                                        <label class="form-label" for="collapsible-desc">{{ __('admin.title_'.$lang) }}</label>
                                        <input type="text" name="title:{{ $lang }}" @if(!is_null($setting)) value="{{ $setting->translate($lang)->title }}" @endif id="multicol-title" class="form-control"  />
                                    </div>
                                @endforeach
                            </div>

                            <div class="row g-3">
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="col-6">
                                        <label class="form-label" for="collapsible-desc">{{ __('admin.desc_'.$lang) }}</label>
                                        <input type="text" name="desc:{{ $lang }}" @if(!is_null($setting))  value="{{ $setting->translate($lang)->desc }}" @endif id="multicol-title" class="form-control"  />
                                    </div>
                                @endforeach
                            </div>

                            <div class="row g-3">
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="col-6">
                                        <label class="form-label" for="collapsible-desc">{{ __('admin.location_'.$lang) }}</label>
                                        <input type="text" name="location:{{ $lang }}" @if(!is_null($setting))  value="{{ $setting->translate($lang)->location }}" @endif id="multicol-title" class="form-control"  />
                                    </div>
                                @endforeach
                            </div>

                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.email') }}</label>
                                    <input type="text" name="email" id="multicol-title" @if(!is_null($setting)) value="{{ $setting->email }}" @endif class="form-control"  />
                                </div>

                                <div class="col-6">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.mobile') }}</label>
                                    <input type="text" name="mobile" id="multicol-title" @if(!is_null($setting)) value="{{ $setting->mobile }}" @endif class="form-control"  />
                                </div>
                            </div>


                            @if (Auth::guard('admin')->user()->hasPermission('PrivacyPolicy-update'))
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('admin.update') }}</button>
                                </div>
                            @endif
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@endsection
