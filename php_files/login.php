<?php 

session_start();

	include("connection.php");
	include("operations.php");
	//var_dump($_SERVER);
	$requestMethod = strtoupper(getenv('REQUEST_METHOD'));
	$httpMethods = array('GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS');

	//if($_SERVER['REQUEST_METHOD'] == "POST")
	if (in_array($requestMethod, $httpMethods)) 

	{
		if ($requestMethod == 'POST') {

		echo ("testing_1");

		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
		$email = $_POST['email'];

		echo ("testing_2");

		if(!empty($username) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($email) && !is_numeric($username))
		{
			echo ("testing_3");

			$query = "select * from user where username = '$username' limit 1";
			$result = mysqli_query($con, $query);
			echo ("testing_4");


			if($result)
			{
				echo ("one");

				if($result && mysqli_num_rows($result) > 0)
				{
					echo ("two");

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						echo ("three");

						$_SESSION['username'] = $user_data['username'];
						header("Location: index.php");
						die;
					}

				}
			}
			
			echo "wrong username or password!";
		}
	
		else
		{
			echo "wrong username or password!";
		}
	}
	}
	else{
		echo("failed server");
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 20px;
		border-radius: 5px;
		padding: 4px;
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

            <label for="username">username:</label>
			<input id="text" type="text" name="username">
			<br><br>

            <label for="password">password:</label>
			<input id="text" type="password" name="password">
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

			<input id="button" type="submit" value="Login">
			<br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>