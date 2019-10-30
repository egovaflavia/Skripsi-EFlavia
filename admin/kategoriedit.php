<?php 
	$sqlk = mysql_query("select * from kategori where idkat='$_GET[idk]'");
	$rk = mysql_fetch_array($sqlk);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <input name="idkat" type="hidden" id="idkat" value="<?php echo "$rk[idkat]"; ?>">
 <input name="namakat" type="text" id="namakat" placeholder="Nama Kategori" value="<?php echo "$rk[namakat]"; ?>" />
 <input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
</form>

<?php
include "koneksi.php";
if($_POST["simpan"]){
	$sqladm = mysql_query("select * from admin where username='$_SESSION[useradm]'");
	$radm = mysql_fetch_array($sqladm);
	$sqlk = mysql_query("update kategori set idadmin='$radm[idadmin]', namakat='$_POST[namakat]' where idkat='$_POST[idkat]'");
	if($sqlk){
		echo "Kategori Berhasil Diubah";
	}else{
		echo "Gagal Mengubah";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategoriview'>";
}
?>