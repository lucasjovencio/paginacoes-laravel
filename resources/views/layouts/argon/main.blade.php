@include('layouts.argon.head')
@include('layouts.argon.header')
@include('layouts.argon.navbar')
	@include('layouts.argon.content_top')
	<!-- Page content -->
	<div class="container-fluid mt--7">
		@guest
		@else
		@endguest
	    @yield('main')
	@include('layouts.argon.footer')
@include('layouts.argon.alert')