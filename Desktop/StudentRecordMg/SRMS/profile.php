<?php
include('includes/function.php'); 
include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
?>
<?php 
//echo "<pre>"; print_r($_SESSION);

$details = advisor_details($_SESSION['login_user']);
//echo "<pre>"; print_r($details);
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
    <h1> USER DETAILS - SUCKKAA </h1>
    <div class="main">
      <form class="form" method="post" action="change_password.php">
        <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
          <tbody>
            <tr class="name">
              <td><label for="fname">First Name</label></td>
              <td><label for="fname"><?php echo $details[0]['first_name']; ?></label></td>
            </tr>
            <tr class="name">
              <td><label for="lname">Last Name</label></td>
              <td><label for="lname"><?php echo $details[0]['last_name']; ?></label></td>
            </tr>
            <tr class="email" >
              <td ><label for="username">Username</label></td>
              <td ><label for="username"><?php echo $details[0]['username']; ?></label></td>
            </tr>
            <tr class="name" >
              <td ><label for="salutation">Salutation</label></td>
              <td ><label for="salutation"><?php echo $details[0]['salutation']; ?></label></td>
            </tr>
            <tr class="submit">
              <td><input name="submit" type="submit" value="Change Password" /></td>
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
