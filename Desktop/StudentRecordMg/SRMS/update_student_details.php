<?php include('includes/session_define.php'); ?>
<?php 
include('includes/function.php'); 
//include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
include("includes/cms_call.php");
include("../cms/array.php");
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--<script src="includes/update_student_table.js"></script>-->
<?php if(!isset($_SESSION['student']['student_id'])){
  redirect_to("update_student_id_details.php");
} ?>
<?php 
//echo "iambatman".$_SESSION['student']['student_id'];

if(isset($_POST['submit'])){
	
	 $dbc = dbConnect('local');
	// print_r($_POST);
	 $_POST['student_id'] = $_SESSION['student']['student_id'];;
	 $values['ID #']= $_POST['student_id']; 
    $values['Last']= $_POST['last_name'];
    $values['First']= $_POST['first_name'];
   $values['Advisor']= $_POST['advisor'];
    $values['startsem']= $_POST['start_semester'];
	$values['startyear']= $_POST['start_year'];
    $values['Option']= $_POST['major'];
   
	//print_r($values);
	$result = update_student($values);
	
	if($result == 1){
		//echo " this is sparttaaaa ";
		//$_SESSION['student']=$_POST;
		$_SESSION['student'] =$_POST;
		redirect_to("update_student_foundation.php");
	}
	else{
		$error = "Student data enter failed";
	}

}
?>

<div id="page" class="container">
<div id="add_student_wrapper">
<div id="add_student_title">
<h1>
Update Student Details
</h1>
<br>
</div> <!-- End add_student div -->
<div class="main">
<div class="formwrapper">
<form class="form" method="post" action="update_student_details.php">
<h3>1-Student Basic Details</h3>

<table class="center simpletable design-table design-table-horizontal design-table-highlight center">
<tbody>
	
    <tr class="name">
      <td><label for="usertype">Student Id</label></td>
       <td><label for="usertype"><?php echo $_SESSION['student']['student_id'];?></label></td>
    <!--  <td><input type="" name="student_id" id="student_id" required="required" value="<?php //echo $_SESSION['student']['student_id'];?>"/></td> -->
    </tr>
    <tr class="name">
      <td><label for="usertype">First Name</label></td>
      <td><input type="" name="first_name" id="fname" required="required" value="<?php echo $_SESSION['student']['first_name'];?>"/></td> 
    </tr>    <tr class="name">

      <td><label for="usertype">Last Name</label></td>
      <td><input type="" name="last_name" id="lname" required="required" value="<?php echo $_SESSION['student']['last_name'];?>"/></td> 
    </tr>
     <tr class="name">
      <td><label for="advisor">Advisor</label></td>
      <td><select name="advisor" id="advisor">
      <?php
	  	//echo $_SESSION['student']['advisor'];
		$row = getAdvisorList();
		$loop = sizeof($row); 
		for($i=0; $i<$loop; $i++)
		{
			$option = $row[$i]['salutation']." ".$row[$i]['first_name']." ".$row[$i]['last_name'];
			//$option =$row[$i]['last_name'];
			$valueAdvisor = $row[$i]['username'];
			echo "<option  value=\"".$valueAdvisor."\" ";
			if(strcasecmp($_SESSION['student']['advisor'],$valueAdvisor)== 0) {echo " selected";}
			echo ">".$option."</option>";
		}
	
	
	?>
            </select></td>
    </tr>
   
     <tr class="name">
      <td><label for="startsem">Starting Semester</label></td>
      <td><select name="start_semester" id= "start_semester">
	      <option value="fall" <?php if(strcasecmp($_SESSION['student']['start_semester'],"fall")==0) echo " selected"; ?>>Fall</option>
	      <option value="spring" <?php if(strcasecmp($_SESSION['student']['start_semester'],"spring")==0) echo " selected"; ?>>Spring</option>
	      <option value="summer" <?php if(strcasecmp($_SESSION['student']['start_semester'],"summer")==0) echo " selected"; ?>>Summer</option>
          </select></td> 
    </tr>
    <tr>
    	<td> <label for"startyear">Starting Year</label></td>
        <td><select name="start_year" id= "start_year">
        	<?php 
			$cur = date("Y");
			 for($i=$cur-1; $i<=$cur+1; $i++){
				 echo"<option value=\"".$i."\"";if(strcasecmp($_SESSION['student']['start_year'],"$i")==0) echo " selected"; echo ">".$i."</option>";
			 }
			
			?>
            </select>
         </td>
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
							echo '<option value="'.$option.'"';
										
									if($_SESSION['student']['major']==$option){
						
									echo " selected";
							
						}
							echo '>'.$option.'</option>';
						}
					
					
					?>
                  </select></td>
    </tr>
    
   

  </tbody>
</table>


 <p class="submit" align="center"><input name="submit" type="submit" value="Submit" /></p>
   
</form>

           <div id="buttondiv"> <a href="update_student_course_details.php" id='backbutton' class="button button-blue center" ><span>Add Completed Course</span></a> <a href="update_student_foundation.php" id='homepage' class="button button-blue center"><span>Update Foundation Course</span></a> </div>


</div> <!-- End add_student div -->
</div> <!-- End add_student_wrapper div -->
</div><!-- End Div Page-->
<?php include('includes/footer.php'); ?>
  