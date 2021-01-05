<html>
<head>
	<meta charset="UTF-8">
	<title>Ubah data siswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


</head>
<body>
	<h3>Ubah data</h3>
	<?php
	foreach($data as $array){
	echo form_open('dbcontroller/edit/'.$array->NIS);
	?>
	<table>
		<tr>
			<td>NIS</td>			
			<td><input type="text" name="nis" readonly="" value="<?php echo $array->NIS?>"/></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="<?php echo $array->Nama?>"/></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="jk">
					<option value="L">Laki - Laki</option>
					<option value="P">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><input type="text" name="kelas" value="<?php echo $array->Kelas?>"/></td>
		</tr>			
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat"><?php echo $array->Alamat?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="edit" value="Edit"/></td>
		</tr>
	</table>
	<?php 
		echo form_close();
		} 
	?>
</body>
</html>