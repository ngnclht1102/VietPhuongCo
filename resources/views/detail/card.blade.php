@extends('layouts.new-master')
@section('content')
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-home"><a href="#" title=""> Home</a></span> 
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span><a href="#" title=""> Đặt hàng</a>
      <span class="glyphicon glyphicon-chevron-right" style="font-size: 11px;"></span> <a href="#" title="">{!!$slug!!}</a>
    </h3>              
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">              
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
          <div class="panel panel-success" style="min-height: 1760px;">
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
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hình ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>SL</th>
                      <th>Action</th>
                      <th>Giá</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $row)
                    <tr>
                      <td>{!!$row->id!!}</td>
                      <td><img src="{!!url('uploads/products/'.$row->options->img)!!}" alt="dell" width="80" height="50"></td>
                      <td>{!!$row->name!!}</td>
                      <td class="text-center">                        
                          @if (($row->qty) >1)
                          <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"><span class="glyphicon glyphicon-minus"></span></a> 
                          @else
                            <a href="#"><span class="glyphicon glyphicon-minus"></span></a> 
                          @endif
                          <input type="text" class="qty text-center" value=" {!!$row->qty!!}" style="width:30px; font-weight:bold; font-size:15px; color:blue;" readonly="readonly"> 
                        <a href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-up')!!}"><span class="glyphicon glyphicon-plus-sign"></span></a>
                      </td>
                      <td><a href="{!!url('gio-hang/delete/'.$row->rowId)!!}" onclick="return xacnhan('Xóa sản phẩm này ?')" ><span class="glyphicon glyphicon-remove" style="padding:5px; font-size:18px; color:red;"></span></a></td>
                      <td>{!! number_format($row->price) !!} Vnd</td>
                      <td>{!! number_format($row->qty * $row->price) !!} Vnd</td>
                    </tr>
                  @endforeach                    
                    <tr>
                      <td colspan="3"><strong>Tổng cộng :</strong> </td>
                      <td>{!!Cart::count()!!}</td>
                      <td colspan="2" style="color:red;">{!!Cart::subtotal()!!} Vnd</td>                      
                    </tr>                    
                  </tbody>
                </table>                
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12 no-paddng">
              @if(Cart::count() !=0)
                @if (Auth::guest())
                  <div class="input-group">
                      <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                        <option value="cod">COD (thanh toán khi nhận hàng)</option>
                        <option value="paypal">Paypal (Thanh toán qua Paypal)</option>                      
                      </select>
                    </div>
                  <a class="btn btn-large btn-warning pull-right" href="{!!url('/login')!!}" >Tiến hàng thanh toán</a>
                @else
                  <form action="{!!url('/dat-hang')!!}" method="get" accept-charset="utf-8">                    
                    <div class="input-group">
                    <label for="paymethod">Chọn phương thức thanh toán</label>
                      <select name="paymethod" id="inputPaymethod" class="form-control" required="required">
                        <option value="">Hãy chọn phương thức thanh toán</option> 
                        <option value="paypal">Thanh toán trực tuyến ( Paypal )</option> 
                        <option value="cod"> Thanh toán khi nhận hàng ( COD )</option>
                      </select>
                    </div>
                    <hr>
                      <button type="submit" class="btn btn-danger pull-right">Tiến hành thanh toán</button>
                      <a href="{!!url('/')!!}" type="button" class="btn btn-large btn-primary pull-left">Tiếp tục mua hàng</a>
                  </form>
                @endif
              @endif
              </div>
              <hr>
            </div>
          </div>   
        </div>
      </div>     
    </div> 
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">            
       <!-- panel inffo 1 -->
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Sản phẩm tương tự</h3>
        </div>
        <div class="panel-body no-padding">
        <?php 
          $mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->orderBy('products.created_at', 'desc')
                ->paginate(2); 

        ?>
        @foreach($mobile as $row)
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
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
                <a href="{!!url('mobile/'.$row->id.'-'.$row->slug)!!}" title="Chi tiết">
                  <span class="label label-info">Ưu đãi khi mua</span>   
                  @if ($row->promo1!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo1!!}</li>
                  @elseif($row->promo2!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo2!!}</li>
                  @elseif ($row->promo3!='')
                    <li><span class="glyphicon glyphicon-ok-sign"></span>{!!$row->promo3!!}</li>
                  @endif 
                    <li><span class="glyphicon glyphicon-ok-sign"></span>Cài đặt phần miềm, tải nhạc - ứng dụng miến phí</li> 
                  <span class="label label-warning">Cấu Hình Nổi bật</span> 
                  <li><strong>CPU</strong> : <i>  {!!$row->cpu!!}</i></li>
                  <li><strong>Màn Hình</strong> : <i>{!!$row->screen!!} </i></li> 
                  <li><strong>Camera</strong> : Trước  <i>{!!$row->cam1!!}</i> Sau <i>{!!$row->cam2!!}</i></li> 
                  <li><strong>HĐH</strong> :<i> {!!$row->os!!} </i> <strong> Bộ nhớ trong</strong> :<i> {!!$row->storage!!} </i></li> 
                  <li><strong>Pin</strong> :<i> {!!$row->pin!!}</i></li>
                </a>
              </div>
                <span class="btn label-warning"><strong>{!!number_format($row->price)!!}</strong>Vnd </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
        @endforeach        

        </div>
      </div> <!-- /panel info 2  quản cáo 1          -->
      
    <!-- panel info 2  quản cáo 1          -->          
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title text-center">Sự kiện HOT</h3>
      </div>
      <div class="panel-body no-padding">
        <a href="#" title=""><img src="{!!url('images/slides/thumbs/qc1.png')!!}" alt="" width="100%" height="100%"> </a> <br>
        <a href="#" title=""><img src="{!!url('images/slides/thumbs/qc2.png')!!}" alt="" width="100%" height="100%"> </a> <br>
        <a href="#" title=""><img src="{!!url('images/slides/thumbs/qc3.png')!!}" alt="" width="100%" height="100%"> </a>
        <a href="#" title=""><img src="{!!url('images/slides/thumbs/qc4.png')!!}" alt="" width="100%" height="100%"> </a>
        <a href="#" title=""><img src="{!!url('images/slides/thumbs/qc5.png')!!}" alt="" width="100%" height="100%"> </a>
      </div>
    </div> <!-- /panel info 2  quản cáo 1          -->        
 
     <!-- fan pages myweb -->
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Fans Pages</h3>
      </div>
      <div class="panel-body">
        Hãy <a href="#" title="">Like</a> facebook của MyWeb để cập nhật tin mới nhất
      </div>
    </div> <!-- /fan pages myweb -->        
  </div> 
</div>
<!-- ===================================================================================/news ============================== -->
@endsection