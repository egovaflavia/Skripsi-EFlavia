<?php
	$sqlpr = mysql_query("delete from produk where idproduk='$_GET[idp]'");
	
	if($sqlpr){
		echo "Produk Berhasil Dihapus";
	}else{
		echo "Gagal Menghapus";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produkview'>";
?>