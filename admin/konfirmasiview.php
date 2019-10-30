<?php
	$sqlbyr = mysql_query("select * from konfirmasibayar where idorder='$_GET[ido]'");
	$rbyr = mysql_fetch_array($sqlbyr);
	echo "<table border='0' width='100%'>
	<tr>
		<td rowspan='5' width='25%'><img src='../buktibayar/$rbyr[bukti]' width='100%'></td>
		<th width='30%'>Ditransfer dari</th>
		<td>$rbyr[namabankpengirim]</td>
	</tr>
	<tr>
		<th>Atas nama</th>
		<td>$rbyr[namapengirim]</td>
	</tr>
	<tr>
		<th>Sejumlah</th>
		<td>Rp. $rbyr[jumlahtransfer]</td>
	</tr>
	<tr>
		<th>Pada</th>
		<td>$rbyr[tgltransfer]</td>
	</tr>
	<tr>
		<th>Ditransfer ke</th>
		<td>$rbyr[namabankpenerima]</td>
	</tr>
	</table>";
?>