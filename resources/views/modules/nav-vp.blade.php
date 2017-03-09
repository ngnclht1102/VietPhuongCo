
<header id="header" class="header-color-white">
            <div class="container">
                <div class="header-inner">
                    <div class="branding">
                        <h1 class="logo">
                            <a href="index.html"><img src="images/logo@2x.png" alt="" width="25" height="26">Việt Phương</a>
                        </h1>
                    </div>
                    <nav id="nav">
                        <ul class="header-top-nav">
                            <li class="mini-cart menu-item">
                                <a href="#"><i class="fa fa-shopping-cart has-circle"></i></a>
                            </li>
                            <li class="mini-search">
                                <a href="#"><i class="fa fa-search has-circle"></i></a>
                                <div class="main-nav-search-form">
                                    <form method="get" role="search">
                                        <div class="search-box">
                                            <input type="text" id="s" name="s" value="">
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
                            <li class="menu-item {{(Request::path() == '/' || Request::path() == 'trang-chu') ? 'active' : '' }}">
                                <a href="{{url('/trang-chu')}}">Trang chủ</a>
                                
                            </li>
                            <li class="menu-item {{(Request::path() == 'giai-phap') ? 'active' : '' }}">
                                <a href="{{url('/giai-phap')}}">Giải pháp</a>
                            </li>
                            <li class="menu-item {{(Request::path() == 'kien-thuc') ? 'active' : '' }}">
                                <a href="{{url('/kien-thuc')}}">Kiến thức</a>
                            </li>
                            <li class="menu-item {{(Request::path() == 'san-pham') ? 'active' : '' }}">
                                <a href="{{url('/san-pham')}}">Sản phẩm</a>
                            </li>
                            <li class="menu-item {{(Request::path() == 'lien-he') ? 'active' : '' }}">
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
                        <a href="{{url('/giai-phap')}}">Giải pháp</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/kien-thuc')}}">Kiến thức</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/san-pham')}}">Sản phẩm</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{url('/lien-he')}}">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </header>