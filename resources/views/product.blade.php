@extends('templates.vietphuong.master-with-title')
@section('content')
<?php 
$newProduct = DB::table('products')
        ->orderBy('products.created_at', 'desc')
        ->paginate(6); 

?>
    <div class="container">
                <!-- begin row -->
                <div class="row">
                    <!-- begin main -->
                    <div id="main" class="col-sm-8 col-md-9">
                        <ul class="products row add-clearfix">
                            @forelse($data as $row)
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
                            @empty
                                <p>Chưa có hoặc không tìm thấy sản phẩm</p>
                            @endforelse
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
                                        <li><a href="{!!url('/san-pham?type='.$type->id.'&hang='.$category->id)!!}">{!!$category->name!!}</a></li>
                                        @endforeach        
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget box">
                            <h4>Sản phẩm mới</h4>
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