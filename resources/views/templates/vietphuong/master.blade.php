@include('templates.vietphuong.header')
    <div id="page-wrapper">
		@include('modules.nav-vp')
        <section id="content">
            @yield('content')
        </section>
	</div>	
@include('templates.vietphuong.footer')

