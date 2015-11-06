<?php include('includes/session_define.php'); ?>
<?php 
include('includes/queries.php'); 
include('includes/function.php'); 
include('includes/header.php');
include('includes/foundation_courses_js.php');
include('includes/menu.php');
$error =""; ?>
<?php if(!isset($_SESSION['student']['student_id'])){
  redirect_to("update_student_id_details.php");
} ?>
<?php 
//echo "<pre>";print_r($_SESSION);
$studentid= $_SESSION['student']['student_id'];

//echo $studentid;
$loop ="";
if(isset($_POST['submit'])){
	if(isset($_POST['table'][0]['oldcourse'])){
		$course_set = array();
		$status_set = array();
		$oldloop = 0;
		//  echo "<pre>";
	//	 print_r($_POST);
		  $old_course_set=  array_column($_POST['table'],'oldcourse');
		 $old_status_set=  array_column($_POST['table'],'oldstatus');
		 $old_course_id= array_column($_POST['table'],'old_course_id');
		 $oldloop= sizeof($old_course_set);
		 if($oldloop >=1){
			 
			 for($i=0; $i<=$oldloop-1; $i++)
			{
							 echo "in add new studnet deadpool";

				//$oldresult =update_student_foundation_courses($old_course_id[$i],$old_course_set[$i], $old_status_set[$i]);
			}
		 }
	}
	if(isset($_POST['table'][0]['course'])){

		$course_set = array();
		$status_set = array();
		$temp = 1;
		$newloop =0;	
		$newresult = 0;
		//  echo "<pre>";
	//	 print_r($_POST);
		 $course_set = array_column($_POST['table'],'course');
		 $status_set =  array_column($_POST['table'],'status');
		 $newloop= sizeof($course_set);
		 //print_r($old_course_id);
		// print_r($course_set);
		// print_r($status_set);
		 if($newloop >=1){
			for($i=0; $i<=$newloop-1; $i++)
			{
			// echo "in add new studnet batman";
				$newresult =add_foundatation($studentid,$course_set[$i], $status_set[$i]);
			} 
		 }
		redirect_to('update_student_course_details.php');	
	}
	else{
		//echo "<pre>"; print_r($_POST);
		//echo "i am wolverine";
			redirect_to('update_student_course_details.php');	

	}
	 
	 
	 /*if($result == 1){
		$_SESSION['student']=$_POST;
		echo "<script>";
		echo 'alert("Student Record Added Successfully");';
		echo "window.location.href ='profile.php';";
		echo '</script>';
		
	}
	else{
		$error = "Student Update enter failed";
		
	} */
	 
/*	foreach($_POST as $receive){
		
		if(strcasecmp($receive,"submit")!=0)
		{
			if($temp%2 == 0)
			{
				array_push($status_set,$receive);
				//echo $temp."==".$receive;
				//echo "<pre>";
			}
			else
			{
				array_push($course_set,$receive);
				//echo $temp."==".$receive;echo "<pre>";
			}
			$temp++;
		}
	}
	
	$loop= sizeof($course_set);
	
	//echo $studentid."batman";
	for($i=0; $i<=$loop-1; $i++)
	{
		$result =add_foundatation($studentid,$course_set[$i],$status_set[$i]);
	}
		
	//$result = add_student($values);
	if($result == 1){
		$_SESSION['student']=$_POST;
		echo "<script>";
		echo 'alert("Student Record Added Successfully");';
		echo "window.location.href ='profile.php';";
		echo '</script>';
		
	}
	else{
		$error = "Student data enter failed";
		
	} */
}
else{
	$resultselect = select_all_foundation($studentid);
	// echo "i am batman";
	// print_r($resultselect);
	 $current_course_set = array();
	 $current_status_set = array();
	 $current_course_id=array();
	 $current_course_set=  array_column($resultselect,'course_code');
	 $current_status_set=  array_column($resultselect,'course_status');
	 $current_course_id=   array_column($resultselect,'student_foundation_course_id');
	 //echo "<pre>";
	// print_r($current_course_id);
	// print_r($current_status_set);
	 $loop= sizeof($current_course_set);
}




?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="page" class="container">
  <div id="add_student_foundation_wrapper">
    <div id="add_student_foundation_title">
      <h1> Update Student Details </h1>
      <br>
      <h2> Id :<?php echo $_SESSION['student']['student_id'];?> Name : <?php echo $_SESSION['student']['first_name']; echo " ".$_SESSION['student']['last_name'];?></h2>
      <h3>2-Student Foundation Courses Details</h3>
    </div>
    <!-- End add_student_foundation div -->
    <div class="main">
      <div id="buttondiv"> <a onclick="addrow();" id='anc_add' class="button button-blue center" ><span>Add Course</span></a> </div>
      <div class="formwrapper">
        <form class="form" method="post" action="update_student_foundation.php">
          <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
            <thead>
              <tr>
                <th>Foundation Course Id</th>
                <th>Course Status</th>
                <th>Delete Course</th>
              </tr>
            </thead>
            <tbody>
              <?php	
				
			  for($i=0; $i<=$loop-1; $i++)
			  {?>
              <tr style="display:none">
                <input type="hidden" name="table[<?php echo $i; ?>][old_course_id]" id="old_course_id<?php echo $i;?>" value="<?php echo$current_course_id[$i];?>" />
              </tr>
              <tr id = "oldrow<?php echo $i; ?>">
                <td><select name="table[<?php echo $i; ?>][oldcourse]" id="oldcourse<?php echo $i; ?> ">
                    <?php 
					
	foreach($option as $courseoption) 	
	{	
		echo $courseoption;
		if(strcasecmp($courseoption,$current_course_set[$i] )== 0)
		{
			echo '<option value="'.$courseoption.'" selected >'.$courseoption.'</option>';
		}
		else{
		echo '<option value="'.$courseoption.'">'.$courseoption.'</option>';
		}
	
	}?>
                  </select></td>
                <td><select name="table[<?php echo $i; ?>][oldstatus]" id= "oldstatus<?php echo $i; ?>">
                    <option value="NR" <?php if(strcasecmp($current_status_set[$i],"NR")==0) echo " selected" ?>>Not Req with Major</option>
                    <option value="REQ" <?php if(strcasecmp($current_status_set[$i],"REQ")==0) echo " selected" ?>>Required</option>
                    <option value="TR" <?php if(strcasecmp($current_status_set[$i],"TR")==0) echo " selected" ?>>Waived Course</option>
                  </select></td>
                <td></td>
              </tr>
              <?php  }?>
              <tr style="display:none"> </tr>
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
          <?php echo $error; ?>
        </form>
      </div>
    <div id="buttondiv"> <a href="update_student_course_details.php" id='backbutton' class="button button-blue center" ><span>Add Completed Course</span></a> <a href="update_student_details.php" id='homepage' class="button button-blue center"><span>Basic Details</span></a> </div>

      <!-- End table form div--> 
    </div>
    <!-- End main div --> 
  </div>
  <!-- End add_student_foundation_wrapper div --> 
</div>
<!-- End Div Page-->

<?php include('includes/footer.php'); ?>
