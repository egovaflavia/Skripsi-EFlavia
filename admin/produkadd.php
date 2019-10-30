<?php
$sqlk = mysql_query("select * from kategori order by namakat asc");
echo "<form action='$_SERVER[PHP_SELF]' method='get'>";	
echo "<input name='p' type='hidden' value='produkadd'>";
echo "<select name='idkat' onchange='this.form.submit()'>";
echo "<option value=''>Pilih Kategori</option>";
while($rk = mysql_fetch_array($sqlk)){
	if($rk['idkat']==$_GET['idkat']){
		$sel = " selected";
	}else{
		$sel = "";
	}
	echo "<option value='$rk[idkat]' $sel>$rk[namakat]</option>";
}
echo "</select>";
echo "</form>";
?>

<?php
$sqlb = mysql_query("select * from brand where idkat='$_GET[idkat]' order by namabrand asc");
echo "<form action='$_SERVER[PHP_SELF]' method='get'>";	
echo "<input name='p' type='hidden' value='produkadd'>";
echo "<input name='idkat' type='hidden' value='$_GET[idkat]'>";
echo "<select name='idbrand' onchange='this.form.submit()'>";
echo "<option value=''>Pilih Brand</option>";
while($rb = mysql_fetch_array($sqlb)){
	if($rb['idbrand']==$_GET['idbrand']){
		$sel = " selected";
	}else{
		$sel = "";
	}
	echo "<option value='$rb[idbrand]' $sel>$rb[namabrand]</option>";
}
echo "</select>";
echo "</form>";
?>

<form name="form1" method="post" action="" enctype="multipart/form-data">
 <input name="idkat" type="hidden" value="<?php echo "$_GET[idkat]"; ?>" />
 <input name="idbrand" type="hidden" value="<?php echo "$_GET[idbrand]"; ?>" />
 <input name="namaproduk" type="text" id="namaproduk" placeholder="Nama Produk">
 <input name="hargaproduk" type="text" id="hargaproduk" placeholder="Harga Produk" />
 <input name="stok" type="text" id="stok" placeholder="Stok Produk" />
 <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"></textarea>
 <textarea name="detailproduk" id="detailproduk" placeholder="Detail Produk"></textarea>
 <input name="foto1" type="file" id="foto1" />
 <input name="foto2" type="file" id="foto2" />
 <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
</form>

<?php
include "koneksi.php";
if($_POST["simpan"]){
   $nmfoto1  = $_FILES["foto1"]["name"];
   $lokfoto1 = $_FILES["foto1"]["tmp_name"];
	if(!empty($lokfoto1)){
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
	}
	
   $nmfoto2  = $_FILES["foto2"]["name"];
   $lokfoto2 = $_FILES["foto2"]["tmp_name"];
	if(!empty($lokfoto2)){
		move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
	}
	
	$sqlpr = mysql_query("insert into produk (idkat, idbrand, namaproduk, hargaproduk, stok, spesifikasi, detailproduk, foto1, foto2, tglpost) values ('$_POST[idkat]', '$_POST[idbrand]', '$_POST[namaproduk]', '$_POST[hargaproduk]', '$_POST[stok]', '$_POST[spesifikasi]', '$_POST[detailproduk]', '$nmfoto1', '$nmfoto2', NOW())");
	
	if($sqlpr){
		echo "Data Produk Berhasil Disimpan";
	}else{
		echo "Gagal Menyimpan";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produkview'>";
}
?>