<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <h3>PIMPINAN</h3>
 <input name="username" type="text" id="username" placeholder="Username">
 <input name="password" type="password" id="password" placeholder="Password">
 <input name="login" type="submit" value="LOGIN PIMPINAN">
</form>

<?php
if($_POST["login"]){
	include "koneksi.php";
	$sqladm = mysql_query("select * from pimpinan where username='$_POST[username]' and password='$_POST[password]'") or die(mysql_error());
	$radm=mysql_fetch_array($sqladm);
	$row=mysql_num_rows($sqladm);
	if($row > 0){
		session_start();
		$_SESSION["useradm"] = $radm["username"];
		$_SESSION["passadm"] = $radm["password"];
		echo "Login Berhasil";
	}else{
		echo "Login Gagal";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>

</fieldset>
</div>
