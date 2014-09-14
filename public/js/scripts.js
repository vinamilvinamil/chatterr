$(document).ready(function() {
	$('.post-controls > a > like').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('data-post-id');
		$.ajax({
			url: 'http://localhost:8000/post-control',
			type:'POST',
			dataType:'JSON',
			data:{
				"id": id,
				"_token": '{{ csrf_token() }}'
			},
			success:function(){
				$('div[data-like-id="1"]').hide();
			}
		});
	})
});
