$(document).ready(function(){
	$.ajax({
		url: "../includes/fetchcartdata.php",
		methtod: "GET",
		success: function(data) {
			console.log(data);
			Chart.defaults.scale.ticks.beginAtZero = true;

			var quantity = [];
			var product = [];
			var total = [];

			for (var i in data) {

				quantity.push(data[i].quantity);
				product.push(data[i].productName);
				total.push(data[i].totalPrice);
			}

			var chartdata = {
				labels: product,
				datasets: [
				{
					label: 'Quantity',
					backgroundColor: ['#f1c40f', '#e67e22', '#16a085'],
					hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
					hoverBorderColor: 'rgba(200, 200, 200, 1)',
					data: quantity
				},
				{
					label: 'Total Price',
					backgroundColor: ['#f1c40f', '#e67e22', '#16a085'],
					hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
					hoverBorderColor: 'rgba(200, 200, 200, 1)',
					data: total
				}
				]
			};

			var ctx = $('#stockcanvas');

			var graph = new Chart(ctx, {
				type: 'pie',
				data: chartdata,
				options: {
					animation: {
						animateScale: true
					}
				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});