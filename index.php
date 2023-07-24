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
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo '<div class="e">"wrong username or password!"</div>';
		}else
		{
			echo "wrong username or password!";
		}
	}

	?>
	<style>
	.e{
		display:flex;
		justify-content:center;
		padding:px 0px 0px 0px;
		
		
	}
	</style>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	body{
		
		background-image: url("login2.jpg");
		background-repeat: no-repeat;
		background-size: cover;
		
	}
    
	.login{
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

		height: 25px;
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

	.signupbtn{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: rgb(29, 166, 211);
		border: none;
		text-decoration: none;
		margin: 0px 0px 0px 116px;
	}
    .signupbtn a{
		text-decoration: none;
		color: bisque;
	}
	.contentbox{
		box-shadow: 0 0 20px 9px #ff61241f;
		border-radius: 30px;
		height: 27rem;
		width: 20rem;
		padding: 20px;
		background-color: #f1e2ce45;
		
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
	<div class="contentbox">
		<div class="logobox">
			<img src="logo.png" alt="">
		</div>
		
		<form method="post">
			<div class="login">
				LOGIN
			</div>
             <label for="user_name">USERNAME</label>
			 <input id="text" type="text" name="user_name" placeholder="Gajendra Babu" required><br><br>
             <label for="user_name">PASSWORD</label>
			 <input id="text" type="password" name="password" placeholder="123@" required><br><br>
			 
			<input id="button" type="submit" value="Login">
            <button class="signupbtn"><a href="signup.php">Signup</a></button>
		</form>

		<div class="link">
			<a href="#">FORGOTTEN PASSWORD?</a>
		</div>
	</div>
</div>
</body>
</html>