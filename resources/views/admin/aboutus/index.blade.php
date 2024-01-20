@extends('layouts.admin')

@section('styles')

@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('get_about_us') }}"> {{ __('admin.about_us') }} </a></h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.details') }}</h5>
                        @include('admin.includes._errors')


                        <form class="card-body" action="{{ route('post_about_us') }}" method="post" >
                            @csrf

                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.about_app_'.$lang) }}</label>
                                    <textarea  class="form-control"  name="about_app:{{ $lang }}"  id="collapsible-desc"  rows="4"    >
                                        @if(isset($aboutus->about_app))
                                            {!! @$aboutus->translate($lang)->about_app !!}
                                        @endif
                                    </textarea>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.our_vision_'.$lang) }}</label>
                                    <textarea  class="form-control"  name="our_vision:{{ $lang }}"  id="collapsible-desc"  rows="4"    >
                                        @if(isset($aboutus->our_vision))
                                            {!! @$aboutus->translate($lang)->our_vision !!}
                                        @endif
                                    </textarea>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.our_mission_'.$lang) }}</label>
                                    <textarea  class="form-control"  name="our_mission:{{ $lang }}"  id="collapsible-desc"  rows="4"    >
                                        @if(isset($aboutus->our_mission))
                                            {!! @$aboutus->translate($lang)->our_mission !!}
                                        @endif
                                    </textarea>
                                </div>
                            @endforeach

                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.our_services_'.$lang) }}</label>
                                    <textarea  class="form-control"  name="our_services:{{ $lang }}"  id="collapsible-desc"  rows="4"    >
                                        @if(isset($aboutus->our_services))
                                            {!! @$aboutus->translate($lang)->our_services !!}
                                        @endif
                                    </textarea>
                                </div>
                            @endforeach

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
