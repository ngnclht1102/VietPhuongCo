@include('layouts.header')
@include('modules.menu')
	@include('modules.slide')
    <div class="container">     
      	<div class="row">   
			@yield('content')
			@include('modules.gioithieu')
      	</div>       <!-- /row -->
    </div> <!-- /container -->
@include('layouts.footer')