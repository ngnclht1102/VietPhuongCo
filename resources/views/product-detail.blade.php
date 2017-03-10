@extends('templates.vietphuong.master-with-title')
@section('content')
<div class="container">
    <div class="row">
        <div id="main" class="col-sm-8 col-md-9">
            <div class="product type-product">
                <div class="row single-product-details">
                    <div class="product-images col-sm-5 box-lg">
                        <div id="sync1" class="owl-carousel images owl-theme" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 3410px; left: 0px; display: block;"><div class="owl-item" style="width: 341px;"><div class="item easyzoom easyzoom--overlay is-ready">
                                <a href="http://placehold.it/1132x1296"><img src="http://placehold.it/566x648" alt=""></a>
                            </div></div><div class="owl-item" style="width: 341px;"><div class="item easyzoom easyzoom--overlay">
                                <a href="http://placehold.it/1132x1296"><img src="http://placehold.it/566x648" alt=""></a>
                            </div></div><div class="owl-item" style="width: 341px;"><div class="item easyzoom easyzoom--overlay">
                                <a href="http://placehold.it/1132x1296"><img src="http://placehold.it/566x648" alt=""></a>
                            </div></div><div class="owl-item" style="width: 341px;"><div class="item easyzoom easyzoom--overlay">
                                <a href="http://placehold.it/1132x1296"><img src="http://placehold.it/566x648" alt=""></a>
                            </div></div><div class="owl-item" style="width: 341px;"><div class="item easyzoom easyzoom--overlay">
                                <a href="http://placehold.it/1132x1296"><img src="http://placehold.it/566x648" alt=""></a>
                            </div></div></div></div>
                            
                        </div>
                        <div id="sync2" class="owl-carousel post-slider style3 thumbnails owl-theme multiple-items" data-items="4" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 720px; left: 0px; display: block;"><div class="owl-item synced" style="width: 72px; height: 22px;"><div class="item">
                                <a href="#"><img src="http://placehold.it/154x185" alt=""></a>
                            </div></div><div class="owl-item" style="width: 72px; height: 22px;"><div class="item">
                                <a href="#"><img src="http://placehold.it/154x185" alt=""></a>
                            </div></div><div class="owl-item" style="width: 72px; height: 22px;"><div class="item">
                                <a href="#"><img src="http://placehold.it/154x185" alt=""></a>
                            </div></div><div class="owl-item" style="width: 72px; height: 22px;"><div class="item">
                                <a href="#"><img src="http://placehold.it/154x185" alt=""></a>
                            </div></div><div class="owl-item" style="width: 72px; height: 22px;"><div class="item">
                                <a href="#"><img src="http://placehold.it/154x185" alt=""></a>
                            </div></div></div></div>
                        <div class="owl-controls clickable"><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
                    </div>
                    <div class="summary entry-summary col-sm-7 box-lg">
                        <div class="clearfix">
                            <h2 class="product-title entry-title">{!!$data->name!!}</h2>
                        </div>
                        <span class="product-price box"><strong>{!!number_format($data->price) !!}</strong><span class="currency-symbol"> VND</span></span>
                        <p>{!!$data->r_intro!!}</p>
                        <form class="variations-form cart">
                            <div class="single-variation-wrap">
                                <div class="variation-action">
                                    <a href="#" class="btn btn-medium style1"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="woocommerce-tabs tab-container vertical-tab clearfix box">
                    <div id="tab3-1" class="tab-content panel entry-content active">
                        <div class="tab-pane">
                            {!!$data->review!!}
                        </div>
                    </div>
                </div>
                <h4>Sản phẩm khác</h4>
                <ul class="related products row add-clearfix">
                    <?php 
                    $newProduct = DB::table('products')
                            ->join('category', 'products.cat_id', '=', 'category.id')
                            ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                            ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                            ->orderBy('products.created_at', 'desc')
                            ->paginate(6); 

                    ?>
                    @foreach($newProduct as $row)
                    <li class="product col-sms-6 col-sm-6 col-lg-4 box">
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
                            <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                            <a href="{!!url('san-pham/'.$row->id.'-'.$row->slug)!!}" class="btn btn-add-to-cart" style="float: right">Chi tiết</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar col-sm-4 col-md-3">
            <div class="main-mini-search-form full-width box">
                <form method="get" role="search">
                    <div class="search-box">
                        <input type="text" placeholder="Search" name="s" value="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <?php 
                $productTypes = DB::table('product_types')->get();
                $categories = DB::table('category')
                        ->orderBy('category.name', 'desc')
                        ->get(); 
            ?>
            <div class="widget box">
                <h4>Danh mục sản phẩm</h4>
                <ul class="filter-categories panel-group">
                    @foreach($productTypes as $type)
                    <li class="category-has-children">
                        <a href="#{!!$type->slug!!}" data-toggle="collapse">{!!$type->name!!}</a>
                        <ul id="{!!$type->slug!!}" class="collapse">
                            @foreach($categories as $category)
                            <li><a href="{!!url('/tim-san-pham/'.$type->id.'-'.$category->id.'-'.$type->slug.'-'.$category->slug)!!}">{!!$category->name!!}</a></li>
                            @endforeach        
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="widget box">
                <h4>Bán chạy</h4>
                <ul class="product-list-widget">
                    @foreach($newProduct as $row)
                    <li>
                        <div class="product-image">
                            <a href="#">
                                <img src="{!!url('uploads/products/'.$row->images)!!}" alt="{!!$row->name!!}">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="product-title"><a href="#">{!!$row->name!!}</a></h6>
                            <span class="product-price"><strong>{!!number_format($row->price) !!}</strong><span class="currency-symbol"> VND</span></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="widget box">
                <h4>Bài viết mới</h4>
                <?php 
                    $data =  DB::table('news')
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);
                ?>
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
        </div>
    </div>
</div>
@endsection