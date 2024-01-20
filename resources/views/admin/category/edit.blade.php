@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('category.index') }}"> {{ __('admin.categories') }} </a>  </span> / {{ $category->name }} / {{ __('admin.edit') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                @foreach (config('translatable.locales') as $lang)
                                <input type="text" hidden  name="id:{{$lang}}" value="{{$category->translate($lang)->id}}" class="form-control"  >

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.name_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="name:{{ $lang }}" value="{{ $category->translate($lang)->name }}" class="form-control"  name="formValidationName" />
                                    </div>
                                @endforeach

                                @foreach (config('translatable.locales') as $lang)
                                <input type="text" hidden  name="id:{{$lang}}" value="{{$category->translate($lang)->id}}" class="form-control"  >

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.desc_'.$lang) }}</label>
                                        <input type="text" id="formValidationName" name="desc:{{ $lang }}" value="{{ $category->translate($lang)->desc }}" class="form-control"  name="formValidationName" />
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <label class="form-label" for="formValidationName">{{ __('admin.icon') }}</label>
                                    <input type="file" id="formValidationName" name="icon"  class="form-control"  name="formValidationName" />
                                </div>

                                <div class="col-md-6">
                                   <img src="{{ asset("$category->icon") }}" >
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
