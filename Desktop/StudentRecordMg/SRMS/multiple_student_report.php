<?php 
include('includes/queries.php');
include('includes/function.php'); 
//include('includes/session_define.php');
include('includes/session_define.php');

include('includes/header.php');
include('includes/menu.php');?>
<?php if(!isset($_SESSION['student_list'])){
  redirect_to("add_student_details.php");
} ?>
<?php
	//echo "<pre>";
	//print_r($_SESSION['student_list']);
	$values = $_SESSION['student_list'];
	$predatabase = studentcurriculum($values[0]['student_id']);
	$req_databasename = $predatabase."_req_courses";
	$foundation_database =  $predatabase."_foundation_courses";
	$number_of_student = sizeof($values);
	$all_req = getRequiredCourses($req_databasename);
	$all_foundation = getFoundationCourses($foundation_database);
	//print_r($all_req);
	//echo "number of student $number_of_student";
?>

<div id="page" class="container">
  <div id="add_student_wrapper">
    <div id="add_student_title">
          <?php $next_semester = next_semester(); ?>

      <h1> Multiple Student Report For <?php echo $next_semester[1]." "; ?> <?php echo $next_semester[0]; ?></h1>
 </h1>
      <br>
      <h1>Major <?php echo $values[0]['major'];?> </h1>
    </div>
    <!-- End add_student div -->
    <div class="main">
      <div class="formwrapper">
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
       	<colgroup>
        <col></col><col></col><col></col>
        <?php for($c=0; $c<sizeof($all_req); $c++){?>
        <?php 
		echo "<col ";
		checkset2($all_req[$c]['course_set']);
		echo "></col>";
		?>
        <?php }?>
        </colgroup>
          <thead>
            <tr>
              <th>Student Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <?php for($c=0; $c<sizeof($all_req); $c++){?>
              <?php echo "<th>"; 
			//  echo $all_req[$c]['course_code'];
			echo substr($all_req[$c]['course_code'], 4); 
			  echo "</th>";?>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0; $i<$number_of_student; $i++){ ?>
            <tr>
              <td><label for="studentid"><?php echo $values[$i]['student_id'];?></label></td>
              <td><label for="fname"><?php echo $values[$i]['first_name'];?></label></td>
              <td><label for="lname"><?php echo $values[$i]['last_name'];?></label></td>
              <?php 
					$stu_completed = completedcourses($values[$i]['student_id']);
					$stu_completed_list =array_column($stu_completed, 'course_code');
					$req_set=courseset($values[$i]['student_id'],$req_databasename);
					
					/*echo "<pre>";
					print_r($req_set);
					print_r($stu_completed);
					print_r($all_req);*/
			  ?>
              
              <?php for($c=0; $c<sizeof($all_req); $c++){?>
              		<?php  //for($j=0; $j<sizeof($stu_completed); $j++){?>
                          <?php 
						   $flag = 0;
						  /* print_r($stu_completed_list);
                          echo "student id ". $values[$i]['student_id']." compare".$all_req[$c]['course_code'];
                          echo "<pre>";*/
                          //echo ($all_req[$c]['course_code'] == $stu_completed[$j]['course_code']);
						 // echo $stu_completed[$j]['grade'];
                         //   //print_r($req_set);
                            //	echo " compare".$all_req[$c]['course_set']."<br>";
                            //	echo in_array($all_req[$c]['course_set'],$req_set);
                            //if(!empty($stu_completed[$j]['course_code'])){
                                if(in_array($all_req[$c]['course_code'],$stu_completed_list)){		
                                         echo "<td> <lable>"; 				  		
                                        echo studentgrade($values[$i]['student_id'],$all_req[$c]['course_code']);
                                      echo " </lable></td>";
                                      $flag =1;	
                                }
                           // }
                            if($all_req[$c]['course_set'] != 0 && $flag == 0){
                                        if(in_array($all_req[$c]['course_set'],$req_set)){
                                            echo "<td> <lable>"; 				  		
                                            echo " ";
                                          echo " </lable></td>";
                                          $flag =1;		
                                        }
                            }	
                            if($flag ==0){
								
                                 echo "<td> <lable>"; 				  		
                                    echo "REQ";
                                  echo " </lable></td>";
                            }
                            ?>
                    <?php //}?>            
                  <?php }?>
              <?php }?>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <h1>Foundation Course</h1>
      <div class="formwrapper">
        <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
       	<colgroup>
        <col></col><col></col><col></col>
        <?php for($c=0; $c<sizeof($all_foundation); $c++){?>
        <?php 
		echo "<col "; checkset2($all_foundation[$c]['course_set']);echo "</col>";
		?>
        <?php }?>
        </colgroup>
          <thead>
            <tr>
              <th>Student Id</th>
              <th>First Name</th>
              <th>Last Name</th>
              <?php for($c=0; $c<sizeof($all_foundation); $c++){?>
              <?php echo "<th>"; 
			//  echo $all_req[$c]['course_code'];
			echo substr($all_foundation[$c]['course_code'], 4); 
			  echo "</th>";?>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php for($i=0; $i<$number_of_student; $i++){ ?>
            <tr>
              <td><label for="studentid"><?php echo $values[$i]['student_id'];?></label></td>
              <td><label for="fname"><?php echo $values[$i]['first_name'];?></label></td>
              <td><label for="lname"><?php echo $values[$i]['last_name'];?></label></td>
              <?php 
					$stu_completed = completedcourses($values[$i]['student_id']);
					$stu_completed_list =array_column($stu_completed, 'course_code');
					$foundation_set=courseset($values[$i]['student_id'],$foundation_database);
					$stu_foundation_req =select_foundation($values[$i]['student_id']);
					$stu_foundation_req_course = array_column($stu_foundation_req, 'course_code');
					$stu_foundation_waived =select_waived_foundation($values[$i]['student_id']);
					$stu_foundation_waived_course = array_column($stu_foundation_waived, 'course_code');
					
					//echo"<pre>";print_r($stu_foundation_req_course);
					//echo"<pre>";print_r($foundation_set);
					
					//echo"<pre>";print_r($stu_foundation_waived_course);
					//echo"<pre>";print_r($foundation_set);
			  ?>
              <?php for($c=0; $c<sizeof($all_foundation); $c++){?>
              		<?php  //for($j=0; $j<sizeof($stu_completed); $j++){?>
                          <?php 
						   $flag = 0;
						  /* print_r($stu_completed_list);
                          echo "student id ". $values[$i]['student_id']." compare".$all_req[$c]['course_code'];
                          echo "<pre>";*/
                          //echo ($all_req[$c]['course_code'] == $stu_completed[$j]['course_code']);
						 // echo $stu_completed[$j]['grade'];
                         //   //print_r($req_set);
                            //	echo " compare".$all_req[$c]['course_set']."<br>";
                            //	echo in_array($all_req[$c]['course_set'],$req_set);
                            //if(!empty($stu_completed[$j]['course_code'])){
                                if(in_array($all_foundation[$c]['course_code'],$stu_completed_list)){		
                                         echo "<td> <lable>"; 				  		
                                        echo studentgrade($values[$i]['student_id'],$all_foundation[$c]['course_code']);
                                      echo " </lable></td>";
                                      $flag =1;	
                                }
                           // }
                            if($all_foundation[$c]['course_set'] != 0 && $flag == 0){
								 /*echo $all_foundation[$c]['course_set'];
								 print_r($foundation_set);*/
                                        if(in_array($all_foundation[$c]['course_set'],$foundation_set)){
                                            echo "<td> <lable>"; 				  		
                                            echo "";
                                          echo " </lable></td>";
                                          $flag =1;		
                                        }
                            }	
                            if($flag ==0){
								//echo $all_foundation[$c]['course_code'];
								//print_r($stu_foundation_req_course);
                                if(in_array($all_foundation[$c]['course_code'],$stu_foundation_req_course)){
                                 echo "<td> <lable>"; 				  		
                                    echo "REQ";
                                  echo " </lable></td>";
								  $flag = 1;
								}
								
								 if(in_array($all_foundation[$c]['course_code'],$stu_foundation_waived_course) && $flag == 0){
                                 echo "<td> <lable>"; 				  		
                                    echo "TR";
                                  echo " </lable></td>";
								  $flag = 1;
								}
                            }
							
                            if($flag ==0){
								echo "<td> <lable>"; 				  		
                                            echo "NR ";
                                          echo " </lable></td>";
							}
                            ?>
                    <?php //}?>            
                  <?php }?>
              <?php }?>
          </tbody>
        </table>
      </div>
      <br>
      <br>
       <table id ="studentdetails" class="center design-table design-table-horizontal design-table-highlight center">
          <tbody >
            <tr class="name">
              <th><label for="">NR</label></th>
              <td><label for="">Not Req. With Major</label></td>
            </tr>
              <tr class="name">
              <th><label for="">REQ</label></th>
              <td><label for="">Req. Course With Major</label></td>
            </tr>
           </tr>
              <tr class="name">
              <th><label for="">TR</label></th>
              <td><label for="">Waived Course</label></td>
            </tr>
            
          
            
            
            
          </tbody>
        </table>
        <br>
        <br>
        
      <div id="buttondiv"> <a href="select_multiple_student_report.php" id='backbutton' class="button button-blue center" ><span>Back</span></a> <a href="profile.php" id='homepage' class="button button-blue center"><span>Home</span></a> </div>
    </div>
    <!-- End add_student div --> 
  </div>
  <!-- End add_student_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
