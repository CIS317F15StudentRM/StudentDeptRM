<?php include('includes/session_define.php'); ?>
<?php include('includes/queries.php');?>
<?php include('includes/function.php');?>
<?php include('includes/header.php');?>
  <?php include('includes/menu.php');?>
  <?php $error="";?>
  <?php
  $counter = 0;
	$studentdata = array();
	if(isset($_FILES["file"])){
		$semester = $_POST['semester'];
		$year = $_POST['year'];
		$result = file_check($_FILES);
	
		
		if($result == "success")
		{
			$dbc = dbConnect('local');
			 $filename = "";
    $filename = $_FILES["file"]["tmp_name"];
  //  print_r($_FILES);
    $options['delimiter'] = ",";
  //  echo tableFromCsv($filename, true, $options);
   
   $result = extractCsv($filename, true, $options);
	//echo "<pre> batman";print_r($result);
   $keys = array_keys($result[0]);
   $loop = sizeof($result);
   $numkey = sizeof($keys);
   $numofstudent = -1;
   $numofcourse =-1;
   $numofgrd = -1;
   $add = 0;
	//print_r($keys);
	//echo "$loop";
	

$result_id = array_column($result,'ID');
$result_id=array_filter($result_id);
//print_r($result_id);
foreach($result_id as $ids){
	//print_r($ids);
		$check =studentid_validation($ids);
		if($check == "true"){
			$students_notfound[$counter]=$ids;
			$counter++;
		}
}
//print_r($students_notfound);
	if($counter == 0){
	for($i=0; $i<$loop; $i++)
	{
			for($j=0; $j<$numkey; $j++)
			{
				//echo "<pre>".$keys[$j]."    ".$result[$i][$keys[$j]];
				if(!empty($result[$i]['ID']) && $keys[$j] == "ID"){
					$numofstudent++;
					$numofcourse = -1;
					$numofgrd = -1;
					$studentdata[$numofstudent]['studentid']=$result[$i]['ID'] ;
					
				}
				else{
					if(!empty($result[$i]['Course Number']) && $keys[$j] == "Course Number"){
						$numofcourse++;
						$string = $result[$i][$keys[$j]];
						
						$pattern= "/(GCIS)/i";
						$pattern2="/(CIS)/i";
						if(preg_match($pattern, $string))
						{
							
							$start = strpos($string,'_')+1;
							$last= strripos($string,'_');
							$len = $last - $start;
							/*echo "<pre>";
							echo "len == ".$len;
							echo "start == ".$start;
							echo "last == ".$last;
							echo "GCIS \n";*/
							$coursenum = "GCIS ".substr($string,$start,$len);
							/*echo "<pre>";
							echo "A match was found.   ".$coursenum;*/
							
						}
						elseif(preg_match($pattern2, $string))
						{
							
							
							$start = strpos($string,'_')+1;
							$last= strripos($string,'_');
							$len = $last - $start;
							/*echo "<pre>";
							echo "len == ".$len;
							echo "start == ".$start;
							echo "last == ".$last;
							echo "CIS \n";*/
							$coursenum = "CIS ".substr($string,$start,$len);
							/*echo "<pre>";
							echo "A match was found.   ".$coursenum;*/
							
						}

						$studentdata[$numofstudent]['course'][$numofcourse]=$coursenum ;
						
						$returncall =coursetype($studentdata[$numofstudent]['studentid'],$coursenum);
						$studentdata[$numofstudent]['coursetype'][$numofcourse]=$returncall['status'];
						$studentdata[$numofstudent]['credit'][$numofcourse]=$returncall['credit'];
						
					}
					if(!empty($result[$i]['GRD']) && $keys[$j] == "GRD"){
						$numofgrd++;
						$studentdata[$numofstudent]['GRD'][$numofcourse]=$result[$i][$keys[$j]] ;
						
					}
				}
			}
		
	}
	for($i=0; $i<=$numofstudent ; $i++){
		$loop1=sizeof($studentdata[$i]['course']);
		for($j=0; $j<$loop1; $j++){
			//echo "<pre>";
		$stddetails['ID']=$studentdata[$i]['studentid'];
 	 	$stddetails['course']=$studentdata[$i]['course'][$j];
		$stddetails['semester']=$semester;
		$stddetails['year']=$year;
		//echo "<pre>";
		$stddetails['coursetype']=$studentdata[$i]['coursetype'][$j];
		$stddetails['credit']=$studentdata[$i]['credit'][$j];
		//echo "<pre>";
		$stddetails['GRD']=$studentdata[$i]['GRD'][$j];
		//echo "<pre>";
	//print_r($stddetails);
		$add = addsstudentcourse($stddetails);
		
		}
		
}
   if($add == 1){
		//$_SESSION['student']=$_POST;
		echo "<script>";
		echo 'alert("Student Record Updated Successfully");';
		echo "window.location.href ='update_student_id_details.php';";
		echo '</script>';
		
	}
	else{

		$error = "<br>CSV file format is not correct . Check Format Below <br> ";
		
	}
		}
}
else{
	$error = $result ;
}


 
}

