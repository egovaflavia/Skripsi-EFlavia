  <div class="grid" style="background-color:#F7F7F7">
  <?php
    if($_GET["idk"] == 0){
	  $q = "";
	}else{
	  $q = " where idkat='$_GET[idk]'";
	}
	$sqlp = mysql_query("select * from produk $q order by tglpost desc limit 1");
	while($rp = mysql_fetch_array($sqlp)){
	  echo "<div class='dh4'>";
	  echo "<img src='fotoproduk/$rp[foto1]' width='100%' border='1'>";
	  echo "</div>";
	  echo "<div class='dh8'>";
	  echo "<h1>$rp[namaproduk]</h1>";
	  echo "<h3>Tersedia $rp[stok] Unit</h3>";
	  echo "<b>Deskripsi : </b><br>";
	  echo "$rp[spesifikasi]<p>";
	  echo "<a href='?idk=$_GET[idk]&p=produkdetail&idp=$rp[idproduk]'><button type='button' class='btn btn-more'>Lihat Detail</button></a>";
	  echo " <a href='?p=keranjang&idp=$rp[idproduk]&ida=$ra[idanggota]'><button type='button' class='btn btn-more'>Beli Sekarang</button></a>";
	  echo "</div>";
	}
  ?>
  </div>