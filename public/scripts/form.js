$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					go(json.url);
				} else {
					showModal(json.message);
					//alert(json.status + ' - ' + json.message);
				}
			},
		});
	});



function go( url ) {
	window.location.href='/' + url;
}




function showModal(message) {

$.magnificPopup.open({
items: {
      src: '<div class="white-popup">'+ message +'</div>',
      type: 'inline'
  },
  closeBtnInside: true
});

}
});