@include('layouts.header')
@include('modules.menu')
	<div class="container">     
	  	<div class="row">   
			@yield('content')
			@include('modules.gioithieu')
	  	</div>       <!-- /row -->
	</div> <!-- /container -->
@include('layouts.footer')