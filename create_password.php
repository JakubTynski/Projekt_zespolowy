<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nadaj nowe hasło</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
<div class="signin-form">
    <form action="" method="post">
		<div class="form-header">
			<h2>Nadaj nowe hasło</h2>
			<p>ChatApp</p>
		</div>
		<div class="form-group">
			<label>Podaj nowe hasło</label>
        	<input type="password" class="form-control" placeholder="Nowe hasło" name="pass1" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Potwierdź nowe hasło</label>
            <input type="password" class="form-control" placeholder="Potwierdź nowe hasło" name="pass2" autocomplete="off" required="required">
        </div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Zapisz</button>
		</div>
    </form>
</div>
</body>
</html>
<?php 
session_start();

include("include/connection.php"); 



	if(isset($_POST['change'])){
		
		$user = $_SESSION['user_email'];
	    $pass1 = $_POST['pass1'];
	    $pass2 = $_POST['pass2'];

	    if($pass1 != $pass2){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Wpisane hasła różnią się od siebie!</strong> 
	          </div>
	        ";
	    }
	    if($pass1 < 9 AND $pass2 < 9){
	        echo"
	          <div class='alert alert-danger'>
	            <strong>Użyj minimum 8 znaków!</strong> 
	          </div>
	        ";
	    }
	    if($pass1 == $pass2){
            $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
            session_destroy();
            echo"
            	<script>alert('Przejdź do logowania')</script>
            	<script>window.open('signin.php','_self')</script>
            ";
        }
	
	}


?>