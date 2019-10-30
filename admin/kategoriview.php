<?php
	$sqlk = mysql_query("select * from kategori order by namakat asc");
	echo "<a href='?p=kategoriadd'><div class='btn btn-more'>Tambah Kategori</div></a><p>";
	echo "<table border='0' width='90%'>";
	echo "<tr align='center'>";
	echo "<th width='10%'>No</th>";
	echo "<th>Nama Kategori</th>";
	echo "<th width='15%'>Aksi</th>";
	echo "</tr>";
	$no = 1;
	while($rk = mysql_fetch_array($sqlk)){
		echo "<tr>";
		echo "<td align='center'>$no</td>";
		echo "<td>$rk[namakat]</td>";
		echo "<td align='center'><a href='?p=kategoriedit&idk=$rk[idkat]'>Ubah</a> | 
				  <a href='?p=kategoridel&idk=$rk[idkat]'>Hapus</a></td>";
		echo "</tr>";
		$no++;
	}	
	echo "</table>";
?>