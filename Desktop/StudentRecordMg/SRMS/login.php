<?php 
$error = '' ;
 if(isset($_POST['submit'])){
	 if(empty($_POST['usertype']) || empty($_POST['email']) ||empty($_POST['password']))
{
		$error = "Username or Password is invalid";
}
else
{
	$dbc = dbConnect('local');
	/*$usertype =mysql_real_escape_string($_POST['usertype']);
	$email =mysql_real_escape_string($_POST['email']);
	$password= mysql_real_escape_string($_POST['password']);*/
	$usertype =$dbc->real_escape_string($_POST['usertype']);
	$email =$dbc->real_escape_string($_POST['email']);
	$password=$dbc->real_escape_string($_POST['password']);
	$result = login_validation($usertype,$email,$password);
	if($result == 1 ){
		redirect_to("profile.php");
	}
	else{
		$error = $result;
	}
 }
 }
?>