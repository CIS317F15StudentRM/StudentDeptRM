<?php include('includes/session_define.php'); ?>
<?php 
include('includes/queries.php'); 
include('includes/function.php'); 
//include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--<script src="includes/update_student_table.js"></script>-->
<?php include('includes/update_student_table_js.php');?>

<?php 
	//echo "<pre>"; print_r($_SESSION);

if(isset($_POST['table'][1]['course'])){
	/*echo "batman";
	print_r($_POST);*/
	$course_set = array();
	$credit_set = array();
	$semester_set = array();
	$year_set = array();
	$grade_set = array();
	$course_type_set = array();
	$temp = 1;	
	//print_r($_POST);
	$studentid =$_SESSION['student']['student_id'];
	$course_set = array_column($_POST['table'],'course');
	$credit_set = array_column($_POST['table'],'credit');
	$semester_set = array_column($_POST['table'],'sem');
	$year_set = array_column($_POST['table'],'year');
	$grade_set = array_column($_POST['table'],'grade');
	$course_type_set = array_column($_POST['table'],'coursetype');
	/*echo "<pre>";
	print_r($course_set);
	print_r($credit_set);
	print_r($semester_set);
	print_r($year_set);
	print_r($grade_set);
	print_r($course_type_set);
*/		
	$loop= sizeof($course_set);
	
	//echo $studentid."batman";
	for($i=0; $i<=$loop-1; $i++)
	{
		//echo $studentid;
		$result =student_new_course_details($studentid,$course_set[$i],$credit_set[$i],$semester_set[$i],$year_set[$i],$grade_set[$i],$course_type_set[$i]);
		
	}
		
	
	if($result == 1){
		$_SESSION['student']=$_POST;
		echo "<script>";
		echo 'alert("Student Record Updated Successfully");';
		echo "window.location.href ='update_student_id_details.php';";
		echo '</script>';
		
	}
	else{
		$error = "Student updated data  failed";
		
	}
}
else{
		//echo "deadpool";
		//echo $_POST['table'][1]['course'];
		if(isset($_POST['submit'])){
			$_SESSION['student']=$_POST;
			//print_r($_POST);
			echo "<script>";
			echo 'alert("Student Record Updated Successfully");';
			echo "window.location.href ='update_student_id_details.php';";
			echo '</script>';
		}

}
?>

<div id="page" class="container">
  <div id="add_student_wrapper">
    <div id="add_student_title">
      <h1> Update Student Details </h1>
      <br>
      <h2> Id :<?php echo $_SESSION['student']['student_id'];?> Name : <?php echo $_SESSION['student']['first_name']; echo " ".$_SESSION['student']['last_name'];?></h2>
        <h3>3-Student Courses Details</h3>
    </div>
    <!-- End add_student div -->
    <div class="main">
      <div class="formwrapper">
        
        <form class="form" method="post" action="update_student_course_details.php">
            

          
          <div id="buttondiv"> <a onclick="addrow();" id='anc_add' class="button button-blue center" ><span>Add Course</span></a> </div>
          
          <table id="updatestudentdetails" class="design-table design-table-horizontal design-table-highlight center">
            <thead>
              <tr>
                <th>Course Id</th>
                <th>Credit</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Grade</th>
                <th>Course Type</th>
                <th>Delete Course</th>
              </tr>
            </thead>
            <tbody>
              <!--  <tr>
            <td><select name="course1" id= "course1">
	      <option value="GCIS500">GCIS500</option>
	      <option value="GCIS501">GCIS501</option>
	      <option value="GCIS502">GCIS502</option>
          </select></td>
          <td><input type="" name="credit1" id="credit1"/></td>
          	<td><input type="" name="sem1" id="sem1"/></td>
            <td><input type="" name="grade1" id="grade1"/></td>
            <td><select name="coursetype1" id= "coursetype1">
	      <option value="NR">Foundation</option>
	      <option value="REQ">Required</option>
	      <option value="TR">Elective</option>
          </select></td>
        </tr>-->
              <tr style="display:none"> </tr>
            </tbody>
          </table>
          <br>
          <br>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
        </form>
      </div>
      <div id="buttondiv"> <a href="update_student_course_details.php" id='backbutton' class="button button-blue center" ><span>Add Completed Course</span></a> <a href="update_student_foundation.php" id='homepage' class="button button-blue center"><span>Update Foundation Course</span></a> </div>
      <!-- End add_student div --> 
    </div>
    <!-- End add_student_wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
