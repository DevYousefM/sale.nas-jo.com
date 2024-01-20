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
                <h5 class="card-title">{{ __('admin.clients') }}</h5>
                <div class="header body" >
                    <form method="get" action="{{ route('client.index') }}">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="input-group m-b-0">
                                    <input type="text" class="form-control show-tick" name="username" @if(isset($data['username']))  value="{{$data['username']}}"  @endif placeholder="{{ __('admin.username') }}">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="input-group m-b-0">
                                    <input type="text" class="form-control show-tick" name="mobile" @if(isset($data['mobile']))  value="{{$data['mobile']}}"  @endif placeholder="{{ __('admin.mobile') }}" >
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="input-group m-b-0">
                                    <input type="text" class="form-control show-tick" name="email" @if(isset($data['email']))  value="{{$data['email']}}" @endif placeholder="{{ __('admin.email') }}"  >
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
                      <th>{{ __('admin.username') }}</th>
                      <th>{{ __('admin.email') }}</th>
                      <th>{{ __('admin.mobile') }}</th>
                      <th>{{ __('admin.country') }}</th>
                      <th>{{ __('admin.city') }}</th>
                      <th>{{ __('admin.status') }}</th>
                      <th>{{ __('admin.verify') }}</th>
                      <th>{{ __('admin.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($clients) > 0)
                        @foreach ($clients as $index=>$item )
                            <tr>
                                <td >{{ $index+1 }}</td>
                                <td >{{ $item->username }}</td>
                                <td >{{ $item->email }}</td>
                                <td >{{ $item->mobile }}</td>
                                <td >{{ @$item->country->name }}</td>
                                <td >{{ @$item->city->name }}</td>
                                <td >{{ $item->verify }}</td>
                                <td >{{ $item->active }}</td>
                                <td>
                                    @if (Auth::guard('admin')->user()->hasPermission('client-read'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("client.show",$item->id) }}"><i class="bx bx-show"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('client-update'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("client.edit",$item->id) }}"><i class="bx bx-edit"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('client-delete'))
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
                                                <form action="{{ route('client.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"    >
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

                {{ $clients->links() }}
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
                    $('.city').append(' <option value="">{{ __("admin.select_city") }}</option>');
                    $.each(data, function(key,val) {
                        // console.log(val);
                        $('.city').append('<option value="'+val.id+'">'+val.name+'</option>');
                    });
               }
            });
        });
    </script>

    <!-- Page JS -->
    {{-- <script src="{{asset('assets')}}/js/app-user-list.js"></script> --}}
@endsection
