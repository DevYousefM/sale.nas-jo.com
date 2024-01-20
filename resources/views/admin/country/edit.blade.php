@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('country.index') }}"> {{ __('admin.countries') }} </a>  </span> / {{ $country->name }} / {{ __('admin.edit') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('country.update',$country->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                @foreach (config('translatable.locales') as $lang)
                                <input type="text" hidden  name="id:{{$lang}}" value="{{$country->translate($lang)->id}}" class="form-control"  >

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.name_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="name:{{ $lang }}" value="{{ $country->translate($lang)->name }}" class="form-control"  name="formValidationName" />
                                    </div>
                                @endforeach
                                @foreach (config('translatable.locales') as $lang)
                                    <input type="text" hidden  name="currencyId:{{$lang}}" value="{{$country->translate($lang)->id}}" class="form-control"  >

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.currency_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="currency:{{ $lang }}" class="form-control"  value="{{ $country->translate($lang)->currency }}" name="formValidationName" />
                                    </div>
                                @endforeach
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-photo">{{ __('admin.photo') }}</label>
                                    <input type="file" name="photo"  id="multicol-photo" class="form-control"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-code">{{ __('admin.code') }}</label>
                                    <input type="text" name="code" value="{{ $country->code }}" id="multicol-code" class="form-control"  />
                                </div>

                                <div class="col-md-6">
                                    <img src="{{ asset("$country->photo") }}"  style="    width: 200px;">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submitButton" class="btn btn-primary">{{ __('admin.update') }}</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- /FormValidation -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
