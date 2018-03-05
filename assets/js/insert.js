$(function() {
	$(".button-insert").on("click", function() {
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