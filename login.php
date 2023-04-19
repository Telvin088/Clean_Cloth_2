login.php
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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: home.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		background-image: url(images/45-degree-fabric-light.png);
		margin: auto;
		margin-top: 150px;
		width: 400px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name" placeholder="Full Name"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>

			<input style="cursor: pointer;" id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" style="text-decoration: none; color: var(--color-text); font-weight: bold;">Click to Sign Up</a><br><br>
		</form>
	</div>
</body>
</html>