@extends('templates.vietphuong.master-with-title')
@section('content')
<?php 
$newProduct = DB::table('products')
        ->join('category', 'products.cat_id', '=', 'category.id')
        ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
        ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
        ->orderBy('products.created_at', 'desc')
        ->paginate(6); 

?>
    <div class="container">
                <!-- begin row -->
                <div class="row">
                    <!-- begin main -->
                    <div id="main" class="col-sm-8 col-md-9">
                        <ul class="products row add-clearfix">
                            @foreach($data as $row)
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
                                    <a href="{!!url('san-pham/'.$row->id.'-'.$row->slug)!!}" class="btn btn-add-to-cart" style="float: right">Chi tiết</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="post-pagination">
                            {{ $data->links() }}
                        </div>    
                    </div> <!-- end main -->
                    <!-- begin sidebar -->
                    <div class="sidebar col-sm-4 col-md-3">
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
                    <!-- end sidebar -->
                </div> <!-- end row -->
            </div> <!-- end container -->
@endsection