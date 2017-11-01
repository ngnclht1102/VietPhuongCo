@extends('templates.vietphuong.master-with-slide')
@section('title')
:: Trang chủ
@endsection
@section('content')
    
    <div class="section">
                <div class="container">
                    <div class="heading-box">
                        <h2 class="box-title">Các dịch vụ</h2>
                        <p class="desc-lg">Lĩnh vực kinh doanh chính của chúng tôi </p>
                    </div>
                    <div class="block row">
                        <div class="col-sm-6 col-md-3">
                            <div class="icon-box style-boxed-4 box">
                                <!--<div class="icon-container">
                                    <image src="{!!url('front-end/templates/vietphuong/images/inan.png')!!}" alt="thietbicongnghethongtin" />
                                </div>-->
                                <div class="box-content">
                                    <h4 class="box-title"><a href="{!!url('/san-pham?type=8')!!}">Giải pháp quản lý</a></h4>
                                    <p>Tư vấn và thiết kế giải pháp quản lý chuyên nghiệp</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="icon-box style-boxed-4 box">
                                <!--<div class="icon-container">
                                    <image src="{!!url('front-end/templates/vietphuong/images/thietbimavach.png')!!}" alt="thietbicongnghethongtin" />
                                </div>-->
                                <div class="box-content">
                                    <h4 class="box-title"><a href="{!!url('/san-pham?type=1')!!}">Thiết bị mã vạch</a></h4>
                                    <p>Chúng tôi cung cấp các thiết bị mã vạch</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="icon-box style-boxed-4 box">
                                <!--<div class="icon-container">
                                    <image src="{!!url('front-end/templates/vietphuong/images/thietbiit.png')!!}" alt="thietbicongnghethongtin" />
                                </div>-->
                                <div class="box-content">
                                    <h4 class="box-title"><a href="{!!url('/san-pham?type=2')!!}">In ấn</a></h4>
                                    <p>Chúng tôi cung cấp các sản phẩm trong lĩnh vục in dân dụng và công nghiệp.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="icon-box style-boxed-4 box">
                                <!--<div class="icon-container">
                                    <image src="{!!url('front-end/templates/vietphuong/images/phanmem.png')!!}" alt="thietbicongnghethongtin" />
                                </div>-->
                                <div class="box-content">
                                    <h4 class="box-title"><a href="{!!url('/san-pham?type=7')!!}">Máy tính và thiết bị công nghệ thông tin</a></h4>
                                    <p>Chúng tôi chuyên cung cấp và phân phối các sản phẩm máy tính và thiết bị công nghệ thông tin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="post-slider style1 owl-carousel box owl-theme" style="opacity: 1; display: block;">
                            
                                    <div class="owl-item" style="width: 470px;">
                                            <img src="{!!url('front-end/templates/vietphuong/images/slide1.png')!!}"  alt="">
                                    </div>
                                
                           
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <h3>Về Việt Phương</h3>
                            <p>Chúng tôi là một công ty sản xuất và phân phối các thiết bị phần cứng, phần mềm liên quan tới các giải pháp về siêu thị, kho bãi, in ấn...</p>
                            <p>Chúng tôi cam kết đưa lại sự tiện nghi tốt nhất cho khách hàng sử dụng dịch vụ và thiết bị của chúng tôi. </p>
                            <br>
                            <a href="{!!url('/tin-tuc/26-gioi-thieu-ve-viet-phuong')!!}" class="btn btn-md style1">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>

    
        
    
    <div class="section container">
        <div class="heading-box">
            <h2 class="box-title">Các giải pháp thông minh từ chúng tôi</h2>
            <p class="desc-lg">Đúc kết từ kinh nghiệm thực tế</p>
        </div>
        <div class="iso-container iso-col-3 style-masonry has-column-width blog-posts">
            @foreach($news as $row)
            <div class="iso-item">
                <article class="post post-masonry">
                    <div class="post-image">
                        <div class="image">
                            <img alt="" src="{!!url('/uploads/news/'.$row->images)!!}">
                            <div class="image-extras">
                                <a class="post-gallery" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="entry-author fn">Đăng bởi <a href="#">Admin</a></span>
                            <span class="entry-time"><span class="updated no-display">2014-09-09T15:57:08+00:00</span><span class="published">12 Nov, 2014</span></span>
                            <span class="post-category">in <a href="#">Giải pháp</a></span>
                        </div>
                        <h3 class="entry-title"><a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">{!!$row->title!!}</a></h3>
                        <p>{!!$row->intro!!}</p>
                    </div>
                    <div class="post-action">
                        <a class="btn btn-sm style3 post-read-more" href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">Đọc tiếp...</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
@endsection
