@extends('layouts.admin')

@section('styles')

@endsection
@section('content')
<link rel="stylesheet" href="{{asset("assets")}}/vendor/libs/sweetalert2/sweetalert2.css" />
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('post.index') }}"> {{ __('admin.posts') }} </a>/ {{ $post->title }} / </span> {{ __('admin.details') }}</h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.details') }}</h5>
                        @include('admin.includes._errors')


                        <form class="card-body" action="#" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-category">{{ __('admin.client') }}</label>
                                    <select id="multicol-client" name="client_id" class="select2 form-select client" data-allow-clear="true">
                                    <option value="">{{ __('admin.select') }}</option>
                                    @if(count($clients) > 0)
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if($post->client_id == $client->id) selected @endif>{{ $client->username }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="col-md-4" style="display: none;">
                                    <label class="form-label" for="multicol-main_photo">{{ __('admin.main_photo') }}</label>
                                    <input type="file" name="photo" id="multicol-title" class="form-control"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-main_photo">{{ __('admin.main_photo') }}</label>
                                    <img src="{{ asset("$post->photo") }}" style="width: 50px;margin-top: 20px;margin-right: 30%;">
                                </div>

                            </div>

                            <div class="row g-3">
                                @foreach (config('translatable.locales') as $lang)
                                    <div class="col-md-6">
                                        <label class="form-label" for="multicol-title">{{ __('admin.title_'.$lang) }}</label>
                                        <input type="text" name="title:{{ $lang }}" value="{{ $post->translate($lang)->title }}" id="multicol-title" class="form-control"  />
                                    </div>
                                @endforeach
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-mobile">{{ __('admin.mobile') }}</label>
                                    <input type="text" name="mobile" id="multicol-mobile" value="{{ $post->mobile }}" class="form-control"  id="multicol-phone"  class="form-control phone-mask" placeholder="658 799 8941"  aria-label="658 799 8941" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="multicol-mobile">{{ __('admin.post_status') }}</label>
                                    <div class="">
                                      <label class="switch">
                                        <input type="checkbox" name="status" class="switch-input is-valid"  @if($post->status == 1)checked @else value="0" @endif />
                                        <span class="switch-toggle-slider">
                                          <span class="switch-on"></span>
                                          <span class="switch-off"></span>
                                        </span>
                                        <span class="switch-label">{{ __('admin.active') }}</span>
                                      </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="multicol-mobile">{{ __('admin.post_Refusal') }}</label>
                                    <div class="">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#post_Refusal"> {{ __('admin.Refusal') }}</button>
                                    </div>
                                           <!-- Edit User Modal -->
                                    <div class="modal fade" id="post_Refusal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                        <div class="modal-content p-3 p-md-5">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="text-center mb-4">
                                                    <h3 style="color: red;">{{ __('admin.reason_rejecting_advertisement') }} </h3>
                                                </div>
                                                <div  >
                                                    <div class="col-12 ">
                                                        <textarea name="reason_rejecting_post"  class="form-control" id="{{ $post->id }}" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="col-12 text-center" style="margin-top: 15px;">
                                                        <button type="reset" class="btn btn-primary me-sm-3 me-1 post_Refusal" data-bs-dismiss="modal" aria-label="Close">{{ __('admin.submit') }}</button>
                                                        <button type="reset"  class="btn btn-label-secondary"  data-bs-dismiss="modal" aria-label="Close"> {{ __('admin.cancel') }} </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--/ Edit User Modal -->

                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                  <label class="form-label" for="multicol-category">{{ __('admin.category') }}</label>
                                  <select id="multicol-category" name="category_id" class="select2 form-select category" data-allow-clear="true">
                                    <option value="">{{ __('admin.select') }}</option>
                                    @if(count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($post->category_id  == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-sub_category">{{ __('admin.sub_category') }}</label>
                                    <select id="multicol-sub_category" name="sub_category_id" class="select2 form-select sub_category" data-allow-clear="true">
                                        <option value="">{{ __("admin.select") }}</option>
                                        @if(count($subcategories) > 0)
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" @if($post->sub_category_id  == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                  <label class="form-label" for="multicol-country">{{ __('admin.country') }}</label>
                                  <select id="multicol-country" name="country_id" class="select2 form-select country" data-allow-clear="true">
                                    <option value="">{{ __('admin.select') }}</option>
                                    @if(count($countries) > 0)
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @if($post->country_id == $country->id) selected @endif>{{ $country->name }}</option>
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
                                                <option value="{{ $city->id }}" @if($post->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                  <label class="form-label" for="multicol-price">{{ __('admin.price') }}</label>
                                  <input type="text" name="price" id="multicol-price"  value="{{ $post->price }}" class="form-control"  />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-mobile">{{ __('admin.currency') }}</label>
                                    <input type="text" name="currency" id="multicol-currency" value="{{ $post->currency }}" class="form-control"   />
                                </div>
                            </div>


                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.desc_'.$lang) }}</label>
                                    <textarea  name="desc:{{ $lang }}"  class="form-control"  id="collapsible-desc"  rows="3"    >{!! $post->translate($lang)->desc !!}</textarea>
                                </div>
                            @endforeach
                            <div class="div_features" style="display: block;">
                                <div class=" row g-3 features" >
                                    @if(count($post->features) > 0)
                                        @foreach ($post->features as $feature)
                                            @if($feature->inputType == 'text')
                                                <div class="col-md-6">
                                                    <label class="form-label" for="multicol-price">{{ $feature->name }}</label>
                                                    <input type="text" name="features[{{ $feature->id }}]" value="{{ $feature->pivot->value }}" id="multicol-price" class="form-control"  />
                                                </div>
                                            @else
                                                <div class="col-md-2" style=" margin-top: 50px;">
                                                    <input class="form-check-input" type="checkbox" name="features[{{ $feature->id }}]" @if($feature->pivot->value == 1) checked @endif id="defaultCheck1" />
                                                    <label class="form-check-label" for="defaultCheck1"> {{ $feature->name }} </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row g-3" style="display: none;">
                                <div class="col-md-6">
                                    <label class="form-label" for="multicol-photos">{{ __('admin.photos') }}</label>
                                    <input type="file" name="photos[]" multiple id="multicol-photos" class="form-control"  />
                                </div>
                            </div>
                            <div class="row g-3" style="    margin-top: 50px;">
                                @if(count($post->photos) > 0)
                                    @foreach ($post->photos as $photo)
                                        <div class="col-md-4">
                                            <img src="{{ asset("$photo->value") }}" style="width: 150px;">
                                        </div>
                                    @endforeach
                                @endif
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
<script src="{{ asset("assets") }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="{{ asset("assets") }}/js/extended-ui-sweetalert2.js"></script>
    <script>
        $('.post_Refusal').click(function(){
            var reason = $('[name="reason_rejecting_post"]').val();
            var post_id = $('[name="reason_rejecting_post"]').attr('id');
            // alert(post_id);
            $.ajax({
               type:'POST',
               url:'{{ route("admin.post-refusal") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : post_id,
                    'reason' : reason,
               },
               success:function(response) {
                    console.log(response);
                    if(response.status == 'true'){
                        Swal.fire({
                            title: response.title,
                            text: '',
                            icon: 'success',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }else{
                        Swal.fire({
                            title: response.title,
                            text: '',
                            icon: 'error',
                            customClass: {
                            confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }
                }
            });
        });
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

        $('.category').change(function(){
            var id = $(this).val();
            $.ajax({
               type:'POST',
               url:'{{ route("country_get_sub_categories") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : id,
               },
               success:function(response) {
                  console.log(response.data);
                    var data = response.data;

                    $('.sub_category option').each(function() {
                        $(this).remove();
                    });
                    $('.sub_category').append(' <option value="">{{ __("admin.select") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.sub_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                    });
               }
            });
        });

        $('.sub_category').change(function(){
            var id = $(this).val();
            $.ajax({
               type:'POST',
               url:'{{ route("sub_categories_get_features") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : id,
               },
               success:function(response) {
                    $('.div_features').css("display","block");
                    // console.log(response.data);
                    var data = response.data;
                    $('.features').empty();
                    $.each(data, function(key,val) {
                        console.log(val);
                        if(val.inputType == 'text'){
                            var feature = `
                                <div class="col-md-6">
                                  <label class="form-label" for="multicol-price">${val.name}</label>
                                  <input type="text" name="features[${val.id}]" id="multicol-price" class="form-control"  />
                                </div>
                            `;
                        }else{
                            var feature = `
                                <div class="col-md-2" style=" margin-top: 50px;">
                                    <input class="form-check-input" type="checkbox" name="features[${val.id}]" value="1" id="defaultCheck1" />
                                    <label class="form-check-label" for="defaultCheck1"> ${val.name} </label>
                                </div>
                            `;
                        }
                        $('.features').append(feature);
                    });
               }
            });
        });
    </script>
@endsection


