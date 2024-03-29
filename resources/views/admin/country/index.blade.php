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
                <h5 class="card-title">{{ __('admin.countries') }}</h5>
                <div class="header body" >
                    <form method="get" action="{{ route('country.index') }}">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                <div class="input-group m-b-0">
                                    <input type="text" class="form-control show-tick" name="search" @if(isset($data['search']))  value="{{$data['search']}}"  @endif placeholder="{{ __('admin.search') }}">
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
                      <th>{{ __('admin.name') }}</th>
                      <th>{{ __('admin.currency') }}</th>
                      <th>{{ __('admin.code') }}</th>
                      <th>{{ __('admin.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($countries) > 0)
                        @foreach ($countries as $index=>$item )
                            <tr>
                                <td >{{ $index+1 }}</td>
                                <td >
                                    <img src="{{ asset("$item->photo") }}" style="width: 50px;" >
                                </td>
                                <!-- @foreach (config('translatable.locales') as $lang)
                                    <td class="name_{{ $lang }}">{{ $item->translate($lang)->name }}</td>
                                @endforeach -->
                                <td class="name">{{ $item->translate()->name }}</td>
                                <td class="currency">{{ $item->translate()->currency }}</td>
                                <td >{{ $item->code }}</td>
                                <td>
                                    @if (Auth::guard('admin')->user()->hasPermission('country-update'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("country.edit",$item->id) }}"><i class="bx bx-edit"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('country-delete'))
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
                                                <form action="{{ route('country.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"   >
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

                {{ $countries->links() }}
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
@endsection
