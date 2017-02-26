@extends('templates.vietphuong.master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <!-- danh muc dien thoai -->
        @foreach($mobile as $row)        
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li> 
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('mobile/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                  <span class="label label-warning">Cấu Hình Nổi bật</span> 
                  <li><strong>CPU</strong> : <i> {!!$row->cpu!!}</i></li>
                  <li><strong>Màn Hình</strong> : <i>{!!$row->screen!!} </i></li> 
                  <li><strong>Camera</strong> : Trước  <i>{!!$row->cam1!!}</i> Sau <i>{!!$row->cam2!!} </i></li> 
                  <li><strong>HĐH</strong> :<i> {!!$row->os!!} </i> <strong> Bộ nhớ trong</strong> :<i> {!!$row->storage!!} </i></li> 
                  <li><strong>Pin</strong> :<i> {!!$row->pin!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning"><strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc dien thoai -->
       
          <div class="clearfix">            
          </div>

        <!--========================== phan danh muc laptop   =========================================  -->
          <div id="laptop"></div>
          @foreach($laptop as $row)
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding" >
            <div class="thumbnail">          
              <div class="hienthi">
                <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                <div class="caption">
                  <h1><small><strong class="title-pro">{!!$row->name!!}</strong></small></h1>
                  <p>    
                      <li><i>{!!$row->intro!!}</i></li>             
                      <span class="label label-info ">Ưu đãi khi mua</span>
                      <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                      <li> <span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li>
                      <li> <span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                  </p>
                  <p>
                    <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                  </p>
                </div>
              </div>
              <div class="tomtat">
                <div class="thongtin">
                  <a href="{!!url('laptop/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
                    <span class="label label-info ">Ưu đãi khi mua</span>   
                    <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                    <li><span class="glyphicon glyphicon-hand-right"></span> T{!!$row->promo2!!}</li> 
                    <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!}</li>
                    <span class="label label-warning">Cấu Hình Nổi bật</span> 
                    <li><strong>CPU</strong> : <i>{!!$row->cpu!!}</i></li>
                    <li><strong>RAM </strong> : <i>{!!$row->ram!!}</i></li>
                    <li><strong>Lưu Trữ</strong> : <i> {!!$row->storage!!}</i></li>
                    <li><strong>Màn Hình</strong> : <i> {!!$row->screen!!} </i></li> 
                    <li><strong>VGA</strong> : <i> {!!$row->vga!!}</i></li> 
                    <li><strong>HĐH</strong> :<i> {!!$row->os!!}</i></li> 
                    <li><strong>Pin</strong> :<i> {!!$row->pin!!}</i></li>
                  </a>
                </div>                
                  <div class="price">  
                    <span class="btn btn-info btn-block ">Giá : <strong>{!!$row->price!!}</strong> Đ</span>   
                    <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success btn-block">Thêm vào giỏ</a> 
                  </div>                  
              </div> 
            </div>
          </div>
        @endforeach
        <div class="clearfix">
          
        </div>
          <a href="http://api.hostinger.vn/redir/1309904" target="_blank"> 
            <img src="images/slides/thumbs/qc1.png" alt="Hosting Miễn Phí" border="0" width="100%" height="250" />
          </a>
<!-- =============== danh muc may tinh ===================================== -->
        <div id="pc"></div>
        @foreach($pc as $row)
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
            <div class="thumbnail pc">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-pc">{!!$row->name!!}</small></h1>
                  <li> CPU: {!!$row->cpu!!}</li>
                  <li> RAM :{!!$row->ram!!}</li>
                  <li>HDD : {!!$row->storage!!} </li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!} </li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo3!!} </li> 
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('pc/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">                   
                  <span class="label label-warning">Cấu hình chi tiết</span> 
                  <li><strong>CPU</strong> : <i>  {!!$row->cpu!!}</i></li>
                  <li><strong>HDD</strong> : T<i> {!!$row->storage!!}</i></li> 
                  <li><strong>HĐH</strong> :<i{!!$row->os!!}  </i> - <strong>RAM </strong> :<i>{!!$row->ram!!}</i></li> 
                  <li><strong>VGA - DVD</strong> :<i> {!!$row->vga!!}</i></li>
                  <li><strong>Kết nối</strong> : <i> {!!$row->connect!!}</i></li> 
                </a>
              </div>
                <span class="btn label-warning">Giá : <strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 item products -->
        @endforeach      

        </div> <!-- /col 12 -->     
@endsection
