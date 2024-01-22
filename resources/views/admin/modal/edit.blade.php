@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('modals.index') }}">
                            {{ __('admin.modals') }} </a> </span> / {{ $modal->brand }} / {{ __('admin.edit') }}
            </h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                            <div class="card-body">
                                @include('admin.includes._errors')
                                <form id="formValidationExamples" class="row g-3"
                                    action="{{ route('modals.update', $modal->id) }}" method="POST">
                                    @csrf
                                    @method('put')

                                    @foreach (config('translatable.locales') as $lang)
                                        <div class="mb-3 row">
                                            <label for="html5-text-input"
                                                class="col-md-2 col-form-label">{{ __('admin.brand_' . $lang) }}</label>
                                            <div class="col-md-10 col-lg-7">
                                                <input name="id:{{ $lang }}" hidden
                                                    value="{{ $modal->translate($lang)->id }}" />
                                                <input class="form-control" type="text" name="brand:{{ $lang }}"
                                                    value="{{ $modal->translate($lang)->brand }}" id="html5-text-input" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="html5-text-input"
                                                class="col-md-2 col-form-label">{{ __('admin.modal_' . $lang) }}</label>
                                            <div class="col-md-10 col-lg-7">
                                                <input name="id:{{ $lang }}" hidden
                                                    value="{{ $modal->translate($lang)->id }}" />
                                                <input class="form-control" type="text" name="modal:{{ $lang }}"
                                                    value="{{ $modal->translate($lang)->modal }}" id="html5-text-input" />
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
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
