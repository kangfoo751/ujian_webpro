<?php 
include 'koneksi.php';
$db = new database();

$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$db->input($_POST['nama'],$_POST['email'],$_POST['password']);
 	header("location:index.php");
 }elseif($aksi == "hapus"){ 	
 	$db->hapus($_GET['id']);
	header("location:index.php");
 }elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['nama'],$_POST['email'],$_POST['password']);
 	header("location:index.php");
 }
?>