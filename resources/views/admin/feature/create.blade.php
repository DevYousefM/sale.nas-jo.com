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
        var numberOfField = 1;
        document.getElementById('exampleFormControlSelect2').addEventListener('change', function() {
            var selectedOption = this.value;

            var menuFieldsContainer = document.querySelector('.menu-fields-container');

            while (menuFieldsContainer.firstChild) {
                menuFieldsContainer.removeChild(menuFieldsContainer.firstChild);
            }

            if (selectedOption === 'menu') {
                var feature = `
                        <div class="col-md-6 menu-fields">
                            <label class="form-label" for="multicol-price">Value ${numberOfField}</label>
                            <div class="input-group">
                                <input type="text" name="values[]" class="form-control" />
                                <button class="btn btn-outline-secondary" id="add_value_field" type="button" id="button-addon2">+</button>
                            </div>
                        </div>
                    `;
                menuFieldsContainer.innerHTML += feature;
            }
        });
        document.addEventListener('click', function(event) {
            var addValueField = document.getElementById('add_value_field');

            if (event.target && event.target.id === 'add_value_field') {
                numberOfField++;

                var inputElement =
                    `<label class="form-label" for="multicol-price">Value ${numberOfField}</label>
            <div class="input-group">
                <input type="text" name="values[]" class="form-control" />
            </div>`;

                addValueField.closest('.menu-fields').innerHTML += inputElement;
            }
        });
    </script>
@endsection
