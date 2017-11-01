@include('templates.vietphuong.header')
    <div id="page-wrapper">
		@include('modules.nav-vp')
        <div class="page-title-container">
            <div id="slider" class="nivoSlider" style="margin-top: 84px">     
                <img src="{!!url('front-end/templates/vietphuong/images/slider/vps1.jpg')!!}" alt=""  />   
                <img src="{!!url('front-end/templates/vietphuong/images/slider/vps2.jpg')!!}" alt="" />     
            </div> 
        </div>
        
        <section id="content">
            @yield('content')
        </section>
	</div>	
@include('templates.vietphuong.footer')

