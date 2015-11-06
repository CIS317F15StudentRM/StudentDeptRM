<?php include('includes/session_define.php'); ?>
<?php include('includes/function.php');?>
<?php 
$error = "";?>
<?php 
if(isset($_POST['submit'])){
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 $values ['ID #']= $_POST['studentid']; 
    
 
	//print_r($values);
	$result = search_student($values);
	//print_r($result);
	
	//print_r($_SESSION['student']);
		if(sizeof($result) == 1 ){
			$_SESSION['student'] = $result[0];
		//$_SESSION['student']['student_id'] = $values ['ID #'];
		//echo $_SESSION['student']['student_id'] ;
		redirect_to("student_report.php");
	}
	else{
		$error = "Student not found";
	}
	
	//$_SESSION['student']=$result[0];
	//echo "iambatman <pre>";
//	print_r($_SESSION);
	/*if($result == 1){
		$_SESSION['student']=$_POST;
		redirect_to("add_student_foundation.php");
	}
	else{
		$error = "Student data enter failed";
	}*/

}
?>
<?php include('includes/header.php');?>
<?php include('includes/menu.php');?>
  <div id="page" class="container">
    <div id="student_id_wrapper">
      <div id="student_id_title">
        <h1>Single Student Report</h1>
      </div>
      <!-- End student_id_title div -->
      <div class="main">
        <form class="form" method="post" action="student_id_report.php">
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
          <?php echo '<p class="error" >'; echo $error;  echo "</p>"; ?>
        </form>
      </div>
      <a href="search_student_id.php" id='anc_add' class="button button-blue center" ><span>Search Student</span></a>
      <!-- End student_id div --> 
    </div>
    <!-- End student_id_wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
