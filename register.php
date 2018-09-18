<?php
include_once('functions.php');

if($_POST){
	$errors=validate($_POST);
	
	
	
	if($errors==[]){
		$user=createUser($_POST);
		$avatarErrors=uploadAvatar($user);
		$totalErrors=array_merge($errors, $avatarErrors);
		
		if($totalErrors== [])
			{
				saveUser($user);
				header('location: login.php');
			}
		
		
	}

}


?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/master.css">
		<title>Admin</title>
	</head>
	<body>
		<div class="row d-flex  mx-auto">
			<a class="boton_inicio"  href="index.php">Ir al inicio</a>
		</div>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div id="registerTitle"class="panel-title text-center">
	               		<h1 class="title col-12 ">Punto Vet</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name" value="<?= !isset($errors['name'])? keepValue('name') : "" ?>" placeholder="Enter your Name"/>
									<?php  if(isset($errors['name'])) {?>
										<span class="alert alert-danger"><?php echo $errors['name'] ?> </span>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Title</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<select name="title">
										<option value="Sr">Sr.</option>
										<option value="Sra">Sra.</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="flase"></i></span>
									<input type="text" class="form-control" name="email" id="email"  value="<?= !isset($errors['email'])? keepValue('email') : "" ?>" placeholder="Enter your Email"/>
									<?php  if(isset($errors['email'])) {?>
										<span class="alert alert-danger"><?php echo $errors['email'] ?> </span>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  value="<?= !isset($errors['username'])? keepValue('username') : "" ?>" placeholder="Enter your Username"/>
									<?php  if(isset($errors['username'])) {?>
										<span class="alert alert-danger"><?php echo $errors['username'] ?> </span>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
									<?php  if(isset($errors['password'])) {?>
										<span class="alert alert-danger"><?php echo $errors['password'] ?> </span>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="cpassword" id="cpassword"  placeholder="Confirm your Password"/>
									<?php  if(isset($errors['cpassword'])) {?>
										<span class="alert alert-danger"><?php echo $errors['cpassword'] ?> </span>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Upload Avatar</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="file" class="form-control" name="avatar" />
									<br>
								</div>
								<?php  if(isset($avatarErrors['avatar'])) {?>
										<span style="margin-top: 40px" class="alert alert-danger"><?php echo $avatarErrors['avatar'] ?> </span>
									<?php } ?>
							</div>
						</div>
						<div class="form-group ">
							<button type="submit" class="btn btn-success btn-lg btn-block login-button">Register</button>
						</div>
						<div class="login-register">
				            <a class="btn btn-dark" href="index.php">Login</a>
                        </div>
                        <div class="login-register">
				            <a class="btn btn-secondary" href="register.php">Cancel</a>
				        </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>