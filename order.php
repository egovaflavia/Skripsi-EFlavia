<div id="view">
<fieldset>
<?php
	include "koneksi.php";
	$sqla = mysql_query("select * from anggota where username='$_SESSION[userag]'");
	$ra = mysql_fetch_array($sqla);
	
	$sqlo = mysql_query("select * from orders where idanggota='$ra[idanggota]'");
	
	echo "<br>";
	echo "<table border='0' width='100%'>";
	echo "<tr>";
		echo "<th width='5%'>No.</th>";
		echo "<th width='10%'>No Order</th>";
		echo "<th>Nama Pemesan</th>";
		echo "<th>Tanggal Pemesanan</th>";
		echo "<th>Status Pemesanan</th>";
		echo "<th>Status Pembayaran</th>";
		echo "<th>Aksi</th>";
	echo "</tr>";
	$no = 1;
	while($ro = mysql_fetch_array($sqlo)){
		$sqlod = mysql_query("select * from orders where idorder='$ro[idorder]'");
		$rod = mysql_fetch_array($sqlod);
		$sqla = mysql_query("select * from anggota where idanggota='$rod[idanggota]'");
		$ra = mysql_fetch_array($sqla);
		$sqlpr = mysql_query("select * from produk where idproduk='$ro[idproduk]'");
		$rpr = mysql_fetch_array($sqlpr);
		$sqlbyr = mysql_query("select * from konfirmasibayar where idorder='$ro[idorder]'");
		$rbyr = mysql_fetch_array($sqlbyr);
		if($rbyr["idorder"]==$ro["idorder"]){
			$stbyr = "Sudah Dikonfirmasi";
		}else{
			$stbyr = "Belum Dikonfirmasi";
		}
		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td align='center'>$ro[idorder]</td>";
			echo "<td align='center'>$ra[namalengkap]</td>";
			echo "<td align='center'>$rod[tglorder] WIB</td>";
			echo "<td align='center'>$rod[statusorder]</td>";
			echo "<td align='center'>$stbyr</td>";
			echo "<td align='center'><a href='?p=orderdetail&ido=$ro[idorder]'><button type='button' class='btn btn-more'>Detail Order</button></a></td>";
		echo "</tr>";
		$no++;
	}
	echo "</table>";
?>
</fieldset>
</div>