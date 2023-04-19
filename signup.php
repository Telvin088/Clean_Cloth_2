signup.php
<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
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
	
	:root {
  --color-body: #303841;
  --color-heading: #7aa5d2;
  --color-navigation: #47555e;
  --color-text: #eeeeee;
}

	body {
		background-image: linear-gradient(to left, var(--color-body), var(--color-heading));
	}
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		background-image: linear-gradient(
    to right,
    var(--color-navigation),
    var(--color-text)
  );
		margin: auto;
		margin-top: 150px;
		width: 400px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px; color: white; font-weight: bold;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="Full Name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>

			<input style="cursor: pointer;" id="button" type="submit" value="Signup"><br><br>

			<a href="login.php" style="text-decoration: none; font-weight: bold; color: var(--color-text);">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>