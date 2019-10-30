<?php
	$sqla = mysql_query("select * from anggota order by idanggota asc");
	echo "<table border='0' width='90%'>";
	echo "<tr align='center'>";
	echo "<th width='10%'>No</th>";
	echo "<th>Detail Anggota</th>";
	echo "<th width='25%'>Informasi Akun</th>";
	echo "</tr>";
	$no = 1;
	while($ra = mysql_fetch_array($sqla)){
		echo "<tr>";
		echo "<td valign='top' align='center'><h3>$no</h3></td>";
		echo "<td valign='top'><h3>$ra[namalengkap]</h3>
		Jenis Kelamin <b>$ra[jk]</b><br>
		Lahir pada <b>$ra[tgllahir]</b><br>
		Alamat rumah di <b>$ra[alamat]</b><br>
		No. Handphone <b>$ra[nohp]</b></td>";
		echo "<td valign='top'><h3>&nbsp;</h3>
		Username : <b>$ra[username]</b><br>
		Password : <b>$ra[password]</b></td>";
		echo "</tr>";
		$no++;
	}	
	echo "</table>";
?>