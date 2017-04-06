@extends('templates.vietphuong.master-with-title')
@section('title')
:: {!!$data->title!!}
@endsection
@section('content')
<?php 
$items = DB::table('news')
    ->orderBy('created_at', 'desc')
    ->paginate(5); 
?>
<div class="container">
    <div class="row">
        <div id="main" class="col-md-8">
            <article class="post box-lg">
                
                <div class="post-image">
                    <h2 class="entry-title"><a href="#">{!!$data->title!!}</a></h2>

                    <p class="text-left">
                        <strong> Tác giả : <a target="#" href="#">{!!$data->author!!} </a> </strong>
                        <br>
                        <span style="font-size:10px;color:#bdc3c7;">Đăng ngày: {!!$data->updated_at!!} </span>
                    </p>
                    <div>{!!$data->intro!!}</div>
                    
                </div>
                <div class="post-content">
                    {!!$data->full!!}
                </div>
                <h3 class="font-normal">Bài viết tương tự</h3>
                <div class="related-posts clearfix box-sm same-height">
                    @foreach($items as $row)
                    <div class="related-post col-md-6 col-hidden-sm">
                        <article class="post">
                            <div class="post-image">    
                                <img src="{!!url('/uploads/news/'.$row->images)!!}" alt="{!!$row->title!!}" width="90%" height="99%">
                            </div>
                            <div class="details">
                                <h5 class="post-title"><a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}">{!!$row->title!!}</a></h5>
                                <div class="post-meta">
                                    <span>Đăng bởi <a href="#"><strong>{!!$row->author!!} </strong></a></span>
                                    <span> ngày {!!$row->created_at!!}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach 
                </div>
            </article>
        </div>
        <div class="sidebar col-md-4">                        
            <div class="box">
                <h4>Bài viết tương tự</h4>
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
            <div class="box">
                <h4>Chuyên mục</h4>
                <div class="row">
                    <div class="col-xs-6 col-sm-12 col-md-6">
                        <ul class="arrow-circle hover-effect archives">
                            <li><a href="{!!url('/giai-phap')!!}">Giải pháp</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6">
                        <ul class="arrow-circle hover-effect archives">
                            <li><a href="{!!url('/kien-thuc')!!}">Kiến thức chung</a></li>
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