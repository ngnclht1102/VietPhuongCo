<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="{{(Request::path() == 'admin/home' ) ? 'active' : '' }}"><a href="{!!url('admin/home')!!}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li class="{{(Request::path() == 'admin/danhmuc' ) ? 'active' : '' }}" id="danhmuc"><a href="{!!url('admin/danhmuc')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý danh mục</a></li>

			<li class="{{(Request::path() == 'admin/sanpham/all') ? 'active' : '' }}" id="sanpham"><a href="{!!url('admin/sanpham/all')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm </a></li>
			<li class="{{(Request::path() == 'admin/news' ) ? 'active' : '' }}" ><a href="{!!url('admin/news')!!}"><span class="glyphicon glyphicon-file"></span> Quản lý Tin tức</a></li>

			<li class="{{(Request::path() == 'admin/contacts' ) ? 'active' : '' }}" ><a href="{!!url('admin/contacts')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý liên hệ</a></li>
			<li class="{{(Request::path() == 'admin/product_types' ) ? 'active' : '' }}" ><a href="{!!url('admin/product_types')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Kiểu sản phẩm</a></li>			

			<li role="presentation" class="divider"></li>
			
		</ul>

	</div><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->