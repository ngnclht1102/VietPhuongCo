
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
<header id="header" class="header-color-white">
            <div class="container">
                <div class="header-inner">
                    <div class="branding">
                        <h1 class="logo">
                            <a href="/"><img src="images/logo@2x.png" alt="" width="25" height="26"><span style="margin-left: 27px; margin-top: 2px;">Việt Phương</span></a>
                        </h1>
                    </div>
                    <nav id="nav">
                        <ul class="header-top-nav">
                            <li class="mini-search">
                                <a href="#"><i class="fa fa-search has-circle"></i></a>
                                <div class="main-nav-search-form">
                                    <form method="get" role="search" action="{!!url('/tim-kiem')!!}">
                                        <div class="search-box">
                                            <input type="text" id="s" name="keyword" value="">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="visible-mobile">
                                <a href="#mobile-nav-wrapper" data-toggle="collapse"><i class="fa fa-bars has-circle"></i></a>
                            </li>
                        </ul>
                        <ul id="main-nav" class="hidden-mobile">
                            <li id="main-nav-trangchu" class="menu-item {{(Request::path() == '/' || Request::path() == 'trang-chu') ? 'active' : '' }}">
                                <a href="{{url('/trang-chu')}}">Trang chủ</a>
                            </li>
                            <li id="main-nav-sanpham" class="menu-item-has-children {{(Request::path() == 'san-pham') ? 'active' : '' }}">
                                <a href="{{url('/san-pham')}}">Sản phẩm</a>
                                
                                <ul class="sub-nav">
                                    @foreach($newPT as $type)
                                    <li class="menu-item-has-children">
                                        <a href="{!!url('/san-pham?type='.$type['id'])!!}">{!!$type['name']!!}</a>
                                        @if(count($type['parents']) > 0) 
                                        <ul class="sub-nav">
                                            @foreach($type['parents'] as $miniType)
                                            <li><a href="{!!url('/san-pham?type='.$miniType->id)!!}">{!! $miniType->name !!}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                 </ul>   
                            </li>
                            <li id="main-nav-giaiphap" class="menu-item {{(Request::path() == 'giai-phap') ? 'active' : '' }}">
                                <a href="{{url('/giai-phap')}}">Giải pháp</a>
                            </li>
                            <li id="main-nav-kienthuc" class="menu-item {{(Request::path() == 'kien-thuc') ? 'active' : '' }}">
                                <a href="{{url('/kien-thuc')}}">Kiến thức</a>
                            </li>
                            <li id="main-nav-lienhe" class="menu-item {{(Request::path() == 'lien-he') ? 'active' : '' }}">
                                <a href="{{url('/lien-he')}}">Liên hệ</a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="mobile-nav-wrapper collapse visible-mobile" id="mobile-nav-wrapper">
                <ul class="mobile-nav">
                    <li class="menu-item">
                        <a href="{{url('/trang-chu')}}">Trang chủ</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/san-pham')}}">Sản phẩm</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/giai-phap')}}">Giải pháp</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/kien-thuc')}}">Kiến thức</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/lien-he')}}">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </header>