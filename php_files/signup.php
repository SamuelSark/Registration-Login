<?php 
session_start();

	include("connection.php");
	include("operations.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
		$passwordconfirmed = $_POST['passwordconfirmed'];


		if(!empty($username) && !empty($password) && !empty($passwordconfirmed)&& !empty($firstName) && !empty($lastName) && !empty($email) && !is_numeric($username))
		{
			$query = "insert into user (username,password,firstName,lastName,email) values ('$username','$password', '$firstName', '$lastName', '$email')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}
		else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 20px;
		border-radius: 15px;
		padding: 2px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: blue;
		border: none;
	}

	#box{

		background-color: lightgreen;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            <label for="username">username:</label>
			<input id="text" type="text" name="username"><br><br>

            <label for="password">password:</label>
			<input id="text" type="password" name="password">
            <br><br>

            <label for="passwordconfirmed">password confirmed:</label>
			<input id="text" type="password" name="passwordconfirmed">
            <br><br>

            <label for="firstName">first name:</label>
            <input id="text" type="text" name="firstName">
            <br><br>
            
            <label for="lastName">last name:</label>
            <input id="text" type="text" name="lastName">
            <br><br>

            <label for="email"> email:</label>
			<input id="text" type="text" name="email">
            <br><br>

			<input id="button" type="submit" value="Signup">
            <br><br>

			<a href="login.php">Click to Login</a>
            <br><br>
		</form>
	</div>
</body>
</html>