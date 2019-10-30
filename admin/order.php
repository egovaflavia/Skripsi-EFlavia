<div id="formadd">
<fieldset>
<?php
	include "koneksi.php";
	
	$sqlo = mysql_query("select distinct(idorder) from orderdetail");
	
	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>No Order</th>";
		echo "<th>Nama Pemesan</th>";
		echo "<th>Tanggal Pemesanan</th>";
		echo "<th>Status Pesanan</th>";
		echo "<th>Rubah Status Pesanan Menjadi</th>";
		echo "<th>Konfirmasi Pembayaran</th>";
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
			$buktibyr = "Sudah Dikonfirmasi<br>
			<a href='?p=konfirmasiview&ido=$ro[idorder]'>Lihat Konfirmasi</a>";
		}else{
			$buktibyr = "Belum Dikonfirmasi";
		}
		echo "<tr>";
			echo "<td align='center'>$no</td>";
			echo "<td align='center'>$ro[idorder]</td>";
			echo "<td>$ra[namalengkap]</td>";
			echo "<td>$rod[tglorder] WIB</td>";
			echo "<td>$rod[statusorder]</td>";
			echo "<td align='center'>
			<form method='post' action='?p=orderdetailstatus' enctype='multipart/form-data'>						 
			<input type='hidden' name='idorder' value='$ro[idorder]'>
			<select name='statusorder'>
			<option value='$rod[statusorder]'>Pilih</option>
			<option value='Baru'>Baru</option>
			<option value='Sudah Lunas'>Sudah Lunas</option>
			<option value='Dalam Pengemasan'>Dalam Pengemasan</option>
			<option value='Dalam Pengiriman'>Dalam Pengiriman</option>
			<option value='Sudah Diterima Pembeli'>Sudah Diterima Pembeli</option>
			</select><br>
			<input type='submit' value='Ubah'></td>			
			</form>
			</td>";
			echo "<td>$buktibyr</td>";
			echo "<td align='center'><a href='?p=orderdetail&ido=$ro[idorder]'>Lihat Detail Order</a></td>";
		echo "</tr>";
		$no++;
	}
	echo "</table>";
?>
</fieldset>
</div>

