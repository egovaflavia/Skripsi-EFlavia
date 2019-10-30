<?php
	$sqlp = mysql_query("select * from produk order by tglpost desc");
	echo "<a href='?p=produkadd'><div class='btn btn-more'>Tambah Produk</div></a><p>";
	echo "<table border='0' width='90%'>";
	echo "<tr align='center'>";
	echo "<th>No</th>";
	echo "<th width='20%'>Foto</th>";
	echo "<th>Detail Produk</th>";
	echo "<th width='15%'>Aksi</th>";
	echo "</tr>";
	$no = 1;
	while($rp = mysql_fetch_array($sqlp)){
	  	$sqlk = mysql_query("select * from kategori where idkat='$rp[idkat]'");
		$rk = mysql_fetch_array($sqlk);
	  	$sqlb = mysql_query("select * from brand where idbrand='$rp[idbrand]'");
		$rb = mysql_fetch_array($sqlb);
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td valign='top'><img src='../fotoproduk/$rp[foto1]' width='100%'></td>";
		echo "<td><h3>$rp[namaproduk]</h3>
		<br>Sisa $rp[stok] Unit
		<p><b>Detail Produk :</b> 
		<br>$rp[spesifikasi]</td>";
		echo "<td align='center'><a href='?p=produkedit&idp=$rp[idproduk]'>Ubah</a> | 
				  <a href='?p=produkdel&idp=$rp[idproduk]'>Hapus</a></td>";
		echo "</tr>";
		$no++;
	}	
	echo "</table>";
?>