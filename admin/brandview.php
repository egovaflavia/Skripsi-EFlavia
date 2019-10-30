<?php
	$sqlb = mysql_query("select * from brand order by namabrand asc");
	echo "<a href='?p=brandadd'><div class='btn btn-more'>Tambah Brand</div></a><p>";
	echo "<table border='0' width='90%'>";
	echo "<tr align='center'>";
	echo "<th width='10%'>No</th>";
	echo "<th>Nama Kategori</th>";
	echo "<th>Nama Brand</th>";
	echo "<th width='15%'>Aksi</th>";
	echo "</tr>";
	$no = 1;
	while($rb = mysql_fetch_array($sqlb)){
	  	$sqlk = mysql_query("select * from kategori where idkat='$rb[idkat]'");
		$rk = mysql_fetch_array($sqlk);
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$rk[namakat]</td>";
		echo "<td>$rb[namabrand]</td>";
		echo "<td align='center'><a href='?p=brandedit&idb=$rb[idbrand]'>Ubah</a> | 
				  <a href='?p=branddel&idb=$rb[idbrand]'>Hapus</a></td>";
		echo "</tr>";
		$no++;
	}	
	echo "</table>";
?>