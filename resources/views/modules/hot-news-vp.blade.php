
<?php 
    $new =  DB::table('news')
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