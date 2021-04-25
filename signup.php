<!DOCTYPE html>
<html lang="en">
<head>
	<title>Załóż konto</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
<div class="signup-form">
    <form action="" method="post">
		<div class="form-header">
			<h2>Załóż konto</h2>
			<p>Wypełnij formularz i zacznij chatować!</p>
		</div>
        <div class="form-group">
			<label>Nazwa użytkownika</label>
        	<input type="text" class="form-control" placeholder="np. Imię" name="user_name" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Hasło</label>
            <input type="password" class="form-control" placeholder="Hasło" name="user_pass" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Adres e-mail</label>
        	<input type="email" class="form-control" placeholder="adres@domena.com" name="user_email" autocomplete="off" required="required">
        </div>
        <div class="form-group">
			<label>Kraj</label>
        	<select class="form-control" name="user_country" required="required">
				<option disabled="">Wybierz kraj</option>
				<option>Polska</option>
				<option>Stany Zjednoczone</option>
				<option>Niemcy</option>
				<option>Wielka Brytania</option>
				<option>Belgia</option>
				<option>Holandia</option>
				<option>Hiszpania</option>
				<option>Portugalia</option>
			</select>
        </div>
        <div class="form-group">
			<label>Płeć</label>
        	<select class="form-control" name="user_gender" required="required">
				<option disabled="disabled">Wybierz Płeć</option>
				<option>Mezczyzna</option>
				<option>Kobieta</option>
				<option>Inne</option>
			</select>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> Akceptuję <a href="#">Regulamin</a> &amp; <a href="#">Politykę prywatności</a></label>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Załóż konto</button>
		</div>
		<?php include("signup_user.php"); ?>	
    </form>
	<div class="text-center"style='color:#ff0000;'>Masz już konto? <a href="signin.php">Zaloguj się!</a></div>
</div>
</body>
</html>    