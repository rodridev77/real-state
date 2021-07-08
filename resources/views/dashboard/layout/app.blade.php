@include('dashboard.layout.includes.header')

@include('dashboard.layout.includes.menu')

@yield('dashboard-content')
@include('dashboard.layout.includes.script-links')
@yield('dashboard-script')

@include('dashboard.layout.includes.footer')