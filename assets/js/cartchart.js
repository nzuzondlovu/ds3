$(document).ready(function(){
	$.ajax({
		url: "../includes/fetchcartdata.php",
		methtod: "GET",
		success: function(data) {
			console.log(data);

			var supplier = [];
			var quantity = [];
			var product = [];
			var totalprice = [];

			for (var i in data) {

				supplier.push(data[i].supplierName);
				quantity.push(data[i].quantity);
				product.push(data[i].productName);				
				totalprice.push(data[i].totalPrice);
			}

			var chartdata = {
				labels: supplier,
				datasets: [
					{
						label: 'Quantity',
						backgroundColor: 'rgba(190, 90, 110, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: quantity
					},
					{
						label: 'Product',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: product
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