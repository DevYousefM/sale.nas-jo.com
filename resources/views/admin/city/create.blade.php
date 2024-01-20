@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('city.index') }}"> {{ __('admin.cities') }} </a> / </span> {{ __('admin.add') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.add_new_city') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('city.store') }}" method="POST">
                                @csrf
                                <div class="row" style="margin-top: 20px;">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name" style="    text-align: center;">{{ __('admin.countries') }}</label>
                                    <div class="col-sm-10 col-8">
                                        <select id="multicol-country" class="select2 form-select col-6" name="country_id" data-allow-clear="true">
                                            <option value="">{{ __('admin.select') }}</option>
                                            @if(count($countries) > 0)
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                          </select>
                                    </div>
                                </div>
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.name_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="name:{{ $lang }}" class="form-control"  name="formValidationName" />
                                    </div>
                                @endforeach

                                <div class="col-12">
                                    <button type="submit"  class="btn btn-primary">{{ __('admin.add') }}</button>
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
