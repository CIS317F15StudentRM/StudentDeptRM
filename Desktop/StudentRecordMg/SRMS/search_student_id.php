<?php include('includes/session_define.php'); ?>
<?php include('includes/function.php');?>
<?php 
if(isset($_POST['search'])){
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 $values['ID #']= $_POST['studentid']; 
    $values['Last']= $_POST['lname'];
    $values['First']= $_POST['fname'];
   $values['Advisor']= $_POST['advisor'];
    $values['startsem']= $_POST['startsem'];
	$values['startyear']= $_POST['startyear'];
    $values['Option']= $_POST['major']; 
	 
    //print_r($values);
	$result = search_student($values);
	
	//print_r($result);
	//$_SESSION['search'] = $result;
	
	
	//print_r($_SESSION['search']);
}
else {
	$result =0;
	//$_SESSION['search']=0;
	//echo "iaminelse"; 
	//echo sizeof($_SESSION['search']);
}
?>
<?php include('includes/header.php');?>
  <?php include('includes/menu.php');?>
  <div id="page" class="container">
    <div id="student_id_wrapper">
      <div id="student_id_title">
        <h1> Student Id </h1>
      </div>
      <!-- End student_id_title div -->
      <div class="main">
        <form class="form" method="post" action="search_student_id.php">
          <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
            <tbody>
              <tr class="name">
                <td><label for="studentid">Student Id</label></td>
                <td><input type="" name="studentid" id="studentid" /></td>
              </tr>
              <tr class="name">
                <td><label for="fname">First Name</label></td>
                <td><input type="" name="fname" id="fname" /></td>
              </tr>
              <tr class="name">
                <td><label for="lname">Last Name</label></td>
                <td><input type="" name="lname" id="lname" /></td>
              </tr>
              <tr class="name">
                <td><label for="advisor">Advisor</label></td>
                <td><select name="advisor" id="advisor">
				  <?php
                    $row = getAdvisorList();
                    $loop = sizeof($row); 
					echo '<option value=""> </option>';
                    for($i=0; $i<$loop; $i++)
                    {
						
                      $option = $row[$i]['salutation']." ".$row[$i]['first_name']." ".$row[$i]['last_name'];
                      //$option =$row[$i]['last_name'];
                      $valueAdvisor = $row[$i]['username'];
                      echo "<option  value=\"".$valueAdvisor."\" ";
                      if(isset($_POST['advisor']) && $valueAdvisor == $_POST['advisor']){ echo ' selected';} 
                      echo ">".$option."</option>";
                    }
                
                
                ?>
        </select></td>
              </tr>
              <tr class="name">
                <td><label for="startsem">Starting Semester</label></td>
                <td><select name="startsem" id= "startsem">
                    <option> </option>
                    <option value="fall">Fall</option>
                    <option value="spring">Spring</option>
                    <option value="summer">Summer</option>
                  </select></td>
              </tr>
              <tr>
                <td><label for"startyear">Starting Year</label></td>
                <td><select name="startyear" id= "startyear">
                    <option> </option>
                    <?php 
			$cur = date("Y");
			 for($i=$cur-1; $i<=$cur+2; $i++){
				 echo"<option value=\"".$i."\">".$i."</option>";
			 }
			
			?>
                  </select></td>
              </tr>
              <tr class="name">
                <td><label for="major">Major</label></td>
                <td><select name="major" id="major">
                    <?php
						$row = getMajorsList();
						$loop = sizeof($row); 
						echo '<option value=""> </option>';
						for($i=0; $i<$loop; $i++)
						{
							
							$option = $row[$i]['major'];
							//$option = $row[$i]['last_name'];
							echo '<option value="'.$option.'"';
	 					 if(isset($_POST['major'])){if($option == $_POST['major']){ echo" selected";}}  
							echo '>'.$option.'</option>';
						}
					
					
					?>
                  </select></td>
              </tr>
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="search" type="submit" value="Search" />
          </p>
          <?php //echo $error; ?>
        </form>
      </div>
      <!-- End student_id div -->
      <?php  
	  
	  //echo "$size";
	   if($result != 0){
		
      ?>
      <div class="result">
        <h3>Search Result</h3>
        <table id="result" class="design-table design-table-horizontal design-table-highlight center">
          <thead>
            <tr>
              <th>Student Id</th>
              <th>Advisor</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Major</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php 
			$size = sizeof($result);
			for($i=0; $i<$size; $i++) { ?>
              <td><label for="studentid"><?php echo $result[$i]['student_id']; ?></label></td>
              <td><label for="advisor"><?php echo $result[$i]['advisor']; ?></label></td>
              <td><label for="fname"><?php echo $result[$i]['first_name']; ?></label></td>
              <td><label for="lanme"><?php echo $result[$i]['last_name']; ?></label></td>
              <td><label for="major"><?php echo $result[$i]['major']; ?></label></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <a onclick="history.go(-2);return true;"  class="button button-blue center" ><span>BACK</span></a> </div>
      <?php }?>
      <?php
  	if($result == 0)
		{
  	 		if(isset($_POST['search']))
			{
		
				$error = "<h2>No student Found</h2>";
				echo $error;
					echo "<a onclick=\"history.go(-2);return true;\"  class=\"button button-blue center\" ><span>BACK</span></a>";
			}
			else{
					echo "<a onclick=\"history.go(-1);return true;\"  class=\"button button-blue center\" ><span>BACK</span></a>";
							
			}
		}
		
	
  
   ?>
    </div>
    <!-- End student_id_wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
