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

			$(".form-inner").removeClass("disabled");
		});
	});

	$(".button-update").on("click", function() {
		$("form").submit();
	});
});

function script1onload() {
	$(".input-date-start")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		maxDate: $(".input-date-end")[0]
	});

	$(".input-date-end")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		minDate: $(".input-date-start")[0]
	});
}