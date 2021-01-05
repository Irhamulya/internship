<html>
<head>
	<meta charset="UTF-8">
	<title>Tambah data Divisi</title>
</head>
<body>
	<h3>Tambah Divisi</h3>
	<?php echo form_open('dbcontroller'); ?>
	<table>
		<tr>
			<td>Divisi</td>
			<td><input type="text" name="divisi"></td>
		</tr>
		<tr>
			<td>kouta</td>
			<td><input type="txt" name="qta"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="simpan" value="Simpan"></td>
		</tr>

	</table>
	<?php echo form_close(); ?>
</body>
</html>