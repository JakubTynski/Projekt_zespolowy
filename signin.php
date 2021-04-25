<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zaloguj się na konto</title>
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
			<h2>Logowanie</h2>
			<p>Zaloguj się do ChatApp</p>
		</div>
		<div class="form-group">
			<label>Adres e-mail</label>
        	<input type="text" class="form-control" placeholder="adres@domena.com" name="email" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Hasło</label>
            <input type="password" class="form-control" placeholder="Hasło" name="pass" autocomplete="off" required="required">
        </div>
        <div class="small">Zapomniałeś hasła? <a href="forgot_pass.php">Kliknij tutaj</a></div><br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Zaloguj się</button>
		</div>
		<?php include("signin_user.php"); ?>	
    </form>
	<div class="text-center" style='color:#ff0000;'>Nie masz jeszcze konta? <a href="signup.php">Załóż je!</a></div>
</div>
</body>
</html>    