<!-- left menu - menu ben  trai	 -->
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Tìm kiếm ...">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{!!url('admin/home/')!!}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li id="danhmuc"><a href="{!!url('admin/danhmuc')!!}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Quản lý danh mục</a></li>

			<li id="sanpham"><a href="{!!url('admin/sanpham/all')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý sản phẩm </a></li>
			<li><a href="{!!url('admin/news')!!}"><span class="glyphicon glyphicon-file"></span> Quản lý Tin tức</a></li>

			<li><a href="{!!url('admin/contacts')!!}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Quản lý liên hệ</a></li>

			<li role="presentation" class="divider"></li>
			
		</ul>

	</div><!--/.sidebar-->
<!-- /left menu - menu ben  trai	 -->