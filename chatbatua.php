<fieldset>
<h2 align="center">Chat</h2>
<style type="text/css" media="all">
<!--
@import url("chss.css");
-->
</style>	
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <div style="overflow:auto; width:30%; height:200px; margin-left:35%;margin-right:35%;">
	<table border="0" cellspacing="0" cellpadding="0" style=" margin: 0; width: 100%;">
		<tbody>
		<?php
			//*koneksi ke database*//
			include "koneksi.php";
			$Tampil="SELECT * FROM chat ORDER BY waktu DESC LIMIT 99;";
			$query = mysql_query($Tampil);
			while (	$hasil = mysql_fetch_array ($query)) {
				$komen = stripslashes ($hasil['komen']);
				$waktu = stripslashes ($hasil['waktu']);
				$nama = stripslashes ($hasil['nama']);	
			?>	
			<!--?php
			//*koneksi ke database*//
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "dbistana";
	
	$kon = mysql_connect($host,$user,$pass);
	$kondb = mysql_select_db($db, $kon);
		
			$Tampil="SELECT * FROM chat ORDER BY waktu DESC LIMIT 99;";
			$query = mysql_query($Tampil);
			while (	$hasil = mysql_fetch_array ($query)) {
				$komen = stripslashes ($hasil['komen']);
				$waktu = stripslashes ($hasil['waktu']);
				$nama = stripslashes ($hasil['nama']);	
			?-->	
			<?php
			echo"
				<div id='atas'>$hasil[nama]<span class='waktu'>$hasil[waktu]</span></div>
				<div id='pesan'>$hasil[komen]</div>";
			}
			?>
		</tbody>
	</table>  
</div>
</form>
<div style="width:30%; height:350px; margin-left:35%;margin-right:35%;">
<form method="POST" name="chat" action="#" enctype="application/x-www-form-urlencoded">
<p><b>Post your chat:<b><br><input type="text" placeholder=" Nama Anda" name="nama" maxlength="30" style="width: 95%;"></input><br>
<br><input type="text" placeholder=" Alamat email Anda" name="email" maxlength="30" style="width: 95%;"></input><br>
<br><textarea placeholder=" Obrolan Anda" name="komen" rows="2" cols="40" maxlength="120" style="width: 95%;"></textarea><br>
<br><input type="checkbox" name="cek" value="cek" class="art-button"> Confirm you are NOT a spammer</input><br>
<br><input type="submit" name="submit" value="Send" class="art-button"></input>
<input type="submit" name="reset" value="Clear" class="art-button"></input>
	<?php
		if (isset($_POST['submit'])) {
		$nama	= $_POST['nama'];
		$email	= $_POST['email'];
		$komen	= $_POST['komen'];
		$waktu	= date ("Y-m-d, H:i a");
		$cek	= $_POST['cek'];
		if ($_POST['nama']=='Admin') { //validasi kata admin
	?>
		<script language="JavaScript">
			alert('Anda bukan Admin !');
				'location:?p=chatbatua;'
		</script>
	<?php
		mysql_close($Open);
	}
		if (empty($_POST['nama'])|| empty($_POST['email']) || empty($_POST['komen'])) { //validasi data
	?>
		<script language="JavaScript">
			alert('Data yang Anda masukan tidak lengkap !');
				'location:?p=chatbatua;'
			</script>
	<?php
	}
		if (empty($_POST['cek'])) { //validasi data
	?>
		<script language="JavaScript">
			alert('Please Checklist - Confirm you are NOT a spammer !');
		'location:?p=chatbatua;'
		</script>
	<?php
	}
	else {
		$input_chat = "INSERT INTO chat (nama, email, komen, waktu, cek) VALUES ('$nama', '$email', '$komen', '$waktu', '$cek')";
		$query_input =mysql_query($input_chat);
		if ($query_input) {
	?>
		<META HTTP-EQUIV='Refresh' Content='1'>
	<?php
	}
	else{
		echo'Dbase E';
	}
	}
	}
	mysql_close($Open);
	?>
</form>
</fieldset>