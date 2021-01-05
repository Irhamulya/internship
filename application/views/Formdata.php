<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah data peserta</title>
</head>
<body>
    <h3>Tambah peserta</h3>
    <?php echo form_open('formci'); ?>
    <table>
        <tr>
            <td>Divisi</td>
            <td>
                <select required name="id_divisi" id="divisi">
                <option value="" >-- Pilih Divisi --</option>
                <?php                                
                foreach ($data1 as $row) 
                {  
                    echo "<option value='".$row->id."'data-qta='".$row->qta."'>".$row->divisi."</option>";
                }
                    echo"</select>"?>
            </td>
        </tr>
        <tr>
            <td>Kouta</td>
            <td>
            <input type="text" id="qta" name="id" readonly="" value="" />
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" id="nama"></td>
        </tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat"></textarea></td>
		</tr>
	    <tr>
            <td>Sekolah</td>
            <td><input type="text" name="sekolah" id="sekolah"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>

    </table>
    <?php echo form_close(); ?>
</body>
<script src="<?= base_url()?>Asset/jquery.js"> </script>
<script>

$(document).ready(function(){
    //divisi
    $("#divisi").change(function(){
    var qta =$(this).children('option:selected').data('qta');
    $('#qta').val(qta);
    });
});
</script>
</html>