?>
  <div id="page" class="container">
    <div id="wrapper">
      <div id="title">
        <h1> Update Students Record </h1>
      </div>
      <!-- End title div -->
      <div class="main">
        <div class="formwrapper">
          <form class="form" method="post" action="update_students_details.php" enctype="multipart/form-data">
          <table id="semyear">
           <tr class="name">
                  <td><label for="semester">Select Semester</label></td>
                  <td><select name="semester" id= "semester">
                      <option value="fall">Fall</option>
                      <option value="spring">Spring</option>
                      <option value="summer">Summer</option>
                    </select></td>
                </tr>
                <br>
                <tr>
                  <td><label for"year">Select Year</label></td>
                  <td><select name="year" id= "year">
                      <?php 
			$cur = date("Y");
			 for($i=$cur-1; $i<=$cur+2; $i++){
				 echo"<option value=\"".$i."\">".$i."</option>";
			 }
			
			?>
                    </select></td>
                </tr>
          </table>
          	<br>
            <br>
            <table id="semyear" class="center simpletable design-table design-table-horizontal design-table-highlight center">
              <tbody>
                <tr>
                  <td><label for="selectfile">Select CSV File</label></td>
                  <td class="fileupload"><input type="file" name="file" id="file" required="required"/></td>
                </tr>   
             </tbody>
            </table>
            <p class="submit" align="center">
              <input name="submit" type="submit" value="Submit" />
            </p>
            
            <?php 
					echo '<p class="error" >';	 

			if($counter != 0) {
				//echo "Student Id not found :- <br>";
				foreach($students_notfound as $i){
					echo "student Id not found ".$i."<br>";
				}
			}
			if($error != ""){
				
				echo $error;
			}echo "</p>";?>
          </form>
        </div>
        <div>
<h3>Format of CSV file</h3>
</div>
<br>
<br>
        <div id="format">
<table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
    <thead>
        <tr>
        	<th>ID</th>
        	<th>LAST</th>
            <th>FIRST</th>
            <th>MAJOR</th>
            <th>Start Term.</th>
            <th>Course Number</th>
            <th>GRD</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><label for=""> 3039776</label></td>
            <td><label for="">PATEL</label></td>
          	<td><label for="">CHINTAN</label></td>
          	<td><label for="">773</label></td>
            <td><label for="">16/fa</label></td>
            <td><label for="">GCIS_611_0A</label></td>
            <td><label for="">A+</label></td>
        </tr>
         <tr>
            <td><label for=""> </label></td>
            <td><label for=""></label></td>
          	<td><label for=""></label></td>
          	<td><label for=""></label></td>
            <td><label for=""></label></td>
            <td><label for="">GCIS_622_0A</label></td>
            <td><label for="">A+</label></td>
        </tr>
         <tr>
            <td><label for=""> </label></td>
            <td><label for=""></label></td>
          	<td><label for=""></label></td>
          	<td><label for=""></label></td>
            <td><label for=""></label></td>
            <td><label for="">GCIS_698_0A</label></td>
            <td><label for="">A+</label></td>
        </tr>
    </tbody>
</table>
</div>
      </div>
      <!-- End  div --> 
     
    </div>
    <!-- End wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
