@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('feature.index') }}">
                            {{ __('admin.features') }} </a> </span> / {{ $feature->name }} / {{ __('admin.edit') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <!-- FormValidation -->
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header"> {{ __('admin.edit') }}</h5>
                            <div class="card-body">
                                @include('admin.includes._errors')
                                <form id="formValidationExamples" class="row g-3"
                                    action="{{ route('feature.update', $feature->id) }}" method="POST">
                                    @csrf
                                    @method('put')

                                    @foreach (config('translatable.locales') as $lang)
                                        <input type="text" hidden name="id:{{ $lang }}"
                                            value="{{ $feature->translate($lang)->id }}" class="form-control">
                                        <div class="col-md-6">
                                            <label class="form-label"
                                                for="formValidationName">{{ __('admin.name_' . $lang) }}</label>
                                            <input type="text" id="formValidationName" name="name:{{ $lang }}"
                                                value="{{ $feature->translate($lang)->name }}" class="form-control"
                                                name="formValidationName" />
                                        </div>
                                    @endforeach
                                    @php
                                        $count = 1;
                                    @endphp
                                    @isset($menu)
                                        <div class="menu-fields col-md-6">
                                            <button class="btn btn-outline-secondary" data-count="{{ $count }}"
                                                id="add_value_field" type="button" id="button-addon2">{{ __('admin.add_new_value') }}</button>
                                            @foreach ($menu->menu as $i)
                                                <div class="col-md-6">
                                                    <label class="form-label" for="multicol-price">Value
                                                        {{ $count }}</label>
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $i }}" name="values[]"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                                @php
                                                    $count++;
                                                @endphp
                                            @endforeach
                                        </div>
                                    @endisset
                                    <div class="col-12">
                                        <button type="submit" name="submitButton"
                                            class="btn btn-primary">{{ __('admin.update') }}</button>
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
        document.addEventListener('click', function(event) {
            var addValueField = document.getElementById('add_value_field');

            if (event.target && event.target.id === 'add_value_field') {

                var inputElement =
                    `<label class="form-label" for="multicol-price">New Value</label>
                    <div class="input-group">
                        <input type="text" name="values[]" class="form-control" />
                    </div>`;
                addValueField.closest('.menu-fields').innerHTML += inputElement;
            }
        });
    </script>
@endsection
