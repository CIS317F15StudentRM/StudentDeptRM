<?php 

include('includes/function.php');

include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
include("includes/cms_call.php");
include("../cms/array.php");
$error="";
?>
<?php
	$flag=3;
	if(isset($_FILES["file"])){
		//echo "<pre>";print_r($_FILES);
		$result = file_check($_FILES);
		if($result == "success")
		{
			$dbc = dbConnect('local');
			$call_file = $_FILES;
			$stu_result =add_students_from_csv($call_file);
			if($stu_result == 1){
				$flag = 1;
				
			}
			elseif($stu_result == 0){
				$flag = 0;
				$error = "Format of CSV file is not correct";
			}
			else{
				$flag = 0 ;
				//print_r($stu_result);
			}
		}
		else{
			$error = $result;
		}
				
	}

?>
<div id="page" class="container">
<div id="add_students_wrapper">
<div id="add_students_title">
<h1>
Add Multiple New Students Details
</h1>
<br>
</div> <!-- End add_student div -->
<div class="main">
<div class="formwrapper">
<form class="form" method="post" action="add_students_details.php" enctype="multipart/form-data">
<table class="center simpletable design-table design-table-horizontal design-table-highlight center">
<tbody>
	
    <tr>
      <td><label for="selectfile">Select CSV File</label></td>
      <td class="fileupload"><input type="file" name="file" id="file" required="required"/></td> 
    </tr>
  </tbody>
</table>
<p class="submit" align="center"><input name="submit" type="submit" value="Submit" /></p>
 <?php 
 echo '<p class="message" >';
 if($flag == 1){
	 echo "Student data added successfully";
	 echo "</p>";
 }
 elseif($flag == 0){
	// print_r($stu_result);
	 if(sizeof($stu_result)>0 && $stu_result!= 0 && $stu_result != 1){
		   echo '<p class="error" >';
			 echo "Students details already exists <br>";
		 for($i=0; $i<sizeof($stu_result); $i++){
			 
			 foreach($stu_result[$i] as $j => $value){
				echo "Check row".($j+1)."  Student id  ".$value."<br>";
				
			 }
			 echo "<br> $error";
		 }
	 }
		/* else{
			  echo "<br> $error";
		 }*/
	 }
	 //print_r($stu_result);
	 echo "</p>";
 ?>

</form>
</div>
		  

<?php
 echo '<p class="error" >';
  echo "$error";
  echo "</p>";?>
<div>
<h3>Format of CSV file</h3>
</div>
<div id="format">
<table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
    <thead>
        <tr>
        	<th>ID #</th>
        	<th>Last</th>
            <th>First</th>
            <th>Advisor</th>
            <th>Start SEM.</th>
            <th>Option</th>
            <th>561</th>
            <th>562</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><label for=""> 3039776</label></td>
            <td><label for="">PATEL</label></td>
          	<td><label for="">CHINTAN</label></td>
          	<td><label for="">TANG</label></td>
            <td><label for="">14/SP</label></td>
            <td><label for="">WD</label></td>
            <td><label for="">TR</label></td>
            <td><label for="">TR</label></td>
        </tr>
    </tbody>
</table>
</div>

</div> <!-- End add_students div -->
</div> <!-- End add_students_wrapper div -->
</div><!-- End Div Page-->


<?php include('includes/footer.php'); ?>
  
  