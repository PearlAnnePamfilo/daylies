<?php
require_once('include/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>daylies. Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
		if(isset($_POST['submit_button'])){
					$first_name 	= $_POST['first_name'];
					$last_name 		= $_POST['last_name'];
					$email_address 	= $_POST['email_address'];
					$password 		= sha1($_POST['password']);


					$sql = "INSERT INTO dayliesdb.users (first_name, last_name, email_address, password) VALUES(?,?,?,?)";
					$stmtinsert = $database->prepare($sql);
					$result = $stmtinsert->execute([$first_name, $last_name, $email_address, $password]);
					if($result){
						echo '<script>alert("User account has been created! You may now login.")</script>';
					}else{
						echo '<script>alert("User registration error.")</script>';
					}
		}else{
		}
	?>
</div>
	<div>
		<form action="registration.php" method="post">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<h1>Registration</h1>
						<p>Fill up the form with correct values</p>

						<hr class="mb-3">

						<label for="first_name"><b>First Name</b></label>
						<input class="form-control" type="text" name="first_name" id="first_name" required="">

						<label for="last_name"><b>Last Name</b></label>
						<input class="form-control" type="text" name="last_name" id="last_name" required="">

						<label for="email_address"><b>Email Address</b></label>
						<input class="form-control" type="email" name="email_address" id="email_address" required="">

						<label for="password"><b>Password</b></label>
						<input class="form-control" type="password" name="password" id="password" required="">

						<hr class="mb-3">

						<input class="btn btn-primary" type="submit" name="submit_button" id="register" value="Sign Up"></input>
					</div>
				</div>
			</div>
		</form>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#register').click(function(e){			
				if(valid){

					var valid = this.form.checkValidity();
					var first_name = $('#first_name').val();
					var last_name = $('#last_name').val();
					var email_address = $('#email_address').val();
					var password = $('#password').val();
					e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'process.php',
							data: {first_name: first_name, last_name: last_name, email_address: email_address, password: password},
						)};
					}
		});
});
</script>  
</body>
</html>