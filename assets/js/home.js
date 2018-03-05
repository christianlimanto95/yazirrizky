$(function() {
	
});

function script1onload() {
	get_all_data();
}

function get_all_data() {
	ajaxCall(get_all_data_url, null, function(json) {
		var result = jQuery.parseJSON(json);
		$("#example").DataTable({
			data: result
		});
	});
}