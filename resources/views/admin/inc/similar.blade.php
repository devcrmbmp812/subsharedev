<h2>Similar Songs</h2>
<?php
$undecided = DB::table('uploads')->select('*','uploads.id as upload_id')->leftjoin('likes','uploads.id','likes.track_id')->where('likes.slun','unidecided')->orderBy('uploads.id','desc')->get();

?>


<section class="adv-carosal" style="z-index: 0;">
	<div class="owl-carousel owl-theme">
		@for($i=0;$i<count($undecided);$i+=2)
			<div class="item" >
				<span >
					<img onclick="play_all_tracks_func({{$undecided[$i]->upload_id}},'{{$undecided[$i]->file_name}}','{{ url('server/php/files/'.$undecided[$i]->file_name.'')}}')" style="width: 95px !important; height: 95px !important;" title="{{$undecided[$i]->track_title}}"  src="{{ \Helpers::audioCoverURL( $undecided[$i]->cover_img ) }}">
					
					@if($i+1 < count($undecided))
						<img onclick="play_all_tracks_func({{$undecided[$i+1]->upload_id}},'{{$undecided[$i+1]->file_name}}','{{ url('server/php/files/'.$undecided[$i+1]->file_name.'')}}')" title="{{$undecided[$i+1]->track_title}}" style="width: 95px !important; height: 95px !important;"  src="{{ \Helpers::audioCoverURL( $undecided[$i+1]->cover_img ) }}">
					@endif
				
				</span>
			</div>
		@endfor
	</div>
</section>
<script>
   
        $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay:true,
            margin: 10,
            responsiveClass: true,

            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    loop: true,
                    autoplay:true,
                },
                600: {
                    items: 1,
                    nav: true,
                    autoplay:true,
                    loop: true,
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true,
                    autoplay:true,
                    margin: 0,
                }
            }

        });

</script>