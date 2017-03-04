
<?php 
    $raw = DB::table('news')
    ->pluck('tag'); 

    $tags = array();
    foreach($data as $tag) {
      $singleArrTag = explode(',', $tag->tag);
      foreach($singleArrTag as $tag) {
          if(!in_array($tag, $tags)) $tags[] = $tag;
      }
    }
    ?>

<div class="tags">
    @foreach($tags as $tag)
    <a class="tag" href="#">{!!$tag!!}</a>
    @endforeach
</div>
