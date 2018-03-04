$(function() {
	$(".form-radiobutton").on("click", function() {
		var parent = $(this).parent();
		if ($(this).data("value") != parent.find(".form-radiobutton.selected").data("value")) {
			parent.find(".form-radiobutton").removeClass("selected");
			$(this).addClass("selected");
			var value = $(this).data("value");
			var valueElement = $(this).data("value-element");
			$(valueElement).val(value);
		}
	});

	$(".select").on("click", function(e) {
		if ($(this).hasClass("show")) {
			$(this).removeClass("show");
		} else {
			$(this).addClass("show");
		}

		e.stopPropagation();
	});

	$(".option").on("click", function() {
		var value = $(this).data("value");
		var text = $(this).html();

		var select = $(this).closest(".select");
		select.find(".select-text").html(text);
		select.attr("data-value", value);

		var valueElement = select.data("value-element");
		$(valueElement).val(value);
	});

	$(".input-date-start")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		maxDate: $(".input-date-end")[0]
	});

	$(".input-date-end")[0].DatePickerX.init({
		format: "dd-mm-yyyy",
		minDate: $(".input-date-start")[0]
	});

	$(".button-insert").on("click", function() {
		$("form").submit();
	});

	$(document).on("click", function(e) {
		$(".select").removeClass("show");
	});
});