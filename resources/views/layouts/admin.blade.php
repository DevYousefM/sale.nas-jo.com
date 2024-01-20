@include('admin.includes.header')


@yield('styles')

@include('admin.includes.nav')


@include('admin.includes.aside')

@include('admin.includes._session')


@yield('content')



@include('admin.includes.footer')

@yield('scripts')
