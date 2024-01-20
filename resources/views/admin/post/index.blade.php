@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title">{{ __('admin.posts') }}</h5>
                    <div class="header body" >
                        <form method="get" action="{{ route('post.index') }}">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="input-group m-b-0">
                                        <input type="text" class="form-control show-tick" name="username" @if(isset($data['username']))  value="{{$data['username']}}"  @endif placeholder="{{ __('admin.username') }}">
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="input-group m-b-0">
                                        <select id="multicol-category" name="category_id" class="select2 form-select category" data-allow-clear="true">
                                            <option value="">{{ __('admin.select_category') }}</option>
                                            @if(count($categories) > 0)
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="input-group m-b-0">
                                        <select id="multicol-sub_category" name="sub_category_id" class="select2 form-select sub_category" data-allow-clear="true">
                                        <option value="">{{ __("admin.select_subcategory") }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="input-group m-b-0">
                                        <select id="multicol-country" name="country_id" class="select2 form-select country" data-allow-clear="true">
                                            <option value="">{{ __('admin.select_country') }}</option>
                                            @if(count($countries) > 0)
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if(isset($data['country_id'])) @if($data['country_id'] == $country->id ) selected @endif @endif>{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <div class="input-group m-b-0">
                                        <select id="multicol-city" name="city_id" class="select2 form-select city" data-allow-clear="true">
                                            <option value="">{{ __("admin.select_city") }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-12" style="    display: flex;">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">{{__('admin.search')}}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                  </div>

              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('admin.photo') }}</th>
                      <th>{{ __('admin.title') }}</th>
                      <th>{{ __('admin.category') }}</th>
                      <th>{{ __('admin.sub_category') }}</th>
                      <th>{{ __('admin.country') }}</th>
                      <th>{{ __('admin.city') }}</th>
                      <th>{{ __('admin.post_status') }}</th>
                      <th>{{ __('admin.feature') }}</th>
                      <th>{{ __('admin.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($posts) > 0)
                        @foreach ($posts as $index=>$item )
                            <tr>
                                <td >{{ $index+1 }}</td>
                                <td ><img src="{{ asset("$item->photo") }}" style="    width: 50px;"></td>
                                <td >{{ $item->title }}</td>
                                <td >{{ $item->category->name }}</td>
                                <td >{{ @$item->subcategory->name }}</td>
                                <td >{{ @$item->country->name }}</td>
                                <td >{{ @$item->city->name }}</td>
                                <td >
                                    <div class="">
                                        <label class="switch">
                                          <input type="checkbox" name="status" class="switch-input is-valid status" id="status_{{ $item->id }}"  @if($item->status == 1)checked @else value="0" @endif />
                                          <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                          </span>
                                        </label>
                                    </div>
                                </td>
                                <td >
                                    <div class="">
                                        <label class="switch">
                                          <input type="checkbox" name="feature" class="switch-input is-valid feature" id="feature_{{ $item->id }}"  @if($item->feature == 1)checked @else value="0"  @endif />
                                          <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                          </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    @if (Auth::guard('admin')->user()->hasPermission('post-read'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("post.show",$item->id) }}"><i class="bx bx-show"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('post-update'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("post.edit",$item->id) }}"><i class="bx bx-edit"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('post-delete'))
                                        <button class="btn btn-sm btn-icon delete-record" data-bs-toggle="modal"  data-bs-target="#modalToggle{{ $item->id }}"><i class="bx bx-trash"></i></button>
                                    @endif

                                    <div  class="modal fade"  id="modalToggle{{ $item->id }}"  aria-labelledby="modalToggleLabel"  tabindex="-1"  style="display: none"  aria-hidden="true"  >
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalToggleLabel" style="color: red;">{{ __('admin.delete_item') }}</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">{{ __('admin.sure_delete_item') }}</div>
                                            <div class="modal-footer">
                                                <form action="{{ route('post.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal"   >
                                                        {{ __('admin.delete') }}
                                                      </button>
                                                </form>

                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>

                </table>

                {{ $posts->links() }}
              </div>
            </div>
          </div>
    </div>
          <!-- / Content -->

@endsection

@section('scripts')
    <!-- Vendors JS -->
    <script src="{{asset('assets')}}/vendor/libs/moment/moment.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/jszip/jszip.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="{{asset('assets')}}/vendor/libs/datatables-buttons/buttons.print.js"></script>
    {{-- <script src="{{asset('assets')}}/vendor/libs/select2/select2.js"></script> --}}

    <!-- Main JS -->
    <script src="{{asset('assets')}}/js/main.js"></script>

    <!-- Page JS -->
    {{-- <script src="{{asset('assets')}}/js/app-user-list.js"></script> --}}

    <script>


        $('.status').change(function(){
            var id = $(this).attr('id');
            var strArray = id.split("_");
            var value = $(this).val();
            if(value == '0'){
                $(this).val('1');
                value = 1;
            }else{
                $(this).val('0');
                value = 0;
            }

            $.ajax({
               type:'POST',
               url:'{{ route("status_post") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : strArray[1],
                    'status' : value,
               },
               success:function(response) {
                    console.log(response);
               }
            });
        });

        $('.feature').change(function(){
            var id = $(this).attr('id');
            var strArray = id.split("_");
            var value = $(this).val();
            if(value == '0'){
                $(this).val('1');
                value = 1;
            }else{
                $(this).val('0');
                value = 0;
            }

            $.ajax({
               type:'POST',
               url:'{{ route("feature_post") }}',
               data:{
                    '_token' : '<?php echo csrf_token() ?>',
                    'id' : strArray[1],
                    'feature' : value,
               },
               success:function(response) {
                    console.log(response);
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
                    $('.city').append(' <option value="">{{ __("admin.select_city") }}</option>');
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
                    $('.sub_category').append(' <option value="">{{ __("admin.select_subcategory") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.sub_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                    });
               }
            });
        });
    </script>
@endsection
