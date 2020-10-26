<?php include('connect.php');?>
<!DOCTYPE HTML>
<html>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>
		.input-login{
			margin-left: 537.5px;
			padding: 30px;
			width: 30%;
			border: 3px solid skyblue;
			border-radius: 0px 0px 20px 20px;
		}
		.input-login label{
			display: block;
		}
		.input-login input{
			padding: 10px;
			width: 95%;
			border-radius: 5px;
		}
		.headerS{
			width : 30%;
			text-align : center;
			margin : 100px auto 0px;
			color : white;
			background : skyblue;
			border : 1px solid skyblue;
			border-radius : 10px 10px 0px 0px;
			border-bottom : none;
			padding : 20px;
		}
	</style>
<body>
<div class="headerS">
	<h2><a href="home.php" style="text-decoration:none; color:white;">Login</a></h2>
</div>
	<div class="input-login">
	<form method="post" action="login.php">
		<?php include('error.php');?>
		<label>Username</label>
		<input type="text" name="username">
		<br><br>
		<label>Password</label>
		<input type="password" name="password">
		<br><br>
		<button type="submit" name="login" class="btn">Login</button>
		<br><br>
	</form>
	</div>
</body>
</html>