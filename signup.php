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

			echo "User Registered Successfully!";
			header("Location: index.php");
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

body{
		
		background-image: url("login2.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		
	}

	.signup{
		display: flex;
		justify-content: center;
		padding: 30px 0px 15px 0px;
	}
	.outer{
		display: flex;
		justify-content: center;
		margin: 90px;
	}	
	
	#text{

		height: 27px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #ac2626;
		width: 100%;
	}

	#button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: rgb(165, 94, 56);
        border: none;
     }




	.loginbtn{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: rgb(29, 166, 211);
		border: none;
		text-decoration: none;
		margin: 0px 0px 0px 116px;
	}
    .loginbtn a{
		text-decoration: none;
		color: bisque;
	}
    
	.contentbox{
		box-shadow: 0 0 20px 9px #ff61241f;
		border-radius: 30px;
		height: 27rem;
		width: 20rem;
		padding: 20px;
		background-color:#f1e2ce45;
		
	}

	img{
		height: 100px;
		width: auto;
	}
	.logobox{
		display: flex;
		justify-content: center;
	}
    .link{
		display: flex;
		justify-content: center;
		margin: 30px 0px 0px 0px ;
	}
	</style>
    <div class="outer">
	<div class="contentbox" >
		<div class="logobox">
			<img src="logo.png" alt="">
		</div>
		<div class="signup">
			SIGNUP
		</div>
		
		<form method="post">
			
			<label for="user_name">USERNAME</label>
			<input id="text" type="text" name="user_name" placeholder="Gajendra Babu" required><br><br>

			<label for="user_name">PASSWORD</label>
			<input id="text" type="password" name="password" placeholder="123@" required><br><br>

			<input id="button" type="submit" value="Signup">
			<button class="loginbtn"><a href="index.php">Login</a></button>
		</form>
		<div class="link">
			<a href="#">RESET PASSWORD?</a>
		</div>
	</div>
</div>
</body>
</html>