@extends('templates.vietphuong.master-with-title')
@section('content')
<div class="container">
    <ul class="contact-address style2 col-md-9">
        <li class="office-address">
            <i class="fa fa-map-marker"></i>
            <div class="details">
                <h5>Địa chỉ</h5>
                <p>187/7 Điện Biên Phủ, P. Đa Kao, Quận 1, TP. HCM</p>
            </div>
        </li>
        <li class="phone">
            <i class="fa fa-phone"></i>
            <div class="details">
                <h5>Điện thoại</h5>
                <p>
                    (84-8) 6273 1585
                </p>
            </div>
        </li>
        <li class="email-address">
            <i class="fa fa-envelope"></i>
            <div class="details">
                <h5>Email</h5>
                <p>
                    info@vpco.com.vn
                    <br>
                    www.vpco.com.vn
                </p>
            </div>
        </li>
    </ul>
    
    <div class="col-md-8 center-block text-center block">
        <div class="heading-box">
            <h2 class="box-title">Liên hệ</h2>
            <p class="desc-lg">Vui lòng để lại tin nhắn, chúng tôi sẽ hồi đáp trong thời gian sớm nhất</p>
        </div>
        @if (count($errors) > 0)
              <div class="alert alert-danger" style="background-color: #862323">
                  <ul>
                    <li>{{ $errors->all(){0} }}</li>
                  </ul>
            </div>
        @elseif (Session()->has('flash_level'))
              <div class="alert alert-success">
                  <ul>
                      {!! Session::get('flash_massage') !!} 
                  </ul>
              </div>
          @endif
        <form action="{!!url('/lien-he')!!}" method="post" accept-charset="utf-8"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-group col-sms-6 col-sm-6">
                    <input type="text" class="input-text full-width" value="{{ old('name') }}" name="name" placeholder="Họ và tên">
                </div>
                <div class="form-group col-sms-6 col-sm-6">
                    <input type="text" class="input-text full-width" value="{{ old('email') }}" name="email" placeholder="Địa chỉ email">
                </div>
            </div>
            <div class="form-group">
                <textarea rows="10" class="input-text full-width"  name="note" placeholder="Nội dung">{{ old('note') }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-md style1">Gửi tin nhắn</button>
            </div>
        </form>
    </div>
</div>
@endsection

