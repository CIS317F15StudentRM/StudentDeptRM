<?php include('includes/session_define.php'); ?>
<?php 
include('includes/queries.php');
include('includes/function.php'); 
include('includes/header.php');
include('includes/menu.php');

?>
<?php 
//echo "<pre>";print_r($_SESSION);
if(empty($_SESSION['student']) || !isset($_SESSION['student'])){
	
	redirect_to("student_id_report.php");
}
	$student_details=  $_SESSION['student'];
	//echo "reprot".$student_details['student_id'];
	//sprint_r($_SESSION['student']);
	$completed = completedcourses($student_details['student_id']);
	$completed_loop = sizeof($completed);
	
	
	$required =	requiredcourses($student_details);
	//echo "<pre>";
	//print_r($required);
	if(!empty($required['required'])){	
		$req_loop = sizeof($required['required']);
	}
	else{
		$req_loop=0;
	}
	
	if(!empty($required['foundation'])){	
		$foundation_loop = sizeof($required['foundation']);
	}
	else{
		$foundation_loop=0;
	}

?>

<div id="page" class="container">
  <div id="add_student_wrapper">
    <div id="add_student_title">
      <?php $next_semester = next_semester(); ?>


      <h1> Student Report For <?php echo $next_semester[1]." "; ?> <?php echo $next_semester[0]; ?></h1>
      <br>
    </div>
    <!-- End add_student div -->
    <div class="main">
      <div class="formwrapper">
        <h3>1-Student Basic Details</h3>
        <table id ="studentdetails" class="center design-table design-table-horizontal design-table-highlight center bigfontsize">
          <tbody >
            <tr class="name">
              <th><label for="studentid">Student Id</label></th>
              <td><label for="studentid"><?php echo $_SESSION['student']['student_id'];?></label></td>
            </tr>
            <tr class="name">
              <th><label for="fname">First Name</label></th>
              <td><label for="fname"><?php echo ucfirst($_SESSION['student']['first_name']);?></label></td>
            </tr>
            <tr class="name">
              <th><label for="lname">Last Name</label></th>
              <td><label for="lname"><?php echo ucfirst($_SESSION['student']['last_name']);?></label></td>
            </tr>
            <tr class="name">
              <th><label for="advisor">Advisor</label></th>
              <?php $a = advisor_details($_SESSION['student']['advisor']);       $advisor = $a[0]['salutation']." ".$a[0]['first_name']." ".$a[0]['last_name'];
 ?>
              <td><label for="advisor"><?php echo $advisor; ?></label></td>
            </tr>
            <tr class="name">
              <th><label for="semester">Start Semester</label></th>
              <td><label for="semester"><?php echo ucfirst($_SESSION['student']['start_semester']); ?></label></td>
            </tr>
            <tr class="name">
              <th><label for="Year">Start Year</label></th>
              <td><label for="Year">
                  <?php  echo $_SESSION['student']['start_year']; ?>
                </label></td>
            </tr>
            <tr class="name">
              <th><label for="major">Major</label></th>
              <td><label for="major"><?php echo $_SESSION['student']['major'];?></label></td>
            </tr>
            
            <!--<tr class="name" >
          <th ><label for="completecredit">Completed Credit</label></th>
      <td><label for="completecredit">27</label></td>
    </tr> -->
            
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <h3>2-Student Completed Courses Details</h3>
      <br>
      <div class="formwrapper">
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
          <thead>
            <tr>
              <th>Course Code</th>
              <th>Credit</th>
              <th>Semester</th>
              <th>Year</th>
              <th>Grade</th>
              <th>Course Type</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0; $i<$completed_loop; $i++){?>
            <tr>
              <td><label for="coursecode"><?php echo $completed[$i]['course_code'];?></label></td>
              <td><label for="credit"><?php echo $completed[$i]['credit'];?></label></td>
              <td><label for="semester"><?php echo $completed[$i]['semester'];?></label></td>
              <td><label for="year"><?php echo $completed[$i]['year'];?></label></td>
              <td><label for="grade"><?php echo $completed[$i]['grade'];?></label></td>
              <td><label for="coursetype"><?php echo $completed[$i]['course_type'];?></label></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <h3>4-Student Remaining Courses Details</h3>
      <br>
      <div class="formwrapper">
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
          
          <thead>
            <tr>
              <th>Course Id</th>
              <th>Credit</th>
              <th>Available Semester</th>
              <th>Course Type</th>
              <th>Prerequisites Required </th>
            </tr>
          </thead>
          <?php $table=array(); ?>
          <tbody>
            <?php if($req_loop > 0){ ?>
            <?php for($i=0; $i<$req_loop; $i++){?>
            <tr <?php checkset($required['required'][$i]['course_set']);?>>
              <td><label for="courseid"><?php echo $required['required'][$i]['course_code']; $table[$i]['course_code']=$required['required'][$i]['course_code'];?></label></td>
              <td><label for="credit"><?php echo $required['required'][$i]['credit']; $table[$i]['credit']=$required['required'][$i]['credit']; ?></label></td>
              <td><label for="sem1">
                  <?php if($required['required'][$i]['course_ava']==1){echo "FALL"; $table[$i]['course_ava']="FALL";}
                                            elseif($required['required'][$i]['course_ava']==2){echo "SPRING";$table[$i]['course_ava']="SPRING";}
                                            elseif($required['required'][$i]['course_ava']==0){echo "FALL and SPRING";$table[$i]['course_ava']="FALL and SPRING";}
                ?>
                </label></td>
              <td><label for="coursetype">Required Course</label><?php $table[$i]['course_type']= "Required Course";?></td>
              <td><label for="coursetype"><?php 
			  
			  		if(array_key_exists('prereq',$required['required'][$i])){
						$loop = sizeof($required['required'][$i]['prereq']);
						//print_r($required['required'][$i]['prereq']);
						if($loop ==1){
							foreach($required['required'][$i]['prereq'] as $k => $val){
								//print_r($val);
								echo $val['course_code'];
							}
							/*echo $required['required'][$i]['prereq'][0]['course_code'];
							$table[$i]['prereq'][0]['course_code']=$required['required'][$i]['prereq'][0]['course_code'];*/
						}
						else{
							for($j=0; $j<$loop; $j++){
								
								if($required['required'][$i]['prereq'][$j]['set'] == 0 ){
									echo $required['required'][$i]['prereq'][$j]['course_code'];
									echo "  ";
							$table[$i]['prereq'][$j]['course_code']=$required['required'][$i]['prereq'][$j]['course_code']." ";
								}
								elseif($required['required'][$i]['prereq'][$j]['set'] == 2){
									echo $required['required'][$i]['prereq'][$j]['course_code'];
									echo " <strong>OR </strong>";
							$table[$i]['prereq'][$j]['course_code']=$required['required'][$i]['prereq'][$j]['course_code']." <strong>OR </strong>";
								}
								if($required['required'][$i]['prereq'][$j]['set'] == 3 ){
									echo " <strong>AND </strong>";
									echo $required['required'][$i]['prereq'][$j]['course_code'];
							$table[$i]['prereq'][$j]['course_code']="<strong>AND</strong> ".$required['required'][$i]['prereq'][$j]['course_code'];
								}
							}
						}
					}
					else{
						echo "None";
						$table[$i]['prereq'][0]['course_code']="NONE";	
					}
				?></label></td>
            </tr>
            <?php }?>
            <?php } ?>
            <?php if($foundation_loop > 0){ 
				$foundation_table = array();?>
            
            <tr ><td colspan="5"> <h1> Foundation Details </h1> </td> </tr>
            <?php for($i=0; $i<$foundation_loop; $i++){?>
            <tr <?php checkset($required['foundation'][$i]['course_set'])?>>
              <td><label for="courseid"><?php echo $required['foundation'][$i]['course_code']; $foundation_table[$i]['course_code']=$required['foundation'][$i]['course_code']?></label></td>
              <td><label for="credit"><?php echo $required['foundation'][$i]['credit'];$foundation_table[$i]['credit']=$required['foundation'][$i]['credit']?></label></td>
              <td><label for="sem1">
                  <?php if($required['foundation'][$i]['course_ava']==1){echo "FALL";$foundation_table[$i]['course_ava']= "FALL";}
                                            elseif($required['foundation'][$i]['course_ava']==2){echo "SPRING"; $foundation_table[$i]['course_ava']= "SPRING";}
                                            elseif($required['foundation'][$i]['course_ava']==0){echo "FALL and SPRING";$foundation_table[$i]['course_ava']= "FALL and SPRING";}
                ?>
                </label></td>
              <td><label for="coursetype">Foundation Course<?php $foundation_table[$i]['coursetype']="Foundation Course";?></label></td>
              <td><label for="coursetype">None</label><?php $foundation_table[$i]['prereq']= "None";?></td>
            </tr>
            <?php }?>
            <?php } ?>
          </tbody>
        </table>
        <?php 
		//asort($table);
		//array_multisort($table,SORT_ASC);
		//echo "<pre>"; print_r($table);
		//echo "<pre>"; print_r($foundation_table);
		?>
        <?php  function prereqshort($a, $b)
				{
					return strcmp($a["prereq"][0]['course_code'], $b["prereq"][0]['course_code']);
				}
/*		  usort($table, "prereqshort");
		  echo "<pre>";print_r($table);*/
		  /*function course_ava($a, $b)
				{
					return strcmp($a["course_ava"], $b["course_ava"]);
				}
		  usort($table, "course_ava");
		  echo "<pre>";print_r($table);*/
		  function credit($a, $b)
				{
					return strcmp($a["credit"], $b["credit"]);
				}
		  usort($table, "credit");
		 // echo "<pre>";print_r($table);
		  
		  ?>
      </div>
      <div id="buttondiv"> <a href="student_id_report.php" id='backbutton' class="button button-blue center" ><span>Back</span></a> <a href="profile.php" id='homepage' class="button button-blue center"><span>Home</span></a> </div>
    </div>
    <!-- End add_student div --> 
  </div>
  <!-- End add_student_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
