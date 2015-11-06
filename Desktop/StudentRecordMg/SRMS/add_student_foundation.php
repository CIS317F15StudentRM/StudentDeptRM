<?php 
include('includes/session_define.php');

include('includes/function.php'); 
include('includes/header.php');
include('includes/menu.php');
$error =""; ?>
<?php 
if(!isset($_SESSION['student']['studentid'])){
  redirect_to("select_multiple_student_report.php");
}


if(isset($_POST['submit'])){
	$course_set = array();
	$status_set = array();
	$temp = 1;	
	//echo "<pre>";
	// print_r($_POST);
	@$course_set = array_column($_POST['table'],'course');
	@$status_set =  array_column($_POST['table'],'status');
	
	$loop= sizeof($course_set);
	$studentid=$_SESSION['student']['studentid'];
	//echo $studentid."batman";
	if($loop >= 1 )
	{
	for($i=0; $i<=$loop-1; $i++)
	{
		$result =add_foundatation($studentid,$course_set[$i],$status_set[$i]);
	}
	$success = $result;
	}
	else{
		$success= 1;
	}
	//$result = add_student($values);
	if($success == 1){
		$_SESSION['student']=$_POST;
		echo "<script>";
		echo 'alert("Student Record Added Successfully");';
		echo "window.location.href ='add_student_details.php';";
		echo '</script>';
		
	}
	

}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<?php include('includes/foundation_courses_js.php'); ?>
<div id="page" class="container">
  <div id="add_student_foundation_wrapper">
    <div id="add_student_foundation_title">
      <h1> Add New Student Details </h1>
            <h2> Id :<?php echo $_SESSION['student']['studentid'];?> Name : <?php echo ucfirst($_SESSION['student']['fname']); echo " ".ucfirst($_SESSION['student']['lname']);?></h2>

      <br>
      <h3>2-Student Foundation Courses Details</h3>
    </div>
    <!-- End add_student_foundation div -->
    <div class="main">
      <div id="buttondiv"> <a onclick="addrow();" id='anc_add' class="button button-blue center" ><span>Add Course</span></a> </div>
      <div class="formwrapper">
        <form class="form" method="post" action="add_student_foundation.php">
          <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
            <thead>
              <tr>
                <th>Foundation Course Id</th>
                <th>Course Status</th>
                <th>Delete Course</th>
              </tr>
            </thead>
            <tbody>
              <tr style="display:none"> </tr>
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
          <?php echo $error; ?>
        </form>
      </div>
      <!-- End table form div--> 
    </div>
    <!-- End main div --> 
  </div>
  <!-- End add_student_foundation_wrapper div --> 
</div>
<!-- End Div Page-->

<?php include('includes/footer.php'); ?>
