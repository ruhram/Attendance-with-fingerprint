<?php include("connect.php"); ?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
  .jumbotron {
    background-color: skyblue;
    color: #fff;
    margin-top: 50px;
    margin-bottom: 0px;
    padding: 25px 0px;
    font-style: trebuchet;
  }
  .nav{
    font-size: 14px;
    background-color: #00547F;
    letter-spacing: 2px;
    opacity: 1;
  }
  .nav li a{
    color: #fff;
  }
  .nav li a:hover{
    color: #00547F;
    background-color: #fff;
    font-weight: bold;
  }
  .nav .head{
    color: #fff;
    margin-top: 15px;
    margin-left: 50px;
    font-size: 14px;
  }
  .content p{
    color: black;
    margin-top: 100px;
    position:absolute;
  }
</style>
<head>
    <title>ATTENDANCE MANAGER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <nav class="nav">
        <div class="nav navbar-fixed-top navbar-collapse" >
          <ul class="nav navbar-nav navbar-header">
            <li class="head"><b>ATTENDANCE MANAGER<b></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="login.php">LOGIN</a></li>
            
          </ul>
        </div>
    </nav>
    <div class="content">
        <img class="img-responsive" src="firewatch.jpg" alt="wallpaper" style="width :1920px; height:753px;">
    </div>
</body>
</html>