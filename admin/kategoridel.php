<?php
	$sqlk = mysql_query("delete from kategori where idkat='$_GET[idk]'");
	if($sqlk){
		echo "Kategori Berhasil Dihapus";
	}else{
		echo "Gagal Menghapus";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategoriview'>";
?>