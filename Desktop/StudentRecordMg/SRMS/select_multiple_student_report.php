<?php include('includes/session_define.php'); ?>
<?php include('includes/function.php');?>
<?php $error = "";?>
<?php 
if(isset($_POST['submit'])){
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 
    $values['Advisor']= $_POST['advisor'];
    $values['startsem']= $_POST['startsem'];
	$values['startyear']= $_POST['startyear'];
    $values['Option']= $_POST['major']; 
	$_SESSION['multiple_report']=$values;
    //print_r($values);
	$result = search_student($values);
	
	//print_r($result);
	$_SESSION['student_list'] = $result;
	if(sizeof($result) >=1 ){
		//$_SESSION['student']['student_id'] = $values ['ID #'];
		//echo $_SESSION['student']['student_id'] ;
		redirect_to("multiple_student_report.php");
	}
	else{
		$error = "Student not found";
	}
	
	
	//print_r($_SESSION['search']);
}?>
<?php include('includes/header.php');?>
  <?php include('includes/menu.php');?>
  <div id="page" class="container">
    <div id="student_id_wrapper">
      <div id="student_id_title">
        <h1>Multiple Students Report</h1>
      </div>
      <!-- End student_id_title div -->
      <div class="main">
        <form class="form" method="post" action="select_multiple_student_report.php">
          <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
            <tbody>
              <tr class="name">
                <td><label for="advisor">Advisor</label></td>
                <td><select name="advisor" id="advisor">
                    <option value=""> </option>
                    <?php
						$row = getAdvisorList();
						$loop = sizeof($row); 
						for($i=0; $i<$loop; $i++)
						{
							$option = $row[$i]['salutation']." ".$row[$i]['first_name']." ".$row[$i]['last_name'];
							//$option =$row[$i]['last_name'];
							$valueAdvisor = $row[$i]['username'];
							echo "<option  value=\"".$valueAdvisor."\" ";
							echo ">".$option."</option>";
						}
					
					
					?>
                  </select></td>
              </tr>
              <tr class="name">
                <td><label for="advisor">Major</label></td>
                <td><select name="major" id="major">
                    <?php
						$row = getMajorsList();
						$loop = sizeof($row); 
						for($i=0; $i<$loop; $i++)
						{
							$option = $row[$i]['major'];
							//$option = $row[$i]['last_name'];
							echo '<option value="'.$option.'">'.$option.'</option>';
						}
					
					
					?>
                  </select></td>
              </tr>
              <tr class="name">
                <td><label for="startsem">Starting Semester</label></td>
                <td><select name="startsem" id= "startsem">
                    <option value="fall">Fall</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                  </select></td>
              </tr>
              <tr>
                <td><label for"startyear">Starting Year</label></td>
                <td><select name="startyear" id= "startyear">
                    <?php 
			$cur = date("Y");
			 for($i=$cur-1; $i<=$cur+2; $i++){
				 echo"<option value=\"".$i."\">".$i."</option>";
			 }
			
			?>
                  </select></td>
              </tr>
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
          <?php    echo '<p class="error" >';
	 echo $error; echo "</p>"; ?>
        </form>
      </div>
      <a href="search_student_id.php" id='anc_add' class="button button-blue center" ><span>Search Student</span></a> 
      <!-- End student_id div --> 
    </div>
    <!-- End student_id_wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
