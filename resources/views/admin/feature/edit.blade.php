@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('feature.index') }}"> {{ __('admin.features') }} </a>  </span> / {{ $feature->name }} / {{ __('admin.edit') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('feature.update',$feature->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row" style="margin-top: 20px;">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name" style="    text-align: center;">{{ __('admin.inputType') }}</label>
                                    <div class="col-sm-10 col-8">
                                        <select  class="form-select" name="inputType" id="exampleFormControlSelect2" aria-label="Multiple select example">
                                            <option value="">{{ __('admin.select') }}</option>
                                            <option value="checkedBox" @if($feature->inputType == 'checkedBox') selected @endif>{{ __('admin.checkedBox') }}</option>
                                            <option value="text" @if($feature->inputType == 'text') selected @endif>{{ __('admin.text') }}</option>
                                        </select>
                                    </div>
                                </div>
                                @foreach (config('translatable.locales') as $lang)
                                <input type="text" hidden  name="id:{{$lang}}" value="{{$feature->translate($lang)->id}}" class="form-control"  >

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.name_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="name:{{ $lang }}" value="{{ $feature->translate($lang)->name }}" class="form-control"  name="formValidationName" />
                                    </div>
                                @endforeach

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
