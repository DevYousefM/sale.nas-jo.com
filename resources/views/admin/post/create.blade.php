@extends('layouts.admin')

@section('styles')
@endsection

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">
                    <a href="{{ route('post.index') }}">{{ __('admin.posts') }} </a> /
                </span> {{ __('admin.add') }}
            </h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.add_new_post') }}</h5>
                        @include('admin.includes._errors')

                        <form class="card-body" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <!-- ... (existing code) -->

                                <!-- Additional HTML structure for menu items -->
                                <div class="col-md-6 mt-3">
                                    <label class="form-label" for="multicol-price">{{ __('admin.menu_items') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="menu_items[]" class="form-control" />
                                        <button type="button" class="btn btn-outline-secondary add-menu-item">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Dynamic menu items field (initially hidden) -->
                            <div class="row g-3 menu-items" style="display: none;">
                                <div class="col-md-6 mt-3">
                                    <div class="input-group">
                                        <input type="text" name="menu_items[]" class="form-control" />
                                        <button type="button" class="btn btn-outline-secondary remove-menu-item">-</button>
                                    </div>
                                </div>
                            </div>

                            <!-- ... (existing code) -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

@section('scripts')
    <script>
        // ... (existing code)

        $('.sub_category').change(function () {
            // ... (existing code)

            if (val.inputType == 'menu') {
                $('.menu-items').css("display", "block");
            } else {
                $('.menu-items').css("display", "none");
            }
        });

        // Add functionality to dynamically add menu items
        $('.add-menu-item').click(function () {
            var menuItemField = `
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <input type="text" name="menu_items[]" class="form-control" />
                        <button type="button" class="btn btn-outline-secondary remove-menu-item">-</button>
                    </div>
                </div>
            `;
            $('.menu-items').append(menuItemField);
        });

        // Add functionality to dynamically remove menu items
        $('.menu-items').on('click', '.remove-menu-item', function () {
            $(this).closest('.col-md-6').remove();
        });
    </script>
@endsection
