<?php include('includes/header.php');
include('includes/function.php') ?>
<?php 
	if(isset($_POST["submit"]))
	{
		echo "submited";
		
	}
	else
	{

	}
	?>

<div id="page" class="container">
<div id="login_wrapper">
<div id="login_title">
<h1>
LOGIN
</h1>
</div> <!-- End login_title div -->
<div id="login">
<form class="form" method="post" action="index.php">

	<p class="name">
		  <label for="usertype">User Type</label>
      	  <select name="usertype" id= "usertype">
	      <option value="administrator">Administrator</option>
	      <option value="advisor">Advisor</option>
	      <option value="chairperson">Chairperson</option>
          </select>
	</p>

	<p class="email">
	    <label for="email">E-mail</label>
		<input type="" name="email" id="email" required="required"/>
	</p>

	<p class="password">
   	  <label for="password">Password</label>
	  <input type="password" name="password" id="password" required="required" />
		
  </p>

	<p class="submit">
		<input name="submit" type="submit" value="Submit" />
        <label for="forgotpassword"><a href="#">Forgot Password ?? </a></label>
	</p>

</form>

</div> <!-- End login div -->
</div> <!-- End login_wrapper div -->
</div><!-- End Div Page-->
<?php include('includes/footer.php'); ?>