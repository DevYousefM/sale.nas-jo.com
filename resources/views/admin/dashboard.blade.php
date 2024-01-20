@extends('layouts.admin')
@section('content')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-12 col-md-8 col-lg-12 order-3 order-md-2">
                  <div class="row">
                    <div class="col-3 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-user rounded" style="    color: red;"></i>
                              {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                            </div>
                          </div>
                          <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.subadmins') }}</span>
                          <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold"  style="    text-align: center;">{{ App\Models\Admin::whereRoleIs('admin')->count() }}</h3>
                          <small class="text-danger fw-semibold"  style="    text-align: center;"><a  href="{{ route('sub-admin.index') }}">{{ __('admin.view') }}</a></small>
                        </div>
                      </div>
                    </div>

                    <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="fa-solid fa-globe menu-icon tf-icons rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.countries') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\Country::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('country.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="fa-solid fa-city menu-icon tf-icons rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.cities') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\City::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('city.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-copy rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.categories') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\Category::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('category.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-copy rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.subcategories') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\SubCategory::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('sub-category.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-copy rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.features') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\Feature::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('feature.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-user rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.clients') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\Client::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('client.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

                      <div class="col-3 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <i class="menu-icon tf-icons bx bx-food-menu rounded" style="    color: red;"></i>
                                {{-- <img src="{{asset('assets')}}/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" /> --}}
                              </div>
                            </div>
                            <span class="d-block mb-1" style="    text-align: center;">{{ __('admin.posts') }}</span>
                            <h3 class="card-title text-nowrap mb-2 text-danger fw-semibold" style="    text-align: center;">{{ App\Models\Post::count() }}</h3>
                            <small class="text-danger fw-semibold"><a  href="{{ route('post.index') }}">{{ __('admin.view') }}</a></small>
                          </div>
                        </div>
                      </div>

              
                 
                  </div>
                </div>
              </div>
       
            </div>
            <!-- / Content -->

@endsection
