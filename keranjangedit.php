<?php
include "koneksi.php";
$id = $_POST["id"];
$jml_data = count($id);
$jumlah = $_POST["jml"];
for($i=1; $i<=$jml_data; $i++){
  $sqlc = mysql_query("select * from cart where idcart='$id[$i]'");
  $rc = mysql_fetch_array($sqlc);
  $sqlpr = mysql_query("select * from produk where idproduk='$rc[idproduk]'");
  $rpr = mysql_fetch_array($sqlpr);
  $stok = $rpr["stok"];
  echo "<fieldset style='text-align:center; background-color:#FFFFD2'>";
  if($jumlah[$i] > $stok){
	echo "<b>STOK TIDAK CUKUP</b> <br> Anda ingin membeli <b>$jumlah[$i]</b> unit <b>$rpr[namaproduk]</b> dari <b>$stok</b> unit yang tersedia";
  }else{
	echo "<b>STOK TERSEDIA</b> <br> Anda ingin membeli <b>$jumlah[$i]</b> unit <b>$rpr[namaproduk]</b> dari <b>$stok</b> unit yang tersedia";
  	mysql_query("update cart set jumlahbeli='$jumlah[$i]' where idcart='$id[$i]'");
  }
  echo "</fieldset><br>";
}	
echo "<META HTTP-EQUIV='Refresh' Content='3; URL=?p=keranjangbelanja&ida=$_POST[ida]'>";
?>