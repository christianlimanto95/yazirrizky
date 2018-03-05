$(function() {
	$(".button-print").on("click", function() {
		window.print();
	});

	$(document).on("click", ".button-email", function() {
		var thisElement = $(this);
		if (!thisElement.hasClass("disabled")) {
			thisElement.addClass("disabled");
			var tr = thisElement.closest("tr");
			var email = tr.find("td")[3].innerHTML;
			ajaxCall(send_email_url, {email: email}, function(json) {
				thisElement.removeClass("disabled");
			});
		}
	});
});

function script1onload() {
	get_all_data();
}

function get_all_data() {
	ajaxCall(get_all_data_url, null, function(json) {
		var result = jQuery.parseJSON(json);
		$("#example").DataTable({
			data: result,
			columnDefs: [{
				orderable: false,
				targets: -1,
				data: null,
				defaultContent: "<div class='button button-email'>Email</div>"
			}]
		});
	});
}

function get_selected_room_count() {
	ajaxCall(get_selected_room_count_url, null, function(json) {
		var result = jQuery.parseJSON(json);

		Highcharts.chart('piechart', {
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: result.title
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
							color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					},
					showInLegend: true
				}
			},
			series: [{
				name: result.name,
				colorByPoint: true,
				data: result.data
			}]
		});
	});
}

function get_gender_count() {
	ajaxCall(get_gender_count_url, null, function(json) {
		var result = jQuery.parseJSON(json);

		Highcharts.chart('columnchart', {
			chart: {
				type: 'column'
			},
			title: {
				text: result.title
			},
			xAxis: {
				categories: [
					'Gender'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Count'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y}</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: result.data
		});
	});	
}

function script2onload() {
	get_selected_room_count();
	get_gender_count();
}