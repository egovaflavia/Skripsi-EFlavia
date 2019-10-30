<fieldset>
<h3>5 KOMENTAR TERBARU</h3> 
<?php
	include "koneksi.php";
	$sqlkomen = mysqli_query($kon, "select * from komentar where statuskomentar='P' order by tglkomentar desc limit 5");
	echo "<hr style='color:#007EBB'>";
	while($rkomen = mysql_fetch_array($sqlkomen)){
		$sqla = mysql_query($kon, "select * from anggota where idanggota='$rkomen[idanggota]'");
		$ra = mysql_fetch_array($sqla);
		$sqlpr = mysql_query($kon, "select * from produk where idproduk='$rkomen[idproduk]'");
		$rpr = mysql_fetch_array($sqlpr);
		echo "<b>$ra[namalengkap]</b> mengomentari produk <b><a href='?p=produkdetail&idk=$rpr[idkat]&idp=$rpr[idproduk]'>$rpr[namaproduk]</a></b>";
		echo "<hr style='color:#007EBB'>";
	}	
?>
</fieldset>
