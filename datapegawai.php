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
        .hapus{
            border: 1px solid #f44336;
            padding: 10px;
            border-radius: 5px;
            background-color: #f44336;
            color: white;
        }
        .hapus:hover{
            background-color: red;
            color: white;
            text-decoration: none;
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
                <li><a href="statistik.php"><span class="glyphicon glyphicon-stats"></span>           DATA PRESENSI</a></li>
                <li><a class="active"href="datapegawai.php"><span class="glyphicon glyphicon-th"></span> DATA PEGAWAI</a></li>
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
        <h2> DATA PEGAWAI </h2> 
            <div class="datapegawai"> 
            
            <button type="button" name="tambahpegawai" class="btn btn-md btn-info" onclick="window.location.href='tambahpegawai.php'" ><span class="glyphicon glyphicon-plus"></span> TAMBAH PEGAWAI</button>
                <table >
                <tr>
                    <th>ID Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Aksi</th>
                </tr>
            <?php
            $query= "SELECT * FROM pegawai ORDER BY id_pegawai ASC"; 
            $result= mysqli_query($conn,$query) or die(mysqli_error($conn));
            $no = 1;
            while($row=mysqli_fetch_array($result)){
                echo "<tr>
                <td>$row[id_pegawai]</td>
                <td>$row[nama_pegawai]</td>
                <td><a class='hapus' href='datapegawai.php?id=$row[id_pegawai]'><span class='glyphicon glyphicon-erase'></span> Hapus</a>
                </tr>";
                $no++;
            }
            ?>
                </table>
    </div>
    <script>
        
    </script>
</body>
</html>