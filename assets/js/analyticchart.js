$(document).ready(function(){
	$.ajax({
		url: "../includes/fetchanalyticsdata.php",
		methtod: "GET",
		success: function(data) {
			console.log(data);

			var color = ['#f1c40f', '#e67e22', '#16a085', '#00ffff', '#8a2be2', '#a52a2a', '#deb887', '#5f9ea0', '#d2691e', '#ff7f50', '#6495ed', '#008b8b', '#b8860b', '#bdb76b', '#556b2f', '#ff8c00', '#e9967a', '#daa520', '#cd5c5c', '#9acd32',
						 '#006400', '#008b8b', '#00bfff', '#00ced1', '#00ff00', '#1e90ff', '#20b2aa', '#228b22', '#2f4f4f', '#3cb371', '#4169e1', '#483d8b', '#4682b4', '#6495ed', '#663399', '#696969', '#778899', '#7cfc00', '#90ee90'];
			var price = [];
			var page = [];

			for (var i in data) {

				price.push(data[i].num);
				page.push(data[i].page);
			}

			var chartdata = {
				labels: page,
				datasets: [
					{
						label: 'Views',
						backgroundColor: color,
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: price
					}
				]
			};

			var ctx = $('#stockcanvas');

			var graph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});