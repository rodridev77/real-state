@include('layout.includes.header')

@include('layout.includes.menu')

@yield('content')
@include('dashboard.layout.includes.script-links')
@yield('script')
@include('layout.includes.footer')