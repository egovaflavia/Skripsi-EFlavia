<?php
	include "koneksi.php";
	$sqlo = mysql_query("update orders set statusorder='$_POST[statusorder]' where idorder='$_POST[idorder]'");
	if($sqlo){
		echo "Status order sudah berhasil diubah";
	}else{
		echo "Gagal merubah status order";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=order'>";
?>