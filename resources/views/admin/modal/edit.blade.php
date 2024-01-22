@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('category.index') }}"> {{ __('admin.subcategories') }} </a>  </span> / {{ $subcategory->name }} / {{ __('admin.edit') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                        <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                        <div class="card-body">
                            @include('admin.includes._errors')
                            <form id="formValidationExamples" class="row g-3" action="{{ route('sub-category.update',$subcategory->id) }}" method="POST">
                                @csrf
                                @method('put')

                                @foreach (config('translatable.locales') as $lang)

                                <div class="mb-3 row">
                                    <label for="html5-text-input" class="col-md-2 col-form-label">{{ __('admin.name_'.$lang) }}</label>
                                    <div class="col-md-10 col-lg-7">
                                        <input name="id:{{ $lang }}" hidden value="{{$subcategory->translate($lang)->id}}" />
                                      <input class="form-control" type="text" name="name:{{ $lang }}" value="{{ $subcategory->translate($lang)->name }}" id="html5-text-input" />
                                    </div>
                                </div>
                            @endforeach

                            <div class="row" style="margin-top: 20px;">
                                <label class="col-sm-2 col-form-label" for="basic-default-name" style="    text-align: center;">{{ __('admin.categories') }}</label>
                                <div class="col-sm-10 col-lg-7">
                                    <select id="multicol-category" multiple class="select2 form-select col-6" name="categories[]" data-allow-clear="true">
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if(in_array($category->id,$categories_ids)) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                </div>
                            </div>

                             
                                <div class="row" style="margin-top: 20px;">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name" style="    text-align: center;">{{ __('admin.features') }}</label>
                                    <div class="col-sm-10 col-lg-7">
                                        <select multiple class="form-select" name="features[]" id="exampleFormControlSelect2" aria-label="Multiple select example">
                                            @if(count($features) > 0)
                                                @foreach ($features as $feature)
                                                    <option value="{{ $feature->id }}" @if(in_array($feature->id, $features_ids)) selected @endif>{{ $feature->name }}</option>
                                                @endforeach
                                            @endif
                                          </select>
                                    </div>
                                </div>
                              

                                <div class="col-12">
                                    <button type="submit"  class="btn btn-primary">{{ __('admin.update') }}</button>
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
