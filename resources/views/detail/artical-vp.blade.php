@extends('templates.vietphuong.master-with-title')
@section('content')
	<div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8">
                        
                        <div class="blog-posts">
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
                                        <a href="#" class="btn btn-sm style3 post-read-more">Đọc tiếp...</a>
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
                            <form method="get" role="search">
                                <div class="search-box">
                                    <input type="text" placeholder="Search" name="s" value="">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="box">
                            <h4>Bài viết nổi bật</h4>
                            <ul class="recent-posts">
                                @foreach($data as $row)
                                <li>
                                    <div class="post-content">
                                        <a class="post-title" href="#">{!!$row->title!!}</a>
                                        <p class="post-meta">{!!$row->intro!!}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="box">
                            <h4>Chuyên mục</h4>
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="#">Giải pháp</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="#">Kiến thức chung</a></li>
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