<?php
	include "logic.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>COVID-19 Tracker</title>
		<link rel="stylesheet" type="text/css" href="style.css">

		<!--Bootstrap Css-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<!--Bootstrap Javascript-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
		<!--Google Font-->
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

		<!--Font Awesome-->
		<script src="https://kit.fontawesome.com/68b0726c11.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container-fluid bg-light p-5 text-center my-3">
			<h1>COVID-19 TRACKER</h1>
			<h5 class="text-muted">A Project to keep track of all the COVID-19 cases around the world.</h5>
		</div>
		<div class="container col-12 col-sm-12 pb-3">
 			 <div class="row text-center">
    			<div class="col-4 text-warning">
      				<h5>Confirmed</h5>
      				<?php
      					echo $total_confirmed;
      				?>
    			</div>
    			<div class="col-4 text-success">
      				<h5>Recovered</h5>
      				<?php
      					echo $total_recovered;
      				?>
    			</div>
    			<div class="col-4 text-danger">
      				<h5>Deaths</h5>
      				<?php
      					echo $total_deaths;
      				?>
      			</div>
  			</div>
  		</div>
  		<div class="container-fluid col-12 col-sm-12 pb-3">
  			<input type="search" id="myInput" placeholder="Search" onkeyup="searchCountry()">
  		</div>
		<div class="container-fluid">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Countries</th>
						<th scope="col">Confirmed</th>
						<th scope="col">Recovered</th>
						<th scope="col">Death</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data as $key => $value) {
							$increased = $value[$days_count]['confirmed'] - $value[$days_count_prev]['confirmed'];
					?>
					<tr>
						<th>
							<?php echo $key; ?>
						</th>
						<td>
							<?php echo $value[$days_count]['confirmed']; ?>
							<?php if($increased > 0) { ?>
								<small class="text-danger pl-3">
									<i class="fas fa-arrow-up"></i><?php echo $increased; ?>
								</small>
							<?php } ?>
						</td>
						<td>
							<?php echo $value[$days_count]['recovered']; ?>
						</td>
						<td>
							<?php echo $value[$days_count]['deaths']; ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<script>
			function searchCountry()
			{
				let filter = document.getElementById('myInput').value.toUpperCase();
				let table = document.querySelector('tbody');
				let tr = table.getElementsByTagName('tr');
				for(var i=0; i<tr.length; i++)
				{
					let country = tr[i].getElementsByTagName('th')[0];
					if(country)
					{
						let textValue = country.textContent || country.innerHTML;
						if(textValue.toUpperCase().indexOf(filter) > -1)
						{
							tr[i].style.display = "";
						}
						else
						{
							tr[i].style.display = "none";
						}
					}
				}
			}
		</script>
		
		<footer class="footer mt-auto py-3 bg-light">
  			<div class="container text-center">
    			<span class="text-muted">Copyright &copy;2020, Created by Souvik Pal</span>
  			</div>
		</footer>
	</body>
</html>