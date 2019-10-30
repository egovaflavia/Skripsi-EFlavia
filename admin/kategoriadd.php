<form name="form1" method="post" action="" enctype="multipart/form-data">
 <input name="namakat" type="text" id="namakat" placeholder="Nama Kategori">
 <input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
</form>

<?php
include "koneksi.php";
if($_POST["simpan"]){
	$sqladm = mysql_query("select * from admin where username='$_SESSION[useradm]'");
	$radm = mysql_fetch_array($sqladm);
	$sqlk = mysql_query("insert into kategori (idadmin, namakat) values ('$radm[idadmin]', '$_POST[namakat]')");
	if($sqlk){
		echo "Kategori Berhasil Disimpan";
	}else{
		echo "Gagal Menyimpan";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategoriview'>";
}
?>