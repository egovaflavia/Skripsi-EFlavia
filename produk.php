<?php
  if($_GET["idk"] == 0){
	$q = "";
  }else{
	$q = " where idkat='$_GET[idk]'";
  }
  $sqlpr = mysql_query("select * from produk $q order by tglpost desc");
  while($rpr = mysql_fetch_array($sqlpr)){
    $nm = substr($rpr["namaproduk"],0,30);
	echo "<div class='dh3' align='center'>";
	echo "<div id='prd'>";
	echo "<fieldset>";
	echo "<img src='fotoproduk/$rpr[foto1]' width='80%'>";
	echo "<h2>$nm...</h2>";
	echo "<h3>Rp.$rpr[hargaproduk]</h3>";
	echo "Tersedia $rpr[stok] Unit<p>";
	echo "<a href='?idk=$_GET[idk]&p=produkdetail&idp=$rpr[idproduk]'><button type='button' class='btn btn-more'>Lihat</button></a>";
	echo " <a href='?p=keranjang&idp=$rpr[idproduk]&ida=$ra[idanggota]'><button type='button' class='btn btn-more'>Beli</button></a>";
	echo "</fieldset>";
	echo "</div>";
	echo "</div>";  
  }
?>