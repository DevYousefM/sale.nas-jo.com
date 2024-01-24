@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    <a href="{{ route('feature.index') }}"> {{ __('admin.features') }} </a> /
                </span>
                {{ __('admin.add') }}
            </h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header"> {{ __('admin.add_new_feature') }}</h5>
                            <div class="card-body">
                                @include('admin.includes._errors')
                                <form id="formValidationExamples" class="row g-3" action="{{ route('feature.store') }}"
                                    method="POST">
                                    @csrf
                                    <div class="row" style="margin-top: 20px;">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name"
                                            style="text-align: center;">{{ __('admin.inputType') }}</label>
                                        <div class="col-sm-10 col-8">
                                            <select class="form-select" name="inputType" id="exampleFormControlSelect2"
                                                aria-label="Multiple select example">
                                                <option value="">{{ __('admin.select') }}</option>
                                                <option value="checkedBox">{{ __('admin.checkedBox') }}</option>
                                                <option value="text">{{ __('admin.text') }}</option>
                                                <option value="menu">{{ __('admin.menu') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @foreach (config('translatable.locales') as $lang)
                                        <div class="col-md-6">
                                            <label class="form-label"
                                                for="formValidationName">{{ __('admin.name_' . $lang) }}</label>
                                            <input type="text" id="formValidationName" name="name:{{ $lang }}"
                                                class="form-control" name="formValidationName" />
                                        </div>
                                    @endforeach

                                    <div class="menu-fields-container"></div>

                                    <div class="col-12">
                                        <button type="submit" name="submitButton"
                                            class="btn btn-primary">{{ __('admin.add') }}</button>
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

    <script>
        // Add event listener to the select element
        document.getElementById('exampleFormControlSelect2').addEventListener('change', function() {
            // Get the selected option value
            var selectedOption = this.value;

            // Get the container for menu fields
            var menuFieldsContainer = document.querySelector('.menu-fields-container');

            // Remove existing menu fields
            while (menuFieldsContainer.firstChild) {
                menuFieldsContainer.removeChild(menuFieldsContainer.firstChild);
            }

            // Add menu fields if the selected option is "menu"
            if (selectedOption === 'menu') {
                var numberOfFields = 1; // Set the desired number of fields
                for (var i = 1; i <= numberOfFields; i++) {
                    var feature = `
                        <div class="col-md-6 menu-fields">
                            <label class="form-label" for="multicol-price">Value ${i}</label>
                            <div class="input-group">
                                <input type="text" name="values[]" class="form-control" />
                                <button class="btn btn-outline-secondary menu-btn" type="button" id="button-addon2">+</button>
                            </div>
                        </div>
                    `;
                    menuFieldsContainer.innerHTML += feature;
                }
            }
        });
    </script>
@endsection
