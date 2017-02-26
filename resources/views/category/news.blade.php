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
                                    
                                    <p>{!!$row->intro!!}</p>
                                    <div class="post-action">
                                        <a href="#" class="btn btn-sm style3 post-read-more">Đọc tiếp...</a>
                                    </div>
                                </div>
                            </article>
                            @endforeach                  
  
                            
                            <div class="post-pagination">
                                <a href="#" class="nav-prev disabled" onclick="return false;"></a>
                                <div class="page-links">
                                    <span class="active">1</span>
                                    <a href="#" data-page-num="2">2</a>
                                    <a href="#" data-page-num="3">3</a>
                                </div>
                                <a href="#" class="nav-next" data-page-num="2"></a>
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
                            <h4>Archives</h4>
                            <div class="row">
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="#">December 2014</a></li>
                                        <li><a href="#">November 2014</a></li>
                                        <li><a href="#">October 2014</a></li>
                                        <li><a href="#">September 2014</a></li>
                                        <li><a href="#">August 2014</a></li>
                                        <li><a href="#">July 2014</a></li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-12 col-md-6">
                                    <ul class="arrow-circle hover-effect archives">
                                        <li><a href="#">June 2014</a></li>
                                        <li><a href="#">May 2014</a></li>
                                        <li><a href="#">April 2014</a></li>
                                        <li><a href="#">March 2014</a></li>
                                        <li><a href="#">February 2014</a></li>
                                        <li><a href="#">January 2014</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h4>Twitter Feeds</h4>
                            <div class="twitter-holder">
                                <ul>
                                    <li class="tweet">
                                        <p class="tweet-text">
                                            <a href="#">Miracle,</a> Etiam non mollis minaer roin or eme.
                                        </p>
                                        <a class="tweet-date" href="#">12 Nov, 2014</a>
                                    </li>
                                    <li class="tweet">
                                        <p class="tweet-text">
                                            <a href="#">Miracle,</a> Etiam non mollis minaer roin or eme.
                                        </p>
                                        <a class="tweet-date" href="#">12 Nov, 2014</a>
                                    </li>
                                    <li class="tweet">
                                        <p class="tweet-text">
                                            <a href="#">Miracle,</a> Etiam non mollis minaer roin or eme.
                                        </p>
                                        <a class="tweet-date" href="#">12 Nov, 2014</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box">
                            <h4>Popular Tags</h4>
                            <div class="tags">
                                <a class="tag" href="#">masonry</a>
                                <a class="tag" href="#">responsive</a>
                                <a class="tag" href="#">Ecommerce</a>
                                <a class="tag" href="#">retina</a>
                                <a class="tag" href="#">multi-purpose</a>
                                <a class="tag" href="#">blog posts</a>
                                <a class="tag" href="#">web design</a>
                                <a class="tag" href="#">wordpres</a>
                                <a class="tag" href="#">mobile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection