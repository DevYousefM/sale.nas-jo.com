@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    <a href="{{ route('category.index') }}"> {{ __('admin.subcategories') }} </a> /
                </span>
                {{ __('admin.edit') }}
            </h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header"> {{ __('admin.edit_modal') }}</h5>
                            <div class="card-body">
                                @include('admin.includes._errors')
                                <form id="formValidationExamples" class="row g-3"
                                    action="{{ route('modals.update', $modal->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @foreach (config('translatable.locales') as $lang)
                                        <div class="mb-3 row">
                                            <label for="brand_{{ $lang }}"
                                                class="col-md-2 col-form-label">{{ __('admin.brand_' . $lang) }}</label>
                                            <div class="col-md-10 col-lg-7">
                                                <input class="form-control" type="text" name="brand:{{ $lang }}"
                                                    id="brand_{{ $lang }}"
                                                    value="{{ json_decode($modal->getTranslation('brand', $lang))->brand ?? '' }}" />
                                            </div>
                                        </div>
                                    @endforeach

                                    <div id="modalFieldsContainer">
                                        @foreach (json_decode($modal->modals, true) as $modalField)
                                            <div class="mb-3 row">
                                                <label class="col-md-2 col-form-label">{{ __('admin.modal') }}</label>
                                                <div class="col-md-10 col-lg-7">
                                                    <div class="modal-field">
                                                        <input class="form-control" type="text" name="modals[]"
                                                            value="{{ $modalField }}" />
                                                        <button type="button"
                                                            class="btn btn-danger delete-modal-field">{{ __('admin.delete_modal_field') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary"
                                            id="addModalField">{{ __('admin.add_modal_field') }}</button>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalCounter = {{ count(json_decode($modal->modals, true)) }};

            document.getElementById('addModalField').addEventListener('click', function() {
                modalCounter++;

                var modalField = document.createElement('div');
                modalField.className = 'mb-3 row';
                modalField.innerHTML = `
                    <label class="col-md-2 col-form-label">{{ __('admin.modal') }} ${modalCounter}</label>
                    <div class="col-md-10 col-lg-7">
                        <div class="modal-field">
                            <input class="form-control" type="text" name="modals[]" />
                            <button type="button" class="btn btn-danger delete-modal-field">{{ __('admin.delete_modal_field') }}</button>
                        </div>
                    </div>
                `;

                document.getElementById('modalFieldsContainer').appendChild(modalField);
            });

            // Event delegation for dynamically created delete buttons
            document.getElementById('modalFieldsContainer').addEventListener('click', function(event) {
                if (event.target && event.target.className == 'btn btn-danger delete-modal-field') {
                    var modalFieldContainer = event.target.parentNode;
                    modalFieldContainer.parentNode
                        .remove(); // Remove the entire container (label + input + delete button)
                    modalCounter--;
                }
            });
        });
    </script>
@endsection
