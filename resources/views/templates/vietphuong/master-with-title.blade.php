@include('templates.vietphuong.header')
    <div id="page-wrapper">
		@include('modules.nav-vp')
        <div class="page-title-container">
    
             <div class="page-title">
                <div class="container">
                    <h1 class="entry-title">VIỆT PHƯƠNG</h1>
                </div>
            </div>
        </div>
        <section id="content">
            @yield('content')
        </section>
	</div>	
@include('templates.vietphuong.footer')

