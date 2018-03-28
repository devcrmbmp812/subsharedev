<?php if($add_to_list): ?>
	
	@foreach($add_to_list as $list)
	
	   <li class='slice'><a href='#' onclick="add_to_playlist('{{$list->id}}','{{$track_id}}')">{{$list->name}}</a></li>
	   
	@endforeach

<?php endif;?>
<script>
 function add_to_playlist(list_id,track_id){

              $('.add_to_list').hide();
                $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			dataType: 'html',
			 type:'POST',
			url: '{{ url("/admin/add_to_list")}}',
			async:false,
			data: {'list_id':list_id,'track_id':track_id}
		}).done(function(data){
		if(data == 'no'){
		$('#track_success').hide();
		$('#track_error').show();
		  $("#track_error").fadeIn(1000).delay(3000).fadeOut(2000);
		}else{
		$('#track_error').hide();
		$('#track_success').show();
		$("#track_success").fadeIn(1000).delay(3000).fadeOut(2000);
		  $("#playlist-div").html(data);
		  }
		  
		});
}
</script>