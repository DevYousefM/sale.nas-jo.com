@extends('layouts.admin')

@section('styles')

@endsection
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('get_term') }}"> {{ __('admin.TermsAndConditions') }} </a></h4>
            <div class="row mb-4">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ __('admin.details') }}</h5>
                        @include('admin.includes._errors')


                        <form class="card-body" action="{{ route('post_term') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @foreach (config('translatable.locales') as $lang)
                                <div class="col-12">
                                    <label class="form-label" for="collapsible-desc">{{ __('admin.term_'.$lang) }}</label>
                                    <textarea  class="form-control"  name="value:{{ $lang }}"  id="collapsible-desc"  rows="10"    >
                                        @if(isset($term))
                                            {!! @$term->translate($lang)->value !!}
                                        @endif
                                    </textarea>
                                </div>
                            @endforeach

                            @if (Auth::guard('admin')->user()->hasPermission('TermsAndConditions-update'))
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">{{ __('admin.update') }}</button>
                                </div>
                            @endif
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@endsection
