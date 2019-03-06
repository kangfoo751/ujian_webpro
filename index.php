<?php
error_reporting(0);
include'koneksi.php';
$db= new database();
?>

<?php
$hal = $_GET['hal'];
if (empty($hal)){
?>
<h3>Data User</h3>
<a href="index.php?hal=input">Input Data</a>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Password</th>
	</tr>
	<?php
	$no=1;
	foreach ($db->tampil() as $x) {
	?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $x['nama']; ?></td>
		<td><?php echo $x['email']; ?></td>
		<td><?php echo $x['password']; ?></td>
		<td>
			<a href="index.php?hal=edit&id=<?php echo $x['id']; ?>&aksi=edit">Edit</a>
			<a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapus">Hapus</a>			
		</td>
	</tr>
	<?php 
	}
	?>
</table>
<?php
}
 else if($hal == "input"){
?>
<h3>Tambah Data User</h3>

<form action="proses.php?aksi=tambah" method="post">
	
<table>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Simpan"></td>
	</tr>
</table>
</form>
<?php
}
 else if($hal == "edit"){
?>
<h3>Tambah Data User</h3>

<form action="proses.php?aksi=update" method="post">
<?php
foreach($db->edit($_GET['id']) as $d){
?>	
<table>
	<tr>
		<td>Nama</td>
		<td>
		<input type="hidden" name="id" value="<?php echo $d['id'] ?>">
		<input type="text" name="nama" value="<?php echo $d['nama'] ?>">
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $d['email'] ?>"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value="<?php echo $d['password'] ?>"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Simpan"></td>
	</tr>
</table>
<?php
}
?>
</form>
<?php
}
?>