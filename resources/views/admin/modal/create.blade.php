@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('category.index') }}"> {{ __('admin.subcategories') }} </a> / </span> {{ __('admin.add') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.add_new_modal') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('modals.store') }}" method="POST">
                                @csrf

                               
                                @foreach (config('translatable.locales') as $lang)

                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('admin.name_'.$lang) }}</label>
                                        <div class="col-md-10 col-lg-7">
                                          <input class="form-control" type="text" name="brand:{{ $lang }}" id="html5-text-input" />
                                        </div>
                                    </div>
                                @endforeach
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('admin.name_'.$lang) }}</label>
                                        <div class="col-md-10 col-lg-7">
                                          <input class="form-control" type="text" name="modal:{{ $lang }}" id="html5-text-input" />
                                        </div>
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
