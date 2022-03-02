<?php 
	session_start();
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daylies Login</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		
		<div class="user_card">
			<div class="d-flex justify-content-center" >
			<img src="images/dayliesLogo.png" class="brand_logo">
			</div>
			<div class="d-flex justify-content-center form_container">
				<form>
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user fa-2x"></i></span>		
						</div> 
    					<input type="email" class="form-control" id="email_address" placeholder="name@example.com" required="">
					</div>
					<div class="input-group mb-2">
					 <div class="input-group-append">
					 		<span class="input-group-text"><i class="fas fa-key fa-2x"></i></span>		
					 </div>
						<input type="password" name="password" id="password" class="form-control input_pass" required="">
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
							<label class="custom-control-label" for="customControlInline">Remember me</label>
						</div>
					</div>	
			</div>
			<div class="d-flex justify-content-center mt-3 login_container">
				<button type="button" name="button" id="login" class="btn login_btn"><b>LOGIN</b></button> 
			</div>
			</form>

			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					Don't have an account? &nbsp; <a href="registration.php" class="ml-2">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</script>
<script>
	$(document).ready(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var email_address = $('#email_address').val();
				var password = $('#password').val();
			}
			console.log("check1");
			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {email_address: email_address, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "1"){
						setTimeout(' window.location.href =  "index.php"', 2000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script>
</body>
</html>