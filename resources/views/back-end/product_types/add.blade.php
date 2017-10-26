@extends('back-end.layouts.master')
@section('content')
<?php 
$typeRoot = DB::table('product_types')
		->where('parent_id','0')
        ->where('status','1')
        ->paginate(5000); 

?>
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
				<h1 class="page-header"><small>Thêm thông tin kiểu sản phẩm</small></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body">
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
						<form action="" method="POST" role="form">
				      		{{ csrf_field() }}
				      		<div class="form-group">
				      			<label for="input-id">Tên kiểu</label>
				      			<input type="text" name="txtName" id="inputTxtName" class="form-control" value="{!! old('txtCateName', isset($data['name']) ? $data['name'] : null)!!}" required="required">
				      		</div>
							<div class="form-group">
					      		<label for="input-id">Kiểu cha</label>
					      		<select name="sltParent" id="inputSltCate" class="form-control">
					      			<option value="0">- ROOT --</option>
									  @foreach($typeRoot as $row)
									  <option value="{!!$row->id!!}">---- {!!$row->name!!}</option>
									  @endforeach					      			
					      		</select>
				      		</div>  
				      		<input type="submit" name="btnCateAdd" class="btn btn-primary" value="Lưu" class="button" />
				      	</form>					      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection