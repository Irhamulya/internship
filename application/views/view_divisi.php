<html>
<head>
	<meta charset="UTF-8">
	<title>View data siswa</title>
</head>
<body>
	<?php echo anchor("dbcontroller","Tambah data"); ?>
	<h3>Data siswa</h3>
	<table border="1">
		<tr>
			<th>NIS</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Kelas</th>
			<th>Alamat</th>
			<th>Pengaturan</th>
		</tr>
		<?php foreach ($data as $array) {?>
		<tr>
			<td><?php echo $array->NIS; ?></td>
			<td><?php echo $array->Nama; ?></td>
			<td><?php echo $array->JenisKelamin; ?></td>
			<td><?php echo $array->Kelas; ?></td>
			<td><?php echo $array->Alamat; ?></td>
			<td>
				<?php echo anchor("dbcontroller/edit/$array->NIS","Ubah"); ?>
				<?php echo anchor("dbcontroller/hapus/$array->NIS","Hapus"); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>