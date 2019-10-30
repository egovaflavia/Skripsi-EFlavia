<?php
	$sqlb = mysql_query("delete from brand where idbrand='$_GET[idb]'");
	if($sqlb){
		echo "Brand Berhasil Dihapus";
	}else{
		echo "Gagal Menghapus";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=brandview'>";
?>