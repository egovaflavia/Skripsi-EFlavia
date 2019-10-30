<form name="form1" method="post" action="" enctype="multipart/form-data">
<?php
$sqlk = mysql_query("select * from kategori order by namakat asc");
echo "<select name='idkat'>";
echo "<option value=''>Pilih Kategori</option>";
while($rk = mysql_fetch_array($sqlk)){
	echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
}
echo "</select>";
?>
 <input name="namabrand" type="text" id="namabrand" placeholder="Nama Brand">
 <input name="simpan" type="submit" id="simpan" value="SIMPAN BRAND">
</form>

<?php
include "koneksi.php";
if($_POST["simpan"]){
	$sqladm = mysql_query("select * from admin where username='$_SESSION[useradm]'");
	$radm = mysql_fetch_array($sqladm);
	$sqlb = mysql_query("insert into brand (idkat, idadmin, namabrand) values ('$_POST[idkat]', '$radm[idadmin]', '$_POST[namabrand]')");
	if($sqlb){
		echo "Brand Berhasil Disimpan";
	}else{
		echo "Gagal Menyimpan";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=brandview'>";
}
?>