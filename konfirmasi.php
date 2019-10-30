<style type="text/css" media="all">
<!--
@import url("konfirmasi.css");
-->
</style>
<div id="formadd">
<fieldset>
<h3>KONFIRMASI PEMBAYARAN</h3>
<form name="form1" method="get" action="" enctype="multipart/form-data">
	<div class="dh10">
		<input type="hidden" name="p" value="<?php echo "$_GET[p]"; ?>" />
		<input type="hidden" name="ida" value="<?php echo "$_GET[ida]"; ?>" />
		<input type="text" name="noorder" placeholder="Masukkan No Order" value="<?php echo "$_GET[noorder]"; ?>"/>
	</div>
	<div class="dh1"><input type="submit"  value="Cari  " /></div>
	<div class="dh1">&nbsp;</div>
</form>
<?php 
	include "koneksi.php";
	$sqlo = mysql_query("select * from orders where idorder='$_GET[noorder]'");
	$ro = mysql_fetch_array($sqlo);
	if($ro["idanggota"]==$_GET["ida"]){
		if($ro["statusorder"]=="Baru"){
			$sqla = mysql_query("select * from anggota where idanggota='$ro[idanggota]'");
			$ra = mysql_fetch_array($sqla);
			$total = $ro["total"];
			$sqlbyr = mysql_query("select * from konfirmasibayar where idorder='$ro[idorder]'");
			$rbyr = mysql_fetch_array($sqlbyr);
			if($rbyr["idorder"]==$ro["idorder"]){
				echo "<p>&nbsp;</p>
				<p>&nbsp;</p>
				Pembayaran untuk No. Order <b>$_GET[noorder]</b> sudah dikonfirmasi";
			}else{
?>
	<form name="form1" method="post" action="" enctype="multipart/form-data">
	  <input name="idorder" type="hidden" value="<?php echo "$ro[idorder]"; ?>"> 
	  <input name="tglorder" type="text" readonly="readonly" value="<?php echo "Tanggal Order : $ro[tglorder] WIB"; ?>">  
	  <input name="namaanggota" type="text" readonly="readonly" value="<?php echo "Atas nama : $ra[namalengkap]"; ?>">  
	  <input name="total" type="text" readonly="readonly" value="<?php echo "Sebesar : Rp $total"; ?>">  <p>
	  <h3>Dari Rekening</h3>
	  <p>
	  <label> Nama Bank Pengirim :</label>
	  <input name="namabankpengirim" type="text" id="namabankpengirim" placeholder="Nama Bank Pengirim">
	  </p>
	  <p>
      <label> Nama Pengirim :</label>
	  <input name="namapengirim" type="text" id="namapengirim" placeholder="Nama Pengirim">
	  </p>
	  <p>
      <label> Jumlah Transfer :</label>
	  <input name="jumlahtransfer" type="text" id="jumlahtransfer" placeholder="Jumlah Transfer">
	  </p>
	  <p>
      <label> Tanggal Transfer :</label>
	  <input name="tgltransfer" type="date" id="tgltransfer"><p>
	  <h3>Ke Rekening</h3>
	  <input name="namabankpenerima" type="text" id="namabankpenerima" value="5544 0101 2262 6253 2 A/N ISRA MIHARTIN " readonly="readonly">
	  <h3>Bukti Transfer</h3>
	  <input name="bukti" type="file" placeholder="Nama Bank Penerima">
	  <input type="submit" name="konfirmasi" value="KONFIRMASI PEMBAYARAN">
	</form>

<?php
			
			}
		}else{
			echo "<p>&nbsp;</p>
			<p>&nbsp;</p>
			Status order anda <b>$ro[statusorder]</b>";
		}
	}else{
		echo "<p>&nbsp;</p>
		<p>&nbsp;</p>
		No Order <b>$_GET[noorder]</b>, Bukan Pesanan Anda </b>";
	}
?>


</fieldset>
</div>

<?php
if($_POST["konfirmasi"]){
	include "koneksi.php";
	
	$bukti  = $_FILES['bukti']['name'];
	$lokbukti = $_FILES['bukti']['tmp_name'];
	
	move_uploaded_file($lokbukti, "buktibayar/$bukti");
	
	$sqlbyr = mysql_query("insert into konfirmasibayar (idorder, namabankpengirim, namapengirim, jumlahtransfer, tgltransfer, namabankpenerima, bukti) values ('$_POST[idorder]', '$_POST[namabankpengirim]', '$_POST[namapengirim]', '$_POST[jumlahtransfer]', '$_POST[tgltransfer]', '$_POST[namabankpenerima]', '$bukti')");
	
	if($sqlbyr){
		echo "Pembayaran telah dikonfirmasi";
	}else{
		echo "Konfirmasi Gagal";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
