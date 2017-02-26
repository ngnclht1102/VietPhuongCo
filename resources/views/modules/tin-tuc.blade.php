
<?php 
    $data = DB::table('news')
    ->limit(3)
    ->orderBy('created_at', 'desc')
    ->get(); 
  ?>
@foreach($data as $row)
<div class="col-lg-12 no-padding">
  <div class="col-lg-4">
    <a href="#" title=""><img src="{!!url('uploads/news/'.$row->images)!!}" alt="" width="95%" height="99%"> </a>
  </div>
  <div class="col-lg-8">
    <h4><a href="{!!url('/tin-tuc/'.$row->id.'-'.$row->slug)!!}" title="{!!$row->title!!}">{!!$row->title!!}</a></h4>
    <p> 
      {!!$row->intro!!}
    </p>
    <p><strong>Lúc :</strong>{!!$row->created_at!!} Bởi : <strong> {!!$row->author!!}</strong></p>
  </div>
</div>
@endforeach