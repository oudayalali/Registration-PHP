<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="Style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



<title>Registration Form</title>

<body style="color:white;">
    <div class="container">
		<div class="row">
			<div class="panel panel-primary">
					<form method="POST" action="registration.php" role="form">
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Your name</label>
							<input name="fname" type="text" maxlength="50" id="fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input name="signupEmail" type="email" maxlength="50" id="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input name="signupPassword" type="password" maxlength="25" id="password" class="form-control" placeholder="at least 6 characters" length="40" required>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Password again</label>
							<input name="signupPasswordagain" type="password" maxlength="25" id="cpassword" class="form-control" placeholder="at least 6 characters" length="40" required>
							<span id='message'></span>
						</div>
						<div class="form-group">
							<button name="signupSubmit" type="submit" id="submit" class="btn btn-primary btn-block" >Create your account</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p></p>Already have an account? <a href="../login/login.php">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
  


</body>
<script type="text/javascript">
	$('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
    
});
	

</script>

<script type="text/javascript">
	
		$(function(){

		$('#submit').click(function(e){
			if ($('#password').val() == $('#cpassword').val()) {

			var valid = this.form.checkValidity();

			if (valid){

					var fname   	=$('#fname').val();
			        var email   	=$('#email').val();
			        var cpassword   =$('#cpassword').val();

					e.preventDefault();
							$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {	fname: fname, email: email, cpassword: cpassword},

					success: function(data){

							Swal.fire({

											title : 'Successfully.',
											text  : data,
											customClass: 'swal-wide',
		    								icon: 'success',
            								confirmButtonText: 'Done'

		                            })


					                      },

					error:  function(data){

							Swal.fire({

										title : 'Error',
										text  : 'Unsuccessfully.',
										customClass: 'swal-wide',
									    icon: 'error',
							            confirmButtonText: 'Done'

		                                   })
						}

				});

				
			}else{
				
			}
		}else {
            e.preventDefault();
			alert('Repeat The Password.');
	}

		});

	

});


</script>

</html