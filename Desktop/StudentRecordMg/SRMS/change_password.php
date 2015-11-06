<?php
include('includes/queries.php');
include('includes/function.php'); 
include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
?>
<?php 
	//echo "<pre>"; print_r($_POST);
if($_POST['submit'] == "Update"){
	$result=0;
	$password = $_POST['password'];
	//echo "<pre>"; print_r($_POST);
	//print_r($_SESSION);
	$result =update_user_password($_SESSION['login_user'],$_SESSION['usertype'],$password);
	if($result ==1){
		$_SESSION['password']= NULL;
		$_SESSION['passwordconf']= NULL;
		echo "<script>";
			echo 'alert("Password Updated Successfully");';
			echo "window.location.href ='profile.php';";
		echo '</script>';
	}
	else{
		$error = "Try again password update fail";
	}
}
?>

<div id="page" class="container">
  <div id="profile_wrapper">
    <div id="profile_title">
      <h1> 
        <!--Profile--> 
      </h1>
      <br>
    </div>
    <!-- End add_student div -->
    <h1> USER DETAILS </h1>
    <div class="main">
      <form class="form" method="post" action="change_password.php">
      <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
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
            <td><input name="submit" type="submit" value="Update" /></td>
          </tr>
         
        </tbody>
      </table>
      </form>
      
      <!--<a class="button" href=""> LOGOUT </a>--> 
    </div>
    <!-- End add_student div --> 
  </div>
  <!-- End add_student_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
