<?php 
	$sqlb = mysql_query("select * from brand where idbrand='$_GET[idb]'");
	$rb = mysql_fetch_array($sqlb);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <input name="idbrand" type="hidden" id="idbrand" value="<?php echo "$rb[idbrand]"; ?>">
 <?php
$sqlk = mysql_query("select * from kategori order by namakat asc");
echo "<select name='idkat'>";
echo "<option value=''>Pilih Kategori</option>";
while($rk = mysql_fetch_array($sqlk)){
	if($rk['idkat']==$rb['idkat']){
		$sel = " selected";
	}else{
		$sel = "";
	}
	echo "<option value='$rk[idkat]' $sel>$rk[namakat]</option>";
}
echo "</select>";
?>
 <input name="namabrand" type="text" id="namabrand" placeholder="Nama Brand" value="<?php echo "$rb[namabrand]"; ?>" />
 <input name="simpan" type="submit" id="simpan" value="SIMPAN BRAND">
</form>

<?php
include "koneksi.php";
if($_POST["simpan"]){
	$sqladm = mysql_query("select * from admin where username='$_SESSION[useradm]'");
	$radm = mysql_fetch_array($sqladm);
	$sqlb = mysql_query("update brand set idkat='$_POST[idkat]',  idadmin='$radm[idadmin]', namabrand='$_POST[namabrand]' where idbrand='$_POST[idbrand]'");
	if($sqlb){
		echo "Brand Berhasil Diubah";
	}else{
		echo "Gagal Mengubah";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=brandview'>";
}
?>