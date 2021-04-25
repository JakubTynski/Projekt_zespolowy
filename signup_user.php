<?php
include("include/connection.php");


	if(isset($_POST['sign_up'])){

	$name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
	$pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
	$email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
	$country = htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
	$gender = htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
	$rand = rand(1, 2); //Random number between 1 and 2

	if($name == ''){
		echo "<script>alert('Nie można zweryfikować imienia')</script>";
	}

	if(strlen($pass)<8){

	echo "<script>alert('Hasło musi mieć minimum 8 znaków!')</script>";
	exit();
	}

	$check_email = "select * from users where user_email='$email'";
	$run_email = mysqli_query($con,$check_email);

	$check = mysqli_num_rows($run_email);

	if($check==1){

	echo "<script>alert('Email w użyciu, proszę użyć innego adresu!')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
	exit();
	}
	if($rand == 1)
			$profile_pic = "images/codingcafe1.png";
	else if($rand == 2)
			$profile_pic = "images/codingcafe2.jpg";

	$insert = "insert into users (user_name,user_pass,user_email,user_profile,user_country,user_gender) values ('$name','$pass','$email','$profile_pic','$country','$gender')";

	$query = mysqli_query($con,$insert);

	if($query){

	echo "<script>alert('Gratulacje $name, Twoje konto zostało założone.')</script>";
	echo "<script>window.open('signin.php','_self')</script>";

	}
	else {

	echo "<script>alert('Rejestracja nie powiodła się, spróbuj ponownie!')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
	}
}
?>
