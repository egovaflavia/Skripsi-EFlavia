<div id="formadd">
<fieldset>
	<h2>Laporan Bulanan<h2>
	<form method='get'>						 
		<label>Pilih Bulan dan Tahun</label><br>
		<input type="hidden" name="p" value="laporanbulanan">
		<select name='bln' style="width: 20%">
			<option value="" disabled="" selected> Pilih Bulan </option>
			<?php
			$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			$jlh_bln=count($bulan);
			for($c=1; $c<$jlh_bln; $c+=1){
				if($c == $_GET['bln']){
					echo"<option value=$c selected> $bulan[$c] </option>";
				}else{
					echo"<option value=$c> $bulan[$c] </option>";
				}
			}
			?>
		</select> - 
		<select name='thn' style="width: 20%">
			<option value="" disabled="" selected> Pilih Tahun </option>
			<?php
			$now=date('Y');
			for ($a=2012;$a<=$now;$a++)
			{
			     if($a == $_GET['thn']){
			     	echo "<option value='$a' selected>$a</option>";
			     }else{
			     	echo "<option value='$a'>$a</option>";
			     }
			} ?>
		</select><br>
		<input type='submit' value='Cari' style="width: 20%"></td>			
	</form>
<?php
	include "koneksi.php";

	if(isset($_GET['bln']) && isset($_GET['thn']) ){
	$sql = "select sum(c.jumlahbeli*d.hargaproduk) as ttl,a.tgltransfer,b.idorder,e.namalengkap,alamat,nohp,d.namaproduk,hargaproduk,c.jumlahbeli from konfirmasibayar a, orders b,orderdetail c, produk d,anggota e where a.idorder=b.idorder and a.idorder=c.idorder and c.idproduk=d.idproduk and b.idanggota=e.idanggota and MONTH(a.tgltransfer)=$_GET[bln] and YEAR(a.tgltransfer)=$_GET[thn] group by b.idanggota ";
	}
	$sqlo = mysql_query($sql);

	$hasil  = mysql_num_rows($sqlo);

	if($hasil > 0){

	echo "<form method='get'  action='cetakbulanan.php' target='_blank'>						 
		<input type='hidden' name='bln' value='$_GET[bln]'>
		<input type='hidden' name='thn' value='$_GET[thn]'>
		<input type='submit' value='Cetak' style='width: 20%'></td>			
	</form>";

	echo "<table border='0'>";
	echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Nama Pemesan</th>";
		echo "<th>Nama Produk</th>";
		echo "<th>Tanggal Transfer</th>";
		echo "<th>Subtotal</th>";
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
			echo "<td>$ro[namalengkap]</td>";
			echo "<td>$ro[namaproduk]</td>";
			echo "<td>$ro[tgltransfer]</td>";
			echo "<td>$ro[ttl]</td>";
			$ttl += $ro[ttl];
		echo "</tr>";
		$no++;
	}
	echo "<tr>";
		echo "<td align='center' colspan='4'>Total</td>";
		echo "<td align='center'>$ttl</td>";
	echo "</tr>";
	echo "</table>";
	}
?>
</fieldset>
</div>

