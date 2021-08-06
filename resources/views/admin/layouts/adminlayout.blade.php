@include('admin.layouts.header')

<div id="app">
    @include('admin.layouts.sidebar')

    @yield('content')
</div>


@include('admin.layouts.footer')
