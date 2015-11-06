<?php include('includes/queries.php'); ?>
<?php include('includes/function.php');?>
<?php session_start();?>
<?php include('includes/header.php');?>
  <?php  $error = 0;?>
  <?php
  if(isset($_POST['submit'])){
	  $user_details = user_exists($_POST['email'],$_POST['usertype']);
	 // print_r($user_details);
	  if(sizeof($user_details) != 1){
		  $error = "User not Found";
	  }
	  else{
		  $mail = send_mail($user_details);
	  }
  }
  ?>
  <div id="page" class="container">
    <div id="wrapper">
      <div id="title">
        <h1>Forgot Password</h1>
      </div>
      <!-- End title div -->
      <div class="main">
        <form class="form" method="post" action="forgot_password.php">
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
              <tr class="submit">
                <td><input name="submit" type="submit" value="Submit" /></td>
              </tr>
            
            <tr> </tr>
              </tbody>
            
          </table>
        </form>
        <label for="error"><?php if(!empty($error))echo $error; ?> </label>
      </div>
      <!-- End  div --> 
    </div>
    <!-- End wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
