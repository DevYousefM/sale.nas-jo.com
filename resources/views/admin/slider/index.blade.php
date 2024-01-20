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
                    <h5 class="card-title">{{ __('admin.slider') }}</h5>
                </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('admin.photo') }}</th>
                      <th>{{ __('admin.post_status') }}</th>
                      <th>{{ __('admin.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($slider) > 0)
                        @foreach ($slider as $index=>$item )
                            <tr>
                                <td >{{ $index+1 }}</td>
                                <td >
                                    <img src="{{ asset("$item->photo") }}" style="width: 250px;" >
                                </td>
                                <td >
                                    <div class="">
                                        <label class="switch">
                                          <input type="checkbox" name="status" class="switch-input is-valid status" id="status_{{ $item->id }}"  @if($item->status == 1)checked @else value="0"  @endif />
                                          <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                          </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
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
                                                <form action="{{ route('slider.destroy',$item->id) }}" method="post">
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

                {{ $slider->links() }}
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
                url:'{{ route("status_slider") }}',
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
    </script>
@endsection
