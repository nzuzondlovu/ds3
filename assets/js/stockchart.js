$(document).ready(function(){
	$.ajax({
		url: "../includes/fetchstockdata.php",
		methtod: "GET",
		success: function(data) {
			console.log(data);

			var price = [];
			var product = [];

			for (var i in data) {

				price.push(data[i].price);
				product.push(data[i].name);
			}

			var chartdata = {
				labels: product,
				datasets: [
					{
						label: 'Price',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
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
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});