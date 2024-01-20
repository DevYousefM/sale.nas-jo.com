@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.appsetting') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('post_app_setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                    <label class="form-label" for="formValidationName">{{ __('admin.active_subscribe') }}</label>
                                        <label class="switch">
                                          <input type="checkbox" name="status" class="switch-input is-valid status"  @if(isset($appsetting)) @if(@$appsetting->status == 1)checked @else value="0" @endif @endif />
                                          <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                          </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.message_ar') }}</label>
                                        <input type="text" id="formValidationName" value="{{@$appsetting->message_ar}}" name="message_ar" class="form-control"  name="formValidationName" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="formValidationName">{{ __('admin.message_en') }}</label>
                                        <input type="text" id="formValidationName" value="{{@$appsetting->message_en}}" name="message_en" class="form-control"  name="formValidationName" />
                                    </div>
                                </div>

                                <div class="mb-3 row" style="margin-top: 15px;">
                                    <label for="html5-tel-input" class="col-md-2 col-form-label">{{ __('admin.posts_nearest_distance') }}</label>
                                    <div class="col-md-4">
                                        <div class="input-group">

                                            <input
                                              type="number"
                                              step="0.01"
                                              class="form-control"
                                              value="{{ @$appsetting->nearest_distance }}"
                                              name="nearest_distance"
                                            />
                                            <span class="input-group-text">Km</span>
                                          </div>
                                    </div>
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
