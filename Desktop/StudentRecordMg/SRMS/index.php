<?php 
include('includes/function.php');?>
<?php 
session_start();
if(isset($_SESSION["login_user"])){
  redirect_to("profile.php");
}
?>
<?php
include('includes/header.php');

include('login.php');
?>

<div id="page" class="container">
  <div id="login_wrapper">
    <div id="login_title">
      <h1> Login </h1>
    </div>
    <!-- End login_title div -->
    <div class="main">
      <form class="form" method="post" action="index.php">
        <table class="center simpletable">
          <tbody>
            <tr class="name">
              <td><label for="usertype">User Type</label></td>
              <td><select name="usertype" id= "usertype">
                  <option value="administrator">Administrator</option>
                  <option value="advisor">Advisor</option>
                  <option value="chairperson">Chairperson</option>
                </select></td>
            </tr>
            <tr class="email" >
              <td ><label for="email">Gannon Id</label></td>
              <td><input type="" name="email" id="email" required="required"/></td>
            </tr>
            <tr class="password">
              <td><label for="password">Password</label></td>
              <td><input type="password" name="password" id="password" required="required" /></td>
            </tr>
            <tr class="submit">
              <td><input name="submit" type="submit" value="Submit" /></td>
              <td><label for="forgotpassword"><a href="forgot_password.php">Forgot Password ?? </a></label></td>
            </tr>
          <label for="error"><?php echo $error; ?> </label>
          <tr> </tr>
            </tbody>
          
        </table>
      </form>
    </div>
    <!-- End login div --> 
  </div>
  <!-- End login_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
<table width="100%" border="1">
