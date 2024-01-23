@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    <a href="{{ route('modals.index') }}"> {{ __('admin.Modals') }} </a> /
                </span>
                {{ __('admin.add') }}
            </h4>
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
                                            <label for="brand_{{ $lang }}" class="col-md-2 col-form-label">{{ __('admin.brand_'.$lang) }}</label>
                                            <div class="col-md-10 col-lg-7">
                                                <input class="form-control" type="text" name="brand:{{ $lang }}" id="brand_{{ $lang }}" />
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="mb-3 row" id="modalFieldsContainer">
                                        <label class="col-md-2 col-form-label">{{ __('admin.modal') }}</label>
                                        <div class="col-md-10 col-lg-7">
                                            <div class="modal-field">
                                                <input class="form-control" type="text" name="modals[]" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary" id="addModalField">{{ __('admin.add_modal_field') }}</button>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">{{ __('admin.add') }}</button>
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
        document.addEventListener('DOMContentLoaded', function () {
            var modalCounter = 1;

            document.getElementById('addModalField').addEventListener('click', function () {
                modalCounter++;

                var modalField = document.createElement('div');
                modalField.className = 'mb-3 row';
                modalField.innerHTML = `
                    <label class="col-md-2 col-form-label">{{ __('admin.modal') }} ${modalCounter}</label>
                    <div class="col-md-10 col-lg-7">
                        <div class="modal-field">
                            <input class="form-control" type="text" name="modals[]" />
                        </div>
                    </div>
                `;

                document.getElementById('modalFieldsContainer').appendChild(modalField);
            });
        });
    </script>
@endsection
