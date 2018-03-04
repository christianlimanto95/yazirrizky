$(function() {
    $(document).on("keydown", "input[data-input-type='number']", function(e) {
        isNumber(e);
    });

    $(document).on("input", "input[data-thousand-separator='true']", function() {
        this.value = addCommas(this.value);
    });

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
        var selectText = select.find(".select-text");
        if (text != selectText.html()) {
            select.find(".select-text").html(text);
            select.attr("data-value", value);

            var valueElement = select.data("value-element");
            $(valueElement).val(value);
            select.trigger("onchanged");
        }
    });
    
    $(document).on("click", function(e) {
		$(".select").removeClass("show");
	});
});

function changeRadiobuttonValue(value) {
	$(".form-radiobutton").removeClass("selected");
	var selected = $(".form-radiobutton[data-value='" + value + "']");
	selected.addClass("selected");

	var value = selected.data("value");
	var valueElement = selected.data("value-element");
	$(valueElement).val(value);
}

function changeSelectValue(select, value) {
	var selectTextValue = select.find(".option[data-value='" + value + "']").html();
	select.find(".select-text").html(selectTextValue);
	var valueElement = select.data("value-element");
	$(valueElement).val(value);
	select.trigger("onchanged");
}

function isNumber(e) {
	if (e.key.length == 1) {
		if ("0123456789".indexOf(e.key) < 0) {
			e.preventDefault();
		}
	}
}

function addCommas(nStr) {
    nStr = nStr.replace(/,/g, "");
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function ajaxCall(url, data, callback) {
	return $.ajax({
		url: url,
		data: data,
		type: 'POST',
		error: function(jqXHR, exception) {
			if (exception != "abort") {
				console.log(jqXHR + " : " + jqXHR.responseText);
			}
		},
		success: function(result) {
			callback(result);
		}
	});
}