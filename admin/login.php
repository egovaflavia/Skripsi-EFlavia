<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <h3>ADMINISTRATOR</h3>
 <input name="username" type="text" id="username" placeholder="Username">
 <input name="password" type="password" id="password" placeholder="Password">
 <input name="login" type="submit" value="LOGIN ADMINISTRATOR">
</form>

<?php
if($_POST["login"]){
	$sqladm = mysql_query("select * from admin where username='$_POST[username]' and password='$_POST[password]'");
	$radm = mysql_fetch_array($sqladm);
	$row  = mysql_num_rows($sqladm);
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
