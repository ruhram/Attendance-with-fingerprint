<?php
    $servername="localhost";
    $username="root";
    $password="";
    $password_1="";
    $password_2="";
    $db="fp";
		$errors = array();
		session_start();

    //connection with database
    $conn = mysqli_connect($servername,$username,$password,$db) or die("Koneksi database gagal");

    //function validate input
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
    }
    if (isset($_POST['login'])){
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);
	
		//ensure text filled properly
		if(empty($username)){
			array_push($errors,"Username required");
		}
		if(empty($password)){
			array_push($errors,"password required");
		}
		
		if(count($errors) == 0){
		$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		if($row['username'] == $username && $row['password'] == $password){
			$_SESSION['username'] = $username;
			header('location: dashboard.php');
		}else{
			array_push($errors, "Username/password wrong");
			}
		}
		}
		//when button logout clicked
		if(isset($_GET['logout'])){
			session_destroy();
			unset($_SESSION['username']);
			header('location: home.php');
		}

		//when tambahpegawai button submited
	if(isset($_POST['submitpegawai'])){
		if(empty($_POST['id_pegawai'])){
			array_push($errors,"ID Pegawai Required");
		}else{
			$id_pegawai = test_input($_POST['id_pegawai']);
		}
		if(empty($_POST['nama_pegawai'])){
			array_push($errors,"Nama Pegawai Required");
		}else{
			$nama_pegawai = test_input($_POST['nama_pegawai']);
		}
		if(count($errors) == 0){
			$query="INSERT INTO `pegawai`(`id_pegawai`,`nama_pegawai`) VALUES ('$id_pegawai','$nama_pegawai') ";
			$result= mysqli_query($conn, $query) or die("Errors: ".mysqli_error()." on query");
			header('location: datapegawai.php');
		}
	}
	if(isset($_GET['id'])){
	  $id = $_GET['id'];

    // buat query hapus
    $query = "DELETE FROM `pegawai` WHERE id_pegawai=$id";
    $result = mysqli_query($conn, $query) or die("Errors: ".mysqli_error()." on query");
    header('location: datapegawai.php');
	}

	if(isset($_POST['submitwaktu'])){
		$_SESSION['submitwaktu'] = $_POST['waktumasuk'];
		$waktu = $_SESSION['submitwaktu'];
		header('location: dashboard.php');
		}

	

	