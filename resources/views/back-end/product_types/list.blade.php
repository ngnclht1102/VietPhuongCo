@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Kiểu sản phẩm</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							Danh sách kiểu sản phẩm
						</div>
						<div class="col-md-2">
							<a href="{!!url('admin/product_types/add')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm Mới kiểu Sản Phẩm</button></a>
						</div>
					</div>
				</div>
				<div class="panel panel-default">					
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body" style="font-size: 13px;">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>										
										<th>ID</th>										
										<th>Tên</th>										
										<th>Ngày tạo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $row)
										<tr>
											<td>{!!$row->id!!}</td>
											<td>{!!$row->name!!}</td>
											<td>{!!$row->created_at!!}</td>
											<td>
												<a href="{!!url('admin/product_types/edit/'.$row->id)!!}"  title="Sửa" >Sửa </a>
												<span>&nbsp</span>
											    <a href="{!!url('admin/product_types/del/'.$row->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa kiểu sản phẩm này ?')"> Xóa</a>
											</td>
										</tr>
									@endforeach								
								</tbody>
							</table>
						</div>
						{!! $data->render() !!}
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection