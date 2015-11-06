<?php include('includes/queries.php'); ?>
<?php include('includes/function.php');?>
<?php session_start();?>
<?php include('includes/header.php');?>
<?php // print_r($_SESSION); ?>
  <?php if(isset($_SESSION["login_user"])){
  include('includes/menu.php'); 
} ?>
  
  <?php $error = 0;
  if(isset($_GET['token']) && isset($_GET['user'])){
	  $flag=array();
	  $_SESSION['reset']['user']= $_GET['user'];
	  $_SESSION['reset']['usertype']=$_GET['usertype'];
	  $_SESSION['reset']['token'] = $_GET['token'];
	  $flag = check_user_token( $_SESSION['reset']['user'],$_SESSION['reset']['usertype'],$_SESSION['reset']['token']);
	  $flag = sizeof($flag);
	  $_SESSION['reset']['reset_password'] = $flag;
		//echo $flag;
  }
  if(isset($_POST['submit']) &&  $_SESSION['reset']['reset_password'] == 1){
	//  print_r($_POST);
	  $password = $_POST['password'];
	//  $encrpt_password =password_hash($password, PASSWORD_BCRYPT);
	$result =update_user_password($_SESSION['reset']['user'],$_SESSION['reset']['usertype'],$password);
	if($result ==1){
		$user[0]['user_type']=$_SESSION['reset']['usertype'];
		$user[0]['username']=$_SESSION['reset']['user'];
		set_token($user,NULL);
		echo "<script>";
			echo 'alert("Password Updated Successfully");';
			echo "window.location.href ='index.php';";
		echo '</script>';
	}
	else{
		$error = "Try again password update fail";
	}
  }
  ?>
  <div id="page" class="container">
    <div id="wrapper">
      <div id="title">
        <h1>Reset Password</h1>
      </div>
      <!-- End title div -->
      <div class="main">
        <form class="form" method="post" action="reset_password.php">
          <table class="center simpletable">
            <tbody>
              <tr class="password">
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" required="required" /></td>
              </tr>
              <tr class="password">
                <td><label for="password">Reenter Password</label></td>
                <td><input type="password" name="passwordconf" id="passwordconf" required="required" oninput="check(this)"/></td>
              </tr>
              <script language='javascript' type='text/javascript'>
                function check(input) {
                    if (input.value != document.getElementById('password').value) {
                        input.setCustomValidity('The two passwords must match.');
                    } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                   }
                }
                </script>
              <tr class="submit">
                <td><input name="submit" type="submit" value="Submit" /></td>
              </tr>
              <tr> </tr>
            </tbody>
          </table>
        </form>
        <label for="error">
          <?php if(!empty($error))echo $error; ?>
        </label>
      </div>
      <!-- End  div --> 
    </div>
    <!-- End wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
