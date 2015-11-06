<?php 
include('includes/queries.php');
include('includes/function.php'); 
include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');?>

<div id="page" class="container">
  <div id="add_student_wrapper">
    <div id="add_student_title">
   <?php if(!isset($_SESSION['single_course_major'])){
  redirect_to("select_single_course_report.php");
}?>
      <?php 
	  $student_list=array();
//echo "<pre>";
//print_r($_SESSION['single_course']);
//print_r($_SESSION['single_course_major']);
$major = $_SESSION['single_course_major'];
if($major == "ALL"){
	$set =all_major_course();
		$required_set = array_column($set['required'],'course_code');
	//echo "<pre>"; print_r($required_set);
	
	$foundation_set = array_column($set['foundation'],'course_code');
	//echo "<pre>"; print_r($foundation_set);
	$majorlist=getMajorsList();
	$majorlist = array_column($majorlist, 'major');
	for($i=0; $i<sizeof($majorlist); $i++){
		$list['Option'] = $majorlist[$i];
		$student_list=array_merge($student_list,search_student($list));
	}
	$size_student_list = sizeof($student_list);
	//echo "<pre>";print_r($student_list);
}
else{
	$set = all_courses($major);
	$required_set = array_column($set['required'],'course_code');
	//echo "<pre>"; print_r($required_set);
	
	$foundation_set = array_column($set['foundation'],'course_code');
	//echo "<pre>"; print_r($foundation_set);	
	$list['Option'] = $major;
	$student_list=search_student($list);
	$size_student_list = sizeof($student_list);
	//echo "<pre>";print_r($student_list);

}

//echo "<pre>";print_r($student_list);
?>
<?php $next_semester = next_semester(); ?>
<h1>Course Report For <?php echo $next_semester[1]." "; ?> <?php echo $next_semester[0]; ?></h1>
<h1>Major <?php echo $major; ?> </h1>
      <form class="form" method="post" action="course_report.php">
        <table>
          <tr class="name">
            <td><label for="course">Select Course</label></td>
            <td><select name="coursecode" id="coursecode">
            <optgroup label="Require Courses">	
           <?php	foreach($required_set as $option){
			   
			   echo '<option value="'.$option.'"';
				if(isset($_POST['submit'])){
					
					if($_POST['coursecode']==$option){
						
						echo " selected";
					}
				}
				
				echo '>'.$option.'</option>';
			}?>
			</optgroup>
            <optgroup label="Foundation Courses">	
           <?php	foreach($foundation_set as $option){
			   
			   echo '<option value="'.$option.'"';
				if(isset($_POST['submit'])){
					
					if($_POST['coursecode']==$option){
						
						echo " selected";
					}
				}
				
				echo '>'.$option.'</option>';
			}?>
			</optgroup>
			
		
		
		
          </select></td>
          </tr>
        </table>
        <p class="submit" align="center">
          <input name="submit" type="submit" value="Submit" />
          <br>
      </form>
      <?php if(isset($_POST['submit'])) {
		$coursecode = $_POST['coursecode']?>
      <h1> Course Report <?php echo $coursecode ?></h1>
      <br>
    </div>
    <!-- End add_student div -->
    <div class="main">
      <div class="formwrapper">
        <h2></h2>
        <br>
        <br>
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
          <thead>
            <tr>
              <th>Student Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Advisor</th>
              <th>Course Type</th>
              <th> Prerequired courses</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0; $i<$size_student_list; $i++){ ?>
            <?php $student_course = requiredcourses($student_list[$i]);
				//echo "<pre>";print_r($student_course);
				for($s=0; $s<sizeof($student_course['required']); $s++){
					if(!empty($student_course['required'][$s])){	
					
					$checksubject = in_array($coursecode,$student_course['required'][$s]);
					/*echo $student_list[$i]['student_id']." $coursecode <pre>";
					print_r($student_course['required'][$s]);
					echo "result <br>";
					print_r($checksubject);*/
					?>
					<?php if($checksubject ==1){ ?>
						<tr>
						  <td><label for="studentid"><?php echo $student_list[$i]['student_id']; ?></label></td>
						  <td><label for="fname"><?php echo $student_list[$i]['first_name']; ?></label></td>
						  <td><label for="lanme"><?php echo $student_list[$i]['last_name']; ?></label></td>
						  <td><label for="advisor"><?php echo $student_list[$i]['advisor']; ?></label></td>
						  <td><label for="coursetype">Required</label></td>
						  <td><label for="coursetype"><?php 
				  
						if(array_key_exists('prereq',$student_course['required'][$s])){
							$loop = sizeof($student_course['required'][$s]['prereq']);
							if($loop ==1){
								echo $student_course['required'][$s]['prereq'][0]['course_code'];
	
							}
							else{
								for($j=0; $j<$loop; $j++){
									
									if($student_course['required'][$s]['prereq'][$j]['set'] == 0 ){
										echo $student_course['required'][$s]['prereq'][$j]['course_code'];
										echo "  ";
									}
									elseif($student_course['required'][$s]['prereq'][$j]['set'] == 2){
										echo $student_course['required'][$s]['prereq'][$j]['course_code'];
										echo " <strong>OR </strong>";
										
									}
									if($student_course['required'][$s]['prereq'][$j]['set'] == 3 ){
										echo " <strong>AND </strong>";
										echo $student_course['required'][$s]['prereq'][$j]['course_code'];
									}
								}
							}
						}
						else{
							echo "None";
						}
					?></label></td>
						</tr>
						<?php }?>
					<?php }}?>
                 <?php if(!empty($student_course['foundation'])){ ?>
            <?php for($s=0; $s<sizeof($student_course['foundation']); $s++){
				$checksubject = in_array($coursecode,$student_course['foundation'][$s]);
				/*echo $student_list[$i]['student_id']." $coursecode <pre>";
				print_r($student_course['required'][$s]);
				echo "result <br>";
				print_r($checksubject);*/
				?>
                <?php if($checksubject ==1){ ?>
                    <tr>
                      <td><label for="studentid"><?php echo $student_list[$i]['student_id']; ?></label></td>
                      <td><label for="fname"><?php echo $student_list[$i]['first_name']; ?></label></td>
                      <td><label for="lanme"><?php echo $student_list[$i]['last_name']; ?></label></td>
                      <td><label for="advisor"><?php echo $student_list[$i]['advisor']; ?></label></td>
                      <td><label for="coursetype">Foundation</label></td>
                      <td><label for="Prereq">NONE</label></td>
                    </tr>
                    <?php }?>
                <?php }?>
                <?php }?>
            <?php }// echo sizeof($student_course['foundation']);?>
            
           
          </tbody>
        </table>
      </div>
      <?php }?>
      <?php if(!isset($_POST['submit'])) {?>
      <br>
      <br>
      <br>
      <?php }?>
      <div id="buttondiv"> <a href="select_single_course_report.php" id='backbutton' class="button button-blue center" ><span>Back</span></a> <a href="profile.php" id='homepage' class="button button-blue center"><span>Home</span></a> </div>
    </div>
    <!-- End add_student div --> 
  </div>
  <!-- End add_student_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
