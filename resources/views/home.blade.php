@extends('templates.vietphuong.master-with-title')
@section('content')
    <div class="section container">
        <div class="heading-box">
            <h2 class="box-title">Giải pháp thông minh từ chúng tôi</h2>
            <p class="desc-lg">Chúng tôi giải quyết khó khăn cho bạn</p>
        </div>
        <div class="iso-container iso-col-3 style-masonry has-column-width blog-posts">
            @foreach($news as $row)
            <div class="iso-item">
                <article class="post post-masonry">
                    <div class="post-image">
                        <div class="image">
                            <img alt="" src="{!!url('/uploads/news/'.$row->images)!!}">
                            <div class="image-extras">
                                <a class="post-gallery" href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="entry-author fn">Đăng bởi <a href="#">Admin</a></span>
                            <span class="entry-time"><span class="updated no-display">2014-09-09T15:57:08+00:00</span><span class="published">12 Nov, 2014</span></span>
                            <span class="post-category">in <a href="#">Giải pháp</a></span>
                        </div>
                        <h3 class="entry-title"><a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">{!!$row->title!!}</a></h3>
                        <p>{!!$row->intro!!}</p>
                    </div>
                    <div class="post-action">
                        <a class="btn btn-sm style3 post-read-more" href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">Đọc tiếp...</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
@endsection
