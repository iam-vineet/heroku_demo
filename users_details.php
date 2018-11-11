<!--
==============================================================
	Requirement: Create a form to save user's contact details
	@author: Rahul Kumar ( Terralogic Software Solutions)
==============================================================
-->

<?php

    function trim_string($str){
		return htmlentities(trim($str));
	}
	if(isset($_POST['submit'])){
		$firstname = trim_string($_POST['firstname']);
		$lastname  = trim_string($_POST['lastname']);
		$phone	   = trim_string($_POST['phone']);
		$email     = trim_string($_POST['email']);
		$dbc = mysqli_connect('localhost',"root","","contact");
		$query = "INSERT INTO contact (firstname, lastname, phone, email)
		          VALUES ('$firstname','$lastname','$phone','$email')";
		mysqli_query($dbc,$query);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid" id="form-container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4" 
				 style="margin-top:6%;box-shadow:0 0 10px rgba(0,0,0,0.5);padding:2%;">
				<div class="alert alert-success" style="display:none;"><b>Success!</b> The details are saved.</div>
				<form method="post" action="<?php echo trim_string($_SERVER['PHP_SELF']);?>">
					<div class="form-group">
						<label for="firstname">First Name:</label>
						<input type="text" class="form-control" name="firstname">
					</div>
					<div class="form-group">
						<label for="lastname">Last Name:</label>
						<input type="text" class="form-control" name="lastname">
					</div>
					<div class="form-group">
						<label for="phone">Phone:</label>
						<input type="text" class="form-control" name="phone">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div style="text-align:center;">
						<input type="submit" name="submit" class="btn btn-primary" style="width:100%;">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
?>
<script>
	$(document).ready(function(){
		$(".alert").fadeIn();
		setTimeout(function(){ $(".alert").fadeOut();},900);
	});
</script>
<?php
	}
?>