@extends('templates.vietphuong.master-with-title')
@section('title')
:: Sản phẩm
@endsection
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
                                    @if ($row->price == 0)
                                        <span class="product-price"><strong>Giá: </strong><span class="currency-symbol"> liên hệ</span></span>
                                    @else 
                                        <span class="product-price"><strong>{!!number_format($row->price) !!}</strong><span class="currency-symbol"> VND</span></span>    
                                    @endif
                                    
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
                        $newPT = array(); 
                        $productTypes = (array) DB::table('product_types')->where('parent_id',0)->get();

                        foreach ($productTypes as $key => $type) {
                            $tmp = (array) $type;
                            $tmp['parents'] = (array) DB::table('product_types')->where('parent_id', $type->id)->get();
                            $newPT[] = (array)$tmp;
                        }
                        $categories = DB::table('category')
                                ->orderBy('category.name', 'desc')
                                ->where('id','<>','1')
                                ->where('id','<>','13')
                                ->where('id','<>','22')
                                ->where('id','<>','23')
                                ->get(); 
                    ?>
                    
                    <div class="widget box">
                        <h4>Danh mục sản phẩm</h4>
                        <ul class="filter-categories panel-group">
                            @foreach($newPT as $type)
                            <li class="category">
                            <a href="#{!!$type['slug']!!}" class="collapsed" data-toggle="collapse">{!!$type['name']!!}</a>
                                <ul id="{!!$type['slug']!!}" class="collapse in">
                                    @foreach($type['parents'] as $miniType)
                                    <li><a href="{!!url('/san-pham?type='.$miniType->id)!!}">{!! $miniType->name !!}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                        <!-- <div class="widget box">
                            <h4>Hãng sản xuất</h4>
                            <ul class="filter-categories panel-group">
                                @foreach($categories as $category)
                                <li class="category">
                                    <a href="{!!url('/san-pham?hang='.$category->id)!!}">
                                        {!!$category->name!!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div> -->


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
                                        @if ($row->price == 0)
                                        <span class="product-price"><strong>Giá: </strong><span class="currency-symbol"> liên hệ</span></span>
                                        @else 
                                            <span class="product-price"><strong>{!!number_format($row->price) !!}</strong><span class="currency-symbol"> VND</span></span>    
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- end sidebar -->
                </div> <!-- end row -->
            </div> <!-- end container -->
@endsection