@extends('templates.vietphuong.master-with-title')
@section('title')
:: Tìm kiếm sản phẩm && bài viết
@endsection
@section('content')
	<div class="container">
                <div class="row">
                    
                    <div id="main" class="col-sm-8">
                        <div class="blog-posts">
                            @if ( count($products) )
                            <p>Kết quả tìm kiếm sản phẩm</p>
                            @endif
                            @if ( !count($products) )
                            <p>Không tìm thấy sản phẩm</p>
                            @endif
                            <ul class="products row add-clearfix">
                                @foreach($products as $row)
                                <li class="product col-sms-3 col-sm-3 col-lg-3 box">
                                    <a href="{!!url('san-pham/'.$row->id.'-'.$row->slug)!!}" class="product-image">
                                        <div class="first-img">
                                            <img src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                                        </div>
                                        <div class="back-img">
                                            <img src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                                        </div>
                                    </a>
                                    <div class="product-content" style="padding-bottom: 33px;">
                                        <h5 class="product-title"><a href="{!!url('san-pham/'.$row->id.'-'.$row->slug)!!}">{!!$row->name!!}</a></h5>
                                        <span class="product-price"><strong>{!!number_format($row->price) !!}</strong><span class="currency-symbol"> VND</span></span>
                                    </div>
                                    <div class="product-action">
                                        <a href="{!!url('san-pham/'.$row->id.'-'.$row->slug)!!}" class="btn btn-add-to-cart" style="float: right">Chi tiết</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="post-pagination">
                                {{ $products->links() }}
                            </div>    
                         </div>
                        <div class="blog-posts">
                        @if ( count($all) )
                            <p>Kết quả tìm kiếm bài viết</p>
                            @endif
                            @if ( !count($all) )
                            <p>Không tìm thấy bài viết</p>
                            @endif
                        @foreach($all as $row)
                            <article class="post post-full">
                                <div class="post-image col-md-5">
                                    <div class="image">
                                        <img src="{!!url('/uploads/news/'.$row->images)!!}" alt="{!!$row->slug!!}">
                                        <div class="image-extras">
                                            <a href="#" class="post-gallery"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-content col-md-7" style="min-height: 245px;">
                                    <h3 class="post-title"><a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">{!!$row->title!!}</a></h3>
                                    
                                    <div>{!!$row->intro!!}</div>
                                    <div class="post-action">
                                        <a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}" class="btn btn-sm style3 post-read-more">Đọc tiếp...</a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            <div class="post-pagination">
                                {{ $all->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4">
                        <div class="main-mini-search-form full-width box">
                            <form method="get" role="search" action="{!!url('/tim-kiem')!!}">
                                <div class="search-box">
                                    <input type="text" placeholder="Tìm bài viết..." name="keyword" value="">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="box">
                            <h4>Bài viết nổi bật</h4>
                            <ul class="recent-posts">
                                @foreach($data as $row)
                                <li style="display: flex; padding-top: 15px; padding-bottom: 15px">
                                    <a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">
                                        <div class="recent-image">
                                            <img style="max-width:none;" src="{!!url('/uploads/news/'.$row->images)!!}" alt="{!!$row->title!!}" width="100" height="100">
                                        </div>
                                        <div class="post-content">
                                            <a class="post-title" href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">{!!$row->title!!}</a>
                                            <p class="post-meta">Đăng bởi <a href="#">{!!$row->author!!}</a> ngày {!!$row->created_at!!}</p>
                                        </div>
                                   </a>     
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="box">
                            <h4>Chuyên mục</h4>
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="{!!url('/giai-phap')!!}">Giải pháp</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="{!!url('/kien-thuc')!!}">Kiến thức chung</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h4>Từ khoá</h4>
                            @include('modules.tags')
                        </div>
                    </div>
                </div>
            </div>
@endsection