<?php include('includes/queries.php');?>
<?php include('includes/function.php');?>
<?php include('includes/header.php');?>
  <?php include('includes/menu.php');?>
  <?php include('includes/session_define.php');
?>
  <?php
	$studentdata = array();
	if(isset($_FILES["file"])){
		$result = file_check($_FILES);
		if($result == "success")
		{
			$dbc = dbConnect('local');
			 $filename = "";
    $filename = $_FILES["file"]["name"];
  //  print_r($_FILES);
    $options['delimiter'] = ",";
   // echo tableFromCsv($filename, true, $options);
   
   $result = extractCsv($filename, true, $options);
	 //echo "<pre>";
   // print_r($result);
   $keys = array_keys($result[0]);
   $loop = sizeof($result);
   $numkey = sizeof($keys);
   $numofstudent = -1;
   $numofcourse =-1;
   $numofgrd = -1;
	//print_r($keys);
	//echo "$loop";
	$loop=1;
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
						
						$studentdata[$numofstudent]['coursetype'][$numofcourse]=coursetype($result[$i]['ID'],$coursenum);
						
					}
					if(!empty($result[$i]['GRD']) && $keys[$j] == "GRD"){
						$numofgrd++;
						$studentdata[$numofstudent]['GRD'][$numofcourse]=$result[$i][$keys[$j]] ;
						
					}

				}
				
		
			}
		
	
	}
}
   
echo "<pre>";	
print_r($studentdata);
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
          <form class="form" method="post" action="coursetypefind.php" enctype="multipart/form-data">
            <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
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
            <?php echo $error; ?>
          </form>
        </div>
      </div>
      <!-- End  div --> 
      
    </div>
    <!-- End wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
