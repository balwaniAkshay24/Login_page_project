<?php
require('config.php');

if(isset($_POST['submit'])){

	//Perform the verification of the nation

	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];

	if($email1 == $email2){
	if($pass1 == $pass2){
		
	$name = mysqli_escape_string($link,$_POST['name']);
	$lname = mysqli_escape_string($link,$_POST['lname']);
	$uname = mysqli_escape_string($link,$_POST['uname']);
	$email1 = mysqli_escape_string($link,$email1);
	$email2 = mysqli_escape_string($link,$email2);
	$pass1 = mysqli_escape_string($link,$pass1);
	$pass2 = mysqli_escape_string($link,$pass2);
	
	$pass1 = md5($pass1);

	$sql = mysqli_query($link,"SELECT * FROM `usertable` WHERE `uname` = '$uname'");
	if(mysqli_num_rows($sql) > 0) {
	echo "Sorry, that user already exists.";
	exit();
	}
 
	mysqli_query($link,"INSERT INTO `usertable`(`id`,`name`,`uname`,`lname`,`email`,`pass`) VALUES(NULL,'$name','$uname','$lname','$email1','$pass1')");
	
	}else{
	echo "Sorry, your passwords do not match <br />";
	exit();
	}
	}else{
	echo "Sorry your emails do not match <br /><br />";
}


}else{

$form=<<<EOT
<form action="register.php" method="POST">
First Name : <input type="text" name="name" /><br />
Last Name : <input type="text" name="lname" /><br />
User Name : <input type="text" name="uname" /><br />
Email : <input type="text" name="email1" /><br />
Confirm Email : <input type="text" name="email2" /><br />
Password : <input type="password" name="pass1" /><br />
Confirm Password : <input type="password" name="pass2" /><br />
<input type ="submit" value="Register" name="submit" />
</form>
EOT;
echo $form;

}

?>