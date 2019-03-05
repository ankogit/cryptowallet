$(function() {

$('.send').click(function() {
	var name = $('.name').val();
	var phone = $('.phone').val();
	var order = $('.order').val();
	var json;
	$.ajax({
		url:'/sendmsg',
		type: 'post',
		data: {name: name, phone : phone, order : order},
		success: function(result) {
				json =jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = json.url;
				} else {
					alert(json.status + ' - ' + json.message);
				}
			},

	});

});





});