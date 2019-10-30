<?php
include "koneksi.php";

echo "<div class='dh10'> 
	<form action='' method='POST' enctype='multipart/form-data'>
	<input type='text' value='$ra[namalengkap]' disabled><br>
    <input name='p' type='hidden' value='produkdetail'>
    <input name='idk' type='hidden' value='$_GET[idk]'>
    <input name='idp' type='hidden' value='$_GET[idp]'>
	<input type='hidden' name='idproduk' value='$_GET[idp]'>
	<input type='hidden' name='idanggota' value='$ra[idanggota]'>
	
	<textarea name='komentar' placeholder='Tulis Komentar Anda Disini' rows='4'></textarea>
	<input type='submit' name='kirim' value='Kirim' style='width: 20%'>
	<p>&nbsp;</p>
	</form>
	
</div>";

if($_POST["kirim"]){
	include "koneksi.php";
	$komentar = nl2br($_POST["komentar"]);
	$sqlkomen = mysql_query("insert into komentar (idproduk, idanggota, komentar, tglkomentar, statuskomentar) values ('$_POST[idproduk]', '$_POST[idanggota]', '$komentar', NOW(),'P')");
	if($sqlkomen){
		echo "Komentar Sudah dikirim";
	  }else{
		echo "Gagal Mengirim";
	  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=$_POST[p]&idk=$_POST[idk]&idp=$_POST[idp]''>";
	
}

?>
