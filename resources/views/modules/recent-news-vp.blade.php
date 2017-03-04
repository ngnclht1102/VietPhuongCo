
<?php 
    $data = DB::table('news')
    ->limit(3)
    ->orderBy('created_at', 'desc')
    ->get(); 
    ?>

<h5 class="section-title box">Bài viết gần đây</h5>
<ul class="recent-posts">
    @foreach($data as $row)
    <li>
        <div class="post-content">
            <a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}" class="post-title">{!!$row->title!!}</a>
            <p class="post-meta">Đăng bởi <a href="#">{!!$row->author!!}</a>. Ngày: {!!$row->created_at!!}</p>
        </div>
    </li>
    @endforeach
</ul>
