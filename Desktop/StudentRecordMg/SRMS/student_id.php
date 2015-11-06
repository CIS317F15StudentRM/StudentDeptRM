<?php include('includes/session_define.php'); ?>
<?php include('includes/function.php');?>
<?php 
if(isset($_POST['submit'])){
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 $values= $_POST['studentid']; 
    //print_r($values);
	$result = search_student($values);
	if($result == 1 ){
		redirect_to("add_student_details.php");
	}
	else{
		$error = $result;
	}
}
?>
<?php include('includes/header.php');?>
<?php include('includes/menu.php');?>
  <div id="page" class="container">
    <div id="wrapper">
      <div id="title">
        <h1> Student Id </h1>
      </div>
      <!-- End title div -->
      <div class="main">
        <form class="form" method="post" action="student_id.php">
          <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
            <tbody>
              <tr class="name">
                <td><label for="studentid">Student Id</label></td>
                <td><input type="" name="studentid" id="studentid" required="required"/></td>
              </tr>
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
          <?php echo $error; ?>
        </form>
      </div>
   <a href="search_student_id.php" id='anc_add' class="button button-blue center" ><span>Search Student</span></a>
      <!-- End  div --> 
    </div>
    <!-- End wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
