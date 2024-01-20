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
                    <h5 class="card-title">{{ __('admin.subadmins') }}</h5>
                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                      <div class="col-md-4 user_role"></div>
                      <div class="col-md-4 user_plan"></div>
                      <div class="col-md-4 user_status"></div>
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
                      <th>{{ __('admin.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($admins) > 0)
                        @foreach ($admins as $index=>$item )
                            <tr>
                                <td >{{ $index+1 }}</td>
                                <td >{{ $item->username }}</td>
                                <td >{{ $item->email }}</td>
                                <td >{{ $item->mobile }}</td>
                                <td>
                                    @if (Auth::guard('admin')->user()->hasPermission('subadmin-update'))
                                        <a class="btn btn-sm btn-icon" href="{{ route("sub-admin.edit",$item->id) }}"><i class="bx bx-edit"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('subadmin-delete'))
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
                                                <form action="{{ route('sub-admin.destroy',$item->id) }}" method="post">
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

                {{ $admins->links() }}
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
