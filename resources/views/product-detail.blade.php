@extends('templates.vietphuong.master-with-title')
@section('content')
<div class="container">
    <div class="row">
        <div id="main" class="col-sm-8 col-md-9">
            <div class="product type-product">
                <div class="row single-product-details">
                    <div class="product-images col-sm-5 box-lg">
                        <img src="{!!url('/uploads/products/'.$data->images)!!}" alt="">
                    </div>

                    <div class="summary entry-summary col-sm-7 box-lg">
                        <div class="clearfix">
                            <h2 class="product-title entry-title">{!!$data->name!!}</h2>
                        </div>
                        @if ($data->price == 0)
                        <span class="product-price box"><strong>Giá: </strong><span class="currency-symbol"> liên hệ</span></span>
                        @else 
                            <span class="product-price box"><strong>{!!number_format($data->price) !!}</strong><span class="currency-symbol"> VND</span></span>    
                        @endif
                        
                        <p>{!!$data->r_intro!!}</p>
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
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="sidebar col-sm-4 col-md-3">
            <?php 
                $productTypes = DB::table('product_types')->get();
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
                    @foreach($productTypes as $type)
                    <li class="category">
                        <a href="{!!url('/san-pham?type='.$type->id)!!}">
                            {!!$type->name!!}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="widget box">
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
            </div>

            <div class="widget box">
                <h4>Sản phẩm tương tự</h4>
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
    </div>
</div>
@endsection