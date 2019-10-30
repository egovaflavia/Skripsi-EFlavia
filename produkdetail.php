<?php
  session_start();
  include "koneksi.php"; 
 
  $sqlpr = mysql_query("select * from produk where idproduk='$_GET[idp]'");
  $rpr = mysql_fetch_array($sqlpr);
  $sqlk = mysql_query($kon, "select * from kategori where idk='$rpr[idkat]'");
  $rk = mysql_fetch_array($sqlk);

  
  echo "<div class='dh4'>";
  if(!empty($rpr["foto1"])){
    $foto1 = "<img src='fotoproduk/$rpr[foto1]' width='80%' border='1'>";
  }if(!empty($rpr["foto2"])){
    $foto2 = "<p><img src='fotoproduk/$rpr[foto2]' width='80%' border='1'>";
  }
  echo "$foto1 $foto2";	
    echo "<h3>Komentari Produk ini</h3>";
	  
  if(!empty($_SESSION["userag"]) and !empty($_SESSION["passag"])){
	  include "postkomentar.php";
	  
	  include "komentar.php";
  }else{
	  echo "<b>Login </b> untuk mengomentari berita ini";
	  echo "<div class='dh12'>";
	  echo "</div>";
  }

  

  echo "</div>";

  
  echo "<div class='dh8' align='justify'>";
  echo "<h1>$rpr[namaproduk]</h1>";
  echo "<h3>Tersedia $rpr[stok] Unit</h3>";
  echo "<b>Deskripsi : </b><br>$rpr[spesifikasi]<p>";
  echo "<b>Detail Produk : </b><br>$rpr[detailproduk]<p>";
  echo "<a href='?p=keranjang&idp=$rpr[idproduk]&ida=$ra[idanggota]'><button type='button' class='btn btn-more'>Beli Sekarang</button></a>";
  echo "</div>";
 
  echo "<p>&nbsp;</p>";	


?>

