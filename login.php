<?php
require('config.php');

if(isset($_POST['submit'])){
	$uname = mysqli_escape_string($link,$_POST['uname']);	
	$pass = mysqli_escape_string($link,$_POST['pass']);
	$pass = md5($pass);

	$sql = mysqli_query($link,"SELECT * FROM `usertable` WHERE `uname` = '$uname' AND `pass` = '$pass'");
	if(mysqli_num_rowS($sql) > 0 ) {
echo "You have Logged In Sucessfully.";
	exit();	
}
else{echo "Wrong U/P Combination";
}	


}else{
	$form=<<<EOT
<form action="login.php" method="POST">
Username: <input type="text" name="uname"/><br />
Password: <input type="password" name="pass"/><br />
<input type="submit" name="submit" value="Log in" />
</form>
EOT;
echo $form;
}


?>