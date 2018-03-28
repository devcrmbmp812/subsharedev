<?php if($top_two): ?>
@foreach($top_two as $top_two)
 <li onclick="play_all_tracks_func(<?=$top_two->id?>, '<?=$top_two->file_name?>',' <?=url('server/php/files/'. $top_two->file_name)?>')">
 <img style="width: 75px; height: 75px;" src="{{ \Helpers::audioCoverURL( $top_two->cover_img ) }}"><span><?=$top_two->track_title?></span>
</li>
 @endforeach
<?php endif;?>

