$(function() {
	$(".select-id").on("onchanged", function() {
		var id = $(this).attr("data-value");
		ajaxCall(get_data_url, {id: id}, function(json) {
			var result = jQuery.parseJSON(json);
			var data = result.data[0];
			$(".input-name").val(data.data_name);
			changeRadiobuttonValue(data.data_gender);
			$(".input-email").val(data.data_email);
			changeSelectValue($(".select-room"), data.room_id);

			$(".input-date-start").val(data.data_date_start);
			$(".input-date-end").val(data.data_date_end);
			$(".input-number").val(data.data_number);
		});
	});

	$(".button-delete").on("click", function() {
		showDialog(".dialog-delete");
	});

	$(".dialog-button-delete").on("click", function() {
		$("form").submit();
	});
});