$(function() {
	$(".select-id").on("onchanged", function() {
		var id = $(this).data("value");
		ajaxCall(get_data_url, {id: id}, function(json) {
			var result = jQuery.parseJSON(json);
			var data = result.data[0];
			$(".input-name").val(data.data_name);
			$(".input-email").val(data.data_email);
			$(".form-inner").removeClass("disabled");
		});
	});

	$(".input-date-start")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		maxDate: $(".input-date-end")[0]
	});

	$(".input-date-end")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		minDate: $(".input-date-start")[0]
	});

	$(".button-update").on("click", function() {
		$("form").submit();
	});
});