@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><span><a href="{{ route('client.index') }}"> {{ __('admin.clients') }} </a>  </span> / {{ $client->username }} / {{ __('admin.details') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.details') }}</h5>
                        @include('admin.includes._errors')
                        <form class="card-body" action="#" method="post">
                            @csrf
                            @method('put')

                            <input hidden name="id"  value="{{ $client->id }}">
                          <div class="row g-3">
                            <div class="col-md-6">
                              <label class="form-label" for="multicol-username">{{ __('admin.username') }}</label>
                              <input type="text" name="username" value="{{ $client->username }}" id="multicol-username" class="form-control" placeholder="{{ __('admin.enterUsername') }}" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="multicol-mobile">{{ __('admin.mobile') }}</label>
                                <input type="text" name="mobile" value="{{ $client->mobile }}" id="multicol-mobile" class="form-control"  id="multicol-phone"  class="form-control phone-mask" placeholder="658 799 8941"  aria-label="658 799 8941" />
                              </div>
                            <div class="col-md-6">
                              <label class="form-label" for="multicol-email">{{ __('admin.email') }}</label>
                              <div class="input-group input-group-merge">
                                <input  type="text"  id="multicol-email" name="email" value="{{ $client->email }}"  class="form-control"  placeholder="{{ __('admin.enterEmail') }}"  aria-label="john.doe"  aria-describedby="multicol-email2" />
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
                          <div class="row g-3">
                            <div class="col-md-6">
                              <label class="form-label" for="multicol-country">{{ __('admin.country') }}</label>
                              <select id="multicol-country" name="country_id" class="select2 form-select country" data-allow-clear="true">
                                <option value="">{{ __('admin.select') }}</option>
                                @if(count($countries) > 0)
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if($client->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="multicol-city">{{ __('admin.city') }}</label>
                                <select id="multicol-city" name="city_id" class="select2 form-select city" data-allow-clear="true">
                                  <option value="">{{ __("admin.select") }}</option>
                                  @if(count($cities) > 0)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if($client->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>

                            <label class="form-check-label">{{ __('admin.gender') }}</label>
                            <div class="col mt-2">
                              <div class="form-check form-check-inline">
                                <input  name="gender" @if($client->gender == 'meal') checked @endif  class="form-check-input"  type="radio"  value="meal"  id="collapsible-address-type-home"  checked="" />
                                <label class="form-check-label" for="collapsible-address-type-home">{{ __('admin.meal') }}</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input name="gender" @if($client->gender == 'female') checked @endif class="form-check-input" type="radio"  value="female" id="collapsible-address-type-office" />
                                <label class="form-check-label" for="collapsible-address-type-office">
                                    {{ __('admin.female') }}
                                </label>
                              </div>
                            </div>

                          </div>
                          {{-- <div class="pt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('admin.update') }}</button>
                          </div> --}}
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
