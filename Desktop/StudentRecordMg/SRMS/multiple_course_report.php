<?php
include('includes/queries.php');
include('includes/function.php'); 
include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');?>
 <?php if(!isset($_SESSION['multiple_course_major'])){
  redirect_to("select_multiple_course_report.php");
}?>
<?php 
$student_list=array();
$major = $_SESSION['multiple_course_major'];
if($major == "ALL"){
	$set =all_major_course();
	$course = $set['required'];
	$fcourse = $set['foundation'];
	$majorlist = getMajorsList();
	$majorlist = array_column($majorlist, 'major');
	for($i=0; $i<sizeof($majorlist); $i++){
		$list['Option'] = $majorlist[$i];
		$student_list=array_merge($student_list,search_student($list));
	}
	$loop2 = sizeof($student_list);
	//echo "<pre>";print_r($student_list);
}
else{
	$set = all_courses($major);
	$course = $set['required'];
		$fcourse= $set['foundation'];

	$list['Option'] = $major;
	$student_list=search_student($list);
	$loop2 = sizeof($student_list);
	//echo "<pre>";print_r($student_list);
}
$loop1=sizeof($course);
//echo "<pre>";print_r($student_list);


//print_r($course);
$loop1=sizeof($course);

?>

<div id="page" class="container">
  <div id="add_student_wrapper">
    <div id="add_student_title">
      <h1> Multiple Course Report </h1>
      <br>
    </div>
    <!-- End add_student div -->
    <div class="main">
      <div class="formwrapper">
      <?php $next_semester = next_semester(); ?>
<h1>Course Report For <?php echo $next_semester[1]." "; ?> <?php echo $next_semester[0]; ?></h1>

        <h2><?php echo $major;?> Major</h2>
        <br>
        <br>
        
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
          <thead>
            <tr>
              <th>Course Id</th>
              <th style="text-align: center">Course Name</th>
              <th style="text-align: center">Number of students who required this course</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($course as $values => $c){ ?>
            <?php $counter = 0;?>
            <tr> 
 			 <td style="text-align: left"><label for="courseid"><a href="course_report_get.php?major=<?php echo $major;?>&coursecode=<?php echo $c['course_code'];?> "> <?php echo $c['course_code'];?> </a></label></td> 
              <td style="text-align: center"><label for="coursename"><?php echo $c['course_name']; ?></label></td>
                            <?php for($s=0; $s<$loop2; $s++){?>
              <?php $student_course = requiredcourses($student_list[$s]);
			 // print_r($student_course);
		

			 if(!empty($student_course['required'])){
			 
				for($a=0; $a<sizeof($student_course['required']); $a++){
					$checksubject = in_array($c['course_code'],$student_course['required'][$a]);
					
					?>
                <?php if($checksubject ==1){
                    	$counter++;
                    }?>
                     
                <?php }?>
                <?php }?>
                <?php } ?> <td style="text-align: center"><label for="required"><?php echo $counter;?></label></td></tr>
                <?php }	?>
                
			<?php foreach($fcourse as $values => $c){ ?>
             <?php // print_r($c);?>
            <?php $fcounter = 0;?>
            	<tr>
             	<td style="text-align: left"><label for="courseid"> <a href="course_report_get.php?major=<?php echo $major;?>&coursecode=<?php echo $c['course_code'];?> "> <?php echo $c['course_code'];?> </a></label></td> 
              <td style="text-align: center"><label for="coursename"><?php echo $c['course_name']; ?></label></td>
				<?php for($i=0; $i<$loop2; $i++){ ?>
               <?php  $student_course = requiredcourses($student_list[$i]);?>
             <?php if(!empty($student_course['foundation'])){ ?>
                   
            <?php for($s=0; $s<sizeof($student_course['foundation']); $s++){
				$checksubjectFoundation = in_array($c['course_code'],$student_course['foundation'][$s]);
				?>
                <?php if($checksubjectFoundation == 1){ ?>
                    <?php 
							$fcounter++;}?>
                <?php }?>

                <?php }?>
              <?php } ?>
            <td style="text-align: center"><label for="required"><?php echo $fcounter; ?></label></td>
            <?php }?>
          
            </tr>
          
          
            </tbody>
          
        </table>
      </div>
      <div id="buttondiv"> <a href="select_multiple_course_report.php" id='backbutton' class="button button-blue center" ><span>Back</span></a> <a href="profile.php" id='homepage' class="button button-blue center"><span>Home</span></a> </div>
    </div>
    <!-- End add_student div --> 
  </div>
  <!-- End add_student_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
