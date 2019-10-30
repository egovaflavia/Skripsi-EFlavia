<?php
	$sqlpr = mysql_query("select * from produk where idproduk='$_GET[idp]'");
	$rpr = mysql_fetch_array($sqlpr);
?>

<?php
$sqlk = mysql_query("select * from kategori where idkat='$rpr[idkat]'");
$rk = mysql_fetch_array($sqlk);
  echo "<input type='text' value='Kategori : $rk[namakat]' disabled>";
?>

<?php
$sqlb = mysql_query("select * from brand where idbrand='$rpr[idbrand]'");
$rb = mysql_fetch_array($sqlb);
  echo "<input type='text' value='Brand : $rb[namabrand]' disabled>";
?>

<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input name="idproduk" type="hidden" value="<?php echo "$rpr[idproduk]"; ?>" />
  <input name="namaproduk" type="text" id="namaproduk" placeholder="Nama Produk" value="<?php echo "$rpr[namaproduk]"; ?>">
  <input name="hargaproduk" type="text" id="hargaproduk" placeholder="Harga Produk" value="<?php echo "$rpr[hargaproduk]"; ?>" />
  <input name="stok" type="text" id="stok" placeholder="Stok Produk" value="<?php echo "$rpr[stok]"; ?>" />
  <textarea name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi Produk"><?php echo "$rpr[spesifikasi]"; ?></textarea>
  <textarea name="detailproduk" id="detailproduk" placeholder="Detail Produk"> <?php echo "$rpr[detailproduk]"; ?></textarea>
 
  <p>
  <?php echo "<img src='../fotoproduk/$rpr[foto1]' height='150px'>"; ?>
  <?php echo "<img src='../fotoproduk/$rpr[foto2]' height='150px'>"; ?>
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
		$q = ", foto1='$nmfoto1'";
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
	}else{
		$q = "";
	}	
	
   $nmfoto2  = $_FILES["foto2"]["name"];
   $lokfoto2 = $_FILES["foto2"]["tmp_name"];
	if(!empty($lokfoto2)){
		$r = ", foto2='$nmfoto2'";
		move_uploaded_file($lokfoto2, "../fotoproduk/$nmfoto2");
	}else{
		$r = "";
	}
	
	$sqlpr = mysql_query("update produk set namaproduk='$_POST[namaproduk]', hargaproduk='$_POST[hargaproduk]', stok='$_POST[stok]',  spesifikasi='$_POST[spesifikasi]', detailproduk='$_POST[detailproduk]', $q $r where idproduk='$_POST[idproduk]'");
	if($sqlpr){
		echo "Produk Berhasil Diubah";
	}else{
		echo "Gagal Mengubah";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produkview'>";
}
?>