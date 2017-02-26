@extends('layouts.new-master')
@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <!-- ====================================== /loc ket qua theo lua chon================================= -->
      <div id="pc"></div>
        @foreach($data as $row)
           <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 no-padding">
            <div class="thumbnail pc">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-pc">{!!$row->name!!}</small></h1>
                  <li>Cpu: {!!$row->cpu!!} </li>
                  <li>{!!$row->ram!!}</li>
                  <li>HDD : {!!$row->storage!!} </li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  @if ($row->promo1!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo1!!}</li>
                  @elseif($row->promo2!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo2!!}</li>
                  @elseif ($row->promo3!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo3!!}</li>
                  @endif 
                    <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt phần miềm, tải nhạc - ứng dụng miến phí</li>
                </div><!-- /div introl -->
              </div> <!-- /div bt -->
              <div class="ct">
                <a href="{!!url('pc/'.$row->id.'-'.$row->slug)!!} title="Chi tiết">                   
                  <span class="label label-warning">Cấu hình chi tiết</span> 
                  <li><strong>Mainboard</strong> : <i>  {!!$row->screen!!}</i></li>
                  <li><strong>CPU</strong> : <i>  {!!$row->cpu!!}</i></li>
                  <li><strong>HDD</strong> : T<i>{!!$row->storage!!} </i></li> 
                  <li><strong>HĐH</strong> :<i>{!!$row->os!!}  </i> - <strong>RAM </strong> :<i>{!!$row->ram!!}</i></li> 
                  <li><strong>VGA </strong> :<i> {!!$row->vga!!}</i></li>
                  <li><strong>Kết nối</strong> : <i> {!!$row->connect!!}</i></li> 
                </a>
              </div>
                <span class="btn label-warning"><strong>{!!number_format($row->price) !!}</strong> Vnd </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 item products -->
        @endforeach
      <div class="clearfix">
        
      </div>
      <!-- ===================================================================================/products ============================== -->
      {!!$data->render();!!}
@endsection