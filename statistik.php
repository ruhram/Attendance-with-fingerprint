<?php include('connect.php')?>
<!DOCTYPE HTML>
<html lang="en">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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
            width: 1110px;
        }
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #00324B;
            color: white;
        }
        table td {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            color: black;
            padding: 10px;
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
                <li><a class="active"href="statistik.php"><span class="glyphicon glyphicon-stats"></span>           DATA PRESENSI</a></li>
                <li><a href="datapegawai.php"><span class="glyphicon glyphicon-th"></span>  DATA PEGAWAI</a></li>
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
        <?php
           $txt = file_get_contents('inoutdata.txt');
           $txt = trim($txt);
           $rows = explode("\n", $txt);
           sort($rows);
           array_shift($rows);
        ?>
        <?php
           foreach($rows as $row => $data){
                $row_data     = explode(' ', $data);
                $nama         = $row_data[6];
                $var      = $row_data[10];
                    $date = str_replace('/', '-', $var);
                    $tanggal = date('Y-m-d', strtotime($date));
                $waktu        = $row_data[11];
                $query="INSERT INTO `presensi`(`id_pegawai`,`tanggal`, `absenmentah`) VALUES ('$nama','$tanggal','$waktu') ";
                $result= mysqli_query($conn,$query);
                $query2="DELETE t2 FROM presensi t1
                    INNER JOIN
                        presensi t2 
                    WHERE
                        t1.id< t2.id AND t1.absenmentah = t2.absenmentah";
                $result2= mysqli_query($conn,$query2); 
           }
        ?>
           <table>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>TANGGAL</th>
                    <th>JAM MASUK</th>
                    <th>JAM KELUAR</th>
                    <th>KETERANGAN</th>
                </tr>
        <?php

                $query= "SELECT presensi.*, pegawai.*, MIN(absenmentah) AS jam_datang, MAX(absenmentah) as jam_pulang, COUNT(*) AS jumlah FROM `presensi` INNER JOIN `pegawai` ON presensi.id_pegawai = pegawai.id_pegawai WHERE tanggal = date('2019-03-20') GROUP BY presensi.tanggal, presensi.id_pegawai ORDER BY presensi.id_pegawai ASC";
                $result= mysqli_query($conn,$query) or die("ERROR :".mysqli_error()." on query");
                while($row=mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>$row[id_pegawai]</td>
                            <td>$row[nama_pegawai]</td>
                            <td>$row[tanggal]</td>
                            <td>$row[jam_datang]</td>";
                        if ($row['jumlah']>=2){
                            echo "<td>$row[jam_pulang]</td>";
                        }else{
                            echo "<td>---</td>";
                        };
                        if ($row['jumlah']>=2){
                            echo "<td>Pulang</td>";
                        }else if ($row['jam_datang']<=date($_SESSION['submitwaktu'])){
                            echo "<td style='background-color:green'>Tepat Waktu</td>";
                        }else{
                            echo "<td style='background-color:red'>Terlambat</td>";
                        };
                        "</tr>";
                }
        ?>
        </table>
    </div>
    <script>
        setTimeout(function(){
            window.location.reload(1);
        }, 5000);
        
    </script>
</body>
</html>