<?php
class database{
	var $host="localhost";
	var $user="root";
	var $pass="123";
	var $db="ujian";

	function koneksi(){
		mysql_connect($this->host, $this->user,$this->pass);
		mysql_select_db($this->db);
	}
	function tampil(){
	$data=mysql_query("SELECT * FROM users");
	while($d=mysql_fetch_array($data)){
		$hasil[]=$d;
	}
	return $hasil;
	}
	function input($nama,$email,$password){
		mysql_query("insert into users values('','$nama','$email','$password')");
	}

	function edit($id){
	$data=mysql_query("SELECT * FROM users WHERE id='$id'");
	while($x=mysql_fetch_array($data)){
		$result[]=$x;
	}
	return $result;
	}

	function update($id,$nama,$email,$password){
		mysql_query("UPDATE users SET nama='$nama',email='$email',password='$password' WHERE id='$id'");
	}

	function hapus($id){
		mysql_query("DELETE FROM users where id='$id'");
	}
}
?>