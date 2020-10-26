<?php include('connect.php')?>
<!DOCTYPE HTML>
<html lang="en">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        .content{
            padding: 20px;
        }
        .nav{
            font-size: 14px;
            background-color: #00547F;
            letter-spacing: 2px;
        }
        .navbar-right{
            margin-left: 20px;
        }
        .nav li p{
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .body{
            background-color: #eee;
        }
        .content h2{
            padding: 10px;
        }
        .content th{
            padding: 10px;
        }
        .menu li a {
            padding: 3px;
        }
        .btn{
            width: 150px;
            margin-left: 100px;
        }
        .vertical-menu{
            width: 20%;
            margin-top: 30px;
            margin-left: 20px;
            float: left;
            background-color: #eee;
            box-shadow: 10px 10px 10px #888888;
        }
        .vertical-menu a {
            background-color: #eee;
            color: black;
            display: block;
            padding: 12px;
            text-decoration: none; 
        }
        .vertical-menu a:hover {
            background-color: #0087CB;
            color: white;
        }
        .vertical-menu .active{
            background-color: #0087CB;
            color: white;
        }
        .header-content{
            margin-top: 30px;
            width: 75%;
            float: left;
            background-color: #0087CB;
            border-radius: 0px;
            padding: 5px 5px;
            color: white;
            margin-left: 20px;
            border: 1px solid #0087CB;
            margin-bottom: 0%; 
            box-shadow: 10px 10px 10px #888888;
        }
        .header-content p{
            margin-top: 3px;
            margin-left: 10px;
            padding: 0px;
        }
        .content{
            margin-left: 20px;
            box-shadow: 10px 10px 10px #888888;
            border-radius: 0px;
        }
        table{
            width: 500px;
        }
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #00324B;
            color: white;
        }
        table td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            color: black;
        }
        .btn{
            margin: 0px;
            margin-bottom: 10px;
            width: 170px;
        }
        .form-group{
            margin-top: 0px;
            border-radius: 0px;
            margin: 0px;
            width: 80%;
            padding: 20px; 
        }
        .input-text {
            padding: 5px;
            width: 700px;
            margin: 0px;
            float: left;
        }
        label{
            float: left;
            width: 30%;
            padding: 5px;
            margin-top: 5px;
        }
        .content h3{
            margin-left: 15px;
            padding: 0px;
        }
        .btn{
            display: block;
            float: left;
            margin-top: 20px;
        }
    </style>
<head>
    <title>Dashboard</title>
</head>
<body>
    <nav class="nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-brand">
                <li><p style="margin-left: 80px;"><b>Management Attendance Fingerprint<b></p></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li style="margin-right: 80px; margin-top: 15px;"><p> Welcome, <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'];?></li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="vertical-menu text-center">
            <ul>
                <li><a class="" href="dashboard.php"><span class="glyphicon glyphicon-home"></span>    DASHBOARD</a></li>
                <li><a href="statistik.php"><span class="glyphicon glyphicon-stats"></span> DATA PRESENSI</a></li>
                <li><a class="active"href="datapegawai.php"><span class="glyphicon glyphicon-th"></span> DATA PEGAWAI</a></li>
                <li><a href="laporan.php"><span class="glyphicon glyphicon-file"></span>  LAPORAN</a></li>
                <li><a class="logout" href="dashboard.php?logout=1" ><span class="glyphicon glyphicon-log-out"></span>  LOGOUT</a>
             </ul>
        </div>
    <div class="header-content">
        <p><?php
            date_default_timezone_set("Asia/Jakarta");
            echo date('l, d-m-Y  h:i:s a');
        ?></p>
    </div>
    <div class="content">
        <h3> TAMBAH PEGAWAI </h3>
        <form class="form-group" method="post" action="tambahpegawai.php">
        <?php include('error.php'); ?>
            <label>ID PEGAWAI</label><br>
		        <input class="input-text" type="text" name="id_pegawai" placeholder="ID PEGAWAI">
            <label>NAMA PEGAWAI</label><br>
                <input class="input-text" type="text" Name="nama_pegawai" placeholder="NAMA PEGAWAI">
                <button type="submit" name="submitpegawai"class="btn btn-md btn-info"><span class="glyphicon glyphicon-plus"></span> TAMBAH PEGAWAI</button>
	    </form>  
            
               
    </div>
    <script>
        
    </script>
</body>
</html>