<?php 
include('includes/function.php'); 
include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
include("includes/cms_call.php");
include("../cms/array.php");
$error ="";
?>
<?php 
if(isset($_POST['submit'])){
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 $values['ID #']= $_POST['studentid']; 
    $values['Last']= $_POST['lname'];
    $values['First']= $_POST['fname'];
   $values['Advisor']= $_POST['advisor'];
    $values['startsem']= $_POST['start_semester'];
	$values['startyear']= $_POST['start_year'];
    $values['Option']= $_POST['major'];
   	$check = studentid_validation($_POST['studentid']);
	//print_r($values);
	if($check == "false"){
		$result = 0;
		echo '<script>alert("Student id already exists"); </script>';
	}
   	else{
	//print_r($values);
	$result = add_student($values);
	}
	
	if($result == 1){
		$_SESSION['student']=$_POST;
		redirect_to("add_student_foundation.php");
	}
	else{
		
		$error = "Student data enter failed";
	}

}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="page" class="container">
<div id="add_student_wrapper">
<div id="add_student_title">
<h1>
Add New Student Details
</h1>
<br>
</div> <!-- End add_student div -->
<div class="main">
<div class="formwrapper">
<form class="form" method="post" action="add_student_details.php">
<h3>1-Student Basic Details</h3>

<table class="center simpletable design-table design-table-horizontal design-table-highlight center">
<tbody>
	
    <tr class="name">
      <td><label for="studentid">Student Id</label></td>
      <td><input type="number" name="studentid" id="studentid" required="required" <?php if(isset($_POST['studentid'])){ echo 'value="'.$_POST['studentid'].'"';} ?>/></td> 
    </tr>
    <tr class="name">
      <td><label for="fname">First Name</label></td>
      <td><input type="" name="fname" id="fname" required="required" <?php if(isset($_POST['fname'])){ echo 'value="'.$_POST['fname'].'"';} ?>/></td> 
    </tr>
    <tr class="name">
      <td><label for="lname">Last Name</label></td>
      <td><input type="" name="lname" id="lname" required="required" <?php if(isset($_POST['lname'])){ echo 'value="'.$_POST['lname'].'"';} ?> /></td> 
    </tr>
<tr class="name">
  <td><label for="advisor">Advisor</label></td>
  <td><select name="advisor" id="advisor">
  <?php
    $row = getAdvisorList();
    $loop = sizeof($row); 
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
      <td><select name="start_semester" id= "start_semester">
	      <option value="fall" <?php if(isset($_POST['start_semester'])){if("fall" == $_POST['start_semester']){ echo" selected";}} ?>>Fall</option>
	      <option value="spring" <?php if(isset($_POST['start_semester'])){if("spring" == $_POST['start_semester']){ echo" selected";}} ?>>Spring</option>
	      <option value="summer" <?php if(isset($_POST['start_semester'])){if("summer" == $_POST['start_semester']){ echo" selected";}} ?>>Summer</option>
          </select></td> 
    </tr>
    <tr>
    	<td> <label for"startyear">Starting Year</label></td>
        <td><select name="start_year" id= "start_year">
        	<?php 
			$cur = date("Y");
			 for($i=$cur-1; $i<=$cur+1; $i++){
			 echo"<option value=\"".$i."\"";
	 		 if(isset($_POST['start_year'])){if($i == $_POST['start_year']){ echo" selected";}}  
			 echo ">".$i."</option>";
			 }
			
			?>
            </select>
         </td>
    </tr>
    <tr class="name">
    <td><label for="major">Major</label></td>
      <td><select name="major" id="major">
                    <?php
						$row = getMajorsList();
						$loop = sizeof($row); 
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
 <p class="submit" align="center"><input name="submit" type="submit" value="Submit" /> <br>
 <label for"startyear">Continue to Foundation Course</label>
 </p>
	  

 
    <?php  echo '<p class="error" >';
	echo $error; 
	 echo "</p>";?>
</form>
</div>



</div> <!-- End add_student div -->
</div> <!-- End add_student_wrapper div -->
</div><!-- End Div Page-->
<?php include('includes/footer.php'); ?>
  