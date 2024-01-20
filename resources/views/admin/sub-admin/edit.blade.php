@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('sub-admin.index') }}"> {{ __('admin.subadmins') }} </a> / </span> {{ __('admin.update') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.edit') }}</h5>
                        @include('admin.includes._errors')
                        <form class="card-body" action="{{ route('sub-admin.update',$admin->id) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="text" hidden  name="id" value="{{$admin->id}}" class="form-control"  >

                          <div class="row g-3">
                            <div class="col-md-6">
                              <label class="form-label" for="multicol-username">{{ __('admin.username') }}</label>
                              <input type="text" name="username" id="multicol-username" value="{{$admin->username}}" class="form-control" placeholder="{{ __('admin.enterUsername') }}" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="multicol-mobile">{{ __('admin.mobile') }}</label>
                                <input type="text" name="mobile" id="multicol-mobile" value="{{$admin->mobile }}" class="form-control"  id="multicol-phone"  class="form-control phone-mask" placeholder="658 799 8941"  aria-label="658 799 8941" />
                              </div>
                            <div class="col-md-6">
                              <label class="form-label" for="multicol-email">{{ __('admin.email') }}</label>
                              <div class="input-group input-group-merge">
                                <input  type="text"  id="multicol-email" name="email" value="{{$admin->email }}"  class="form-control"  placeholder="{{ __('admin.enterEmail') }}"  aria-label="john.doe"  aria-describedby="multicol-email2" />
                                <span class="input-group-text" id="multicol-email2">@example.com</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-password-toggle">
                                <label class="form-label" for="multicol-password">{{ __('admin.password') }} </label>
                                <div class="input-group input-group-merge">
                                  <input   type="password"   id="multicol-password"  name="password"   class="form-control"   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"   aria-describedby="multicol-password2"   />
                                  <span class="input-group-text cursor-pointer" id="multicol-password2"
                                    ><i class="bx bx-hide"></i
                                  ></span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="">
                            <!-- Notifications -->
                            <h5 class="card-header">{{ __('admin.permissions') }}</h5>

                            <div class="table-responsive">
                              <table class="table table-striped table-borderless border-bottom">
                                <thead>
                                  <tr>
                                    <th class="text-nowrap">{{ __('admin.menu') }}</th>
                                    <th class="text-nowrap text-center"> {{ __('admin.add') }}</th>
                                    <th class="text-nowrap text-center"> {{ __('admin.show') }}</th>
                                    <th class="text-nowrap text-center"> {{ __('admin.edit') }}</th>
                                    <th class="text-nowrap text-center"> {{ __('admin.delete') }}</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $models = ['category','country','city','client','feature','post','subadmin','subcategory','slider','TermsAndConditions','PrivacyPolicy'];
                                        $maps = ['create','read','update','delete'];
                                        $colors = ['form-check-succes', 'form-check-info' ,'form-check-warning','form-check-danger'];
                                    @endphp
                                    @foreach($models as $index => $model )
                                        <tr>
                                            <td class="text-nowrap">{{ __("admin.$model") }}</td>
                                            @foreach($maps as $index => $map)
                                                <td>
                                                    <div class="form-check d-flex justify-content-center   {{$colors[$index]}}">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="{{$model .'-'.$map}}"  id="{{$model .'-'.$map}}" @if ($admin->isAbleTo($model .'-'.$map)) checked @endif>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach

                                </tbody>
                              </table>
                            </div>

                          </div>

                          <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('admin.update') }}</button>
                          </div>
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
        $('.country').change(function(){
            var id = $(this).val();
            $.ajax({
               type:'POST',
               url:'{{ route("country_get_cities") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : id,
               },
               success:function(response) {
                  console.log(response.data);
                    var data = response.data;

                    $('.city option').each(function() {
                        $(this).remove();
                    });
                    $('.city').append(' <option value="">{{ __("admin.select") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.city').append('<option value="'+val.id+'">'+val.name+'</option>');
                    });
               }
            });
        });
    </script>
@endsection
