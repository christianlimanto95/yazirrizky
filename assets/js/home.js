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

function get_selected_room_count() {
	ajaxCall(get_selected_room_count_url, null, function(json) {
		var result = jQuery.parseJSON(json);
		console.log(result.data);

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

function script2onload() {
	get_selected_room_count();
}