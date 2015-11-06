<?php

//error_reporting(0);
function coursetype($studentid,$coursenum){
	
	$curriculum = studentcurriculum($studentid);
	$reqcurriculum = $curriculum."_req_courses";
	$foundationCurriculum = $curriculum."_foundation_courses";
	$req_course_details = getRequiredCourses($reqcurriculum);
	//$req_course = array_column($req_course_details, 'course_code');
	$foundation_course_details = getFoundationCourses($foundationCurriculum);
	$req_set=courseset($studentid,$reqcurriculum);
	$req ="";
	$foundation="";
	$elective= array();
	$req_size=sizeof($req_course_details);
	$foundation_size = sizeof($foundation_course_details);
	for($i=0; $i<sizeof($req_set); $i++){
		if($req_set[$i]==0){
			//echo "in";
			$req_set[$i] = 'a';
		}
	}
	//print_r($req_set);
	//echo"<pre>";print_r($req_course_details);
	for($i=0; $i<$req_size; $i++)
	{
		//echo"reqset";
		//print_r($req_set);
		//echo "<br> corseset".$req_course_details[$i]['course_set']."<br> result".!in_array($req_course_details[$i]['course_set'],$req_set)."<br>";
		if(strcasecmp($req_course_details[$i]['course_code'],$coursenum) == 0 && in_array($req_course_details[$i]['course_set'],$req_set) == 1)
		{
			echo "iambatman ".$req_course_details[$i]['course_code'];
			$elective['status'] ="Elective";
			$elective['credit'] = $req_course_details[$i]['credit'];
		}
		//echo $req_course_details[$i]['course_code']."coursecode".$coursenum."<br>";
		if(strcasecmp($req_course_details[$i]['course_code'],$coursenum) == 0 && empty($elective))
		{
			//echo "iamdeadpool";
			$req['status'] ="REQUIRED";
			$req['credit'] = $req_course_details[$i]['credit'];
		}
	} 
	
	for($i=0; $i<$foundation_size; $i++)
	{
		if(strcasecmp($foundation_course_details[$i]['course_code'],$coursenum )==0)
		{
			$foundation['status'] ="FOUNDATION";
			$foundation['credit'] = $foundation_course_details[$i]['credit'];
		}
	}
	
	if(!empty($req)){
		return $req;
	}
	elseif(!empty($foundation)){
		return $foundation;

	}
	else{
		$elective['status']="ELECTIVE";
		$elective['credit'] = 4;
		return $elective;

	}
	
/*	if(in_array($coursenum, $req_course, true)){
		return "required";
	}
	elseif(in_array($coursenum, $foundation_course, true)){
		return "foundation";
	}
	else{
		return "elective";
	}
*/	
	
	
}

function studentcurriculum($studentid){
	$values['ID #']=$studentid;
	
	$studentdetails= search_student($values);
	
	//print_r($studentdetails);
	$sem = $studentdetails[0]['start_semester'];
	$year = $studentdetails[0]['start_year'];
	$major = $studentdetails[0]['major'];
	
	$curriculumdetails=$major."_".$sem."_".$year;
	
	return $curriculumdetails;
}

function getRequiredCourses($curriculum) {
	$rows= array();
    $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `course_code`, `credit`, `course_name`,`course_ava`, `course_set` FROM `$curriculum`;";
   // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getRequiredCourses');
	//print_r($result);
  	 while ($row = $result->fetch_assoc()) {
  	    $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');
	/*echo "<pre>";
	print_r($result);*/
    return $rows;
}


function getFoundationCourses($curriculum) {

 $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `course_code`, `credit`, `course_name`, `course_set`,`course_ava` FROM `$curriculum`;";
  // echo $query;
    $result = $dbc->query($query) or die('.Error querying sds database.$query. getfoundationcourse');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');
	/*echo "<pre>";
	print_r($result);*/
    return $rows;
}
function getFoundationCourseFromCoursecode($curriculum,$coursecode) {

 $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `course_code`, `credit`, `course_name`, `course_set`,`course_ava` FROM `$curriculum` WHERE `course_code` = '$coursecode';";
  // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getFoundationCourseFromCoursecode');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');
	//echo "<pre>";
	//print_r($rows);
    return $rows;
}



function addsstudentcourse($values){
	$dbc = dbconnect('local');
	$query=""; 
	$id =  $dbc->real_escape_string($values['ID']);
	$course =  $dbc->real_escape_string($values['course']);
	$semester= $dbc->real_escape_string($values['semester']);
	$year= $dbc->real_escape_string($values['year']);
	$type =  $dbc->real_escape_string($values['coursetype']);
	$grd =  $dbc->real_escape_string($values['GRD']); 
	$credit =  $dbc->real_escape_string($values['credit']); 
	$query = "INSERT INTO student_course_details(student_id, credit, course_code, semester, year, grade, course_type) VALUES ('$id','$credit','$course','$semester','$year','$grd','$type');";
	
	//echo $query;
	if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
	
	
	
}

function completedcourses($studentid) {
	$rows= array();
 $dbc = dbconnect('local');
//echo "query".$studentid;
    $query = " SELECT student_id,credit, course_code, semester, year, grade, course_type FROM student_course_details WHERE student_id = '$studentid';";
  // echo $query;
    $result = $dbc->query($query) or die('.Error querying database.$query. completedcourses');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

	/*echo "<pre>";
	print_r($rows);*/
    return $rows;
}
function requiredcourses($student_details){
	$predatabase = studentcurriculum($student_details['student_id']);
	$req_databasename = $predatabase."_req_courses";
	$foundation_databasename = $predatabase."_foundation_courses";
	$prereq_databasename = $predatabase."_prereq_courses";
	$stu_completed = completedcourses($student_details['student_id']);
	$stu_foundation = select_foundation($student_details['student_id']);
	$all_req = getRequiredCourses($req_databasename);
	$totalElective = completedElective($student_details['student_id']);
	$req_set=courseset($student_details['student_id'],$req_databasename);
	$foundation_set=courseset($student_details['student_id'],$foundation_databasename);
	//print_r($foundation_set);
	//$all_foundation= getFoundationCourses($foundation_databasename);
	$all_req_loop = sizeof($all_req);
	$stu_req = "";
	$stu_req_foundation ="";
	$temp = "";
	$t=0;
	$req_count = 0;
	$stu_foundation_count = 0;
	$stu_completed_temp = $stu_completed;
	//echo "$totalElective";
	for($i=0; $i<$all_req_loop; $i++)
	{
		for($j=0; $j<sizeof($stu_completed); $j++)
		{	
				if(!empty($all_req[$i]['course_code']) && $totalElective !=0 ){
					
					if(strpos($all_req[$i]['course_code'],"GCIS ELE") !== false){
						
						$totalElective--;
						unset($all_req[$i]);
						break 1;
						
					}
				}
				if(!empty($all_req[$i]['course_code']))
				{
					if($all_req[$i]['course_code']==$stu_completed[$j]['course_code'])
					{
						unset($all_req[$i]);
						break 1;
					}
					elseif($all_req[$i]['course_set'] != 0){
						if(in_array($all_req[$i]['course_set'],$req_set)){
							unset($all_req[$i]);
							break 1;
							
						}
					}
				}
			}
			  
		  if(!empty($all_req[$i]['course_code'])){
				$prereq_count =0;
				$stu_req[$req_count]['course_code']= $all_req[$i]['course_code'];
				if(empty($stu_req[$req_count]['course_code'])){
				$stu_req[$req_count]['course_type']= "REQUIRED";
				}
				$stu_req[$req_count]['credit']= $all_req[$i]['credit'];
				$stu_req[$req_count]['course_ava']= $all_req[$i]['course_ava'];
				$stu_req[$req_count]['course_set']= $all_req[$i]['course_set'];
				$all_prereq = studentprereqsubject($prereq_databasename,$stu_req[$req_count]['course_code']);
				$all_prereq2=$all_prereq;
				$all_prereq_loop=sizeof($all_prereq);
						/*print_r($all_prereq);
				echo "<pre>";*/
				//echo $all_prereq_loop;
					
					for($a=0; $a<$all_prereq_loop; $a++){
						//echo $a;
						//echo "all prerew course code ".$all_prereq[$a]['course_code']."<br>";
						for($b=0; $b<sizeof($stu_completed); $b++){
							
							if(!empty($all_prereq[$a]['course_code']))
							{
								if($all_prereq[$a]['course_code']==$stu_completed[$b]['course_code'])
								{
									unset($all_prereq[$a]);
									break 1;
								}
														
							}
						}
						if(!empty($all_prereq[$a]['course_code'])){
							//echo "<br><br>$prereq_count<br><br> ";
							//echo $all_prereq[$a]['course_code'];
							$stu_req[$req_count]['prereq'][$prereq_count]['course_code']= $all_prereq[$a]['course_code'];
							$stu_req[$req_count]['prereq'][$prereq_count] ['set']=$all_prereq[$a]['course_set'];
							$prereq_count++;
							unset($all_prereq[$a]);
						}
					}
			  unset($all_req[$i]);

				$req_count++;
		  }
	}
	
	$loop = sizeof($stu_req);
	$orgroup= array();
	
	for($d=0; $d<$loop; $d++){
		//echo "<pre> $d";print_r($stu_req);
		if(!empty($stu_req[$d])){
			if(array_key_exists('prereq' ,$stu_req[$d])){
			$loop2=sizeof($stu_req[$d]['prereq']);
			//print_r($stu_req[$d]['prereq']);
			for($e=0; $e<$loop2; $e++){
				//echo "<br> ".$stu_req[$d]['prereq'][$e]['set'];
				if($stu_req[$d]['prereq'][$e]['set'] == 3){
					//echo "number 3 <br> ";
				}
				elseif($stu_req[$d]['prereq'][$e]['set'] == 1){
						//				echo "number 1 <br> ";

				}
				elseif($stu_req[$d]['prereq'][$e]['set'] == 2 || $stu_req[$d]['prereq'][$e]['set'] == 0 ){
									//	echo "number 2  and 0<br> ";
						//echo $stu_req[$d]['prereq'][$e]['course_code'];
					$prereq_group = studentprereqsubject($prereq_databasename,$stu_req[$d]['course_code']);
					if(!empty($prereq_group)){
						$loop3=sizeof($prereq_group);
						$g=0;
						for($f=0; $f<$loop3; $f++){
							if($prereq_group[$f]['course_set'] == 3 || $prereq_group[$f]['course_set'] == 1){
							//	echo $prereq_group[$f]['course_code']."3 or 1 set <br>" ;
							}
							elseif($prereq_group[$f]['course_set'] == 0 || $prereq_group[$f]['course_set'] == 2){
								if($f==0){
									if($prereq_group[$f]['course_set'] == 2){
										$orgroup[$d]['req_course_code']=$stu_req[$d]['course_code'];
										$orgroup[$d][$g]['course_code']=$prereq_group[$f]['course_code'];
										$g++;
									}
									
								}
								else{
									if($prereq_group[($f-1)]['course_set'] == 2 && $prereq_group[($f)]['course_set'] == 2){
										$orgroup[$d]['req_course_code']=$stu_req[$d]['course_code'];
										$orgroup[$d][$g]['course_code']=$prereq_group[$f]['course_code'];
										$g++;
									}
									elseif($prereq_group[($f-1)]['course_set'] == 2 || $prereq_group[($f)]['course_set'] == 0){
										$orgroup[$d]['req_course_code']=$stu_req[$d]['course_code'];
										$orgroup[$d][$g]['course_code']=$prereq_group[$f]['course_code'];
										$g++;
									}
								}
							}
						}
					}
					
					
					//echo"d =$d e=$e". $stu_req[$d]['prereq'][$e]['course_code']."<pre>";;
					//echo "student".$stu_req[$d]['prereq'][$e]['course_code']."<br>";
					if(!empty($orgroup[$d])){
						/*echo "orgroup <pre>";
						print_r($orgroup[$d]);
						echo "student prereq list <pre>";
						print_r($stu_req[$d]['prereq']);*/
						//echo "<pre>".$stu_req[$d]['prereq'][$e]['course_code'];
						//print_r(array_column($orgroup[$d],'course_code'));
						//print_r($orgroup[$d]);
						$loop4 = sizeof($orgroup[$d]);
						for($g=0; $g<$loop4; $g++){
							$loop5=sizeof($stu_completed_temp);
							for($h=0; $h<$loop5; $h++){
								if(!empty($orgroup[$d][$g]['course_code'])){
									if($stu_completed_temp[$h]['course_code'] == $orgroup[$d][$g]['course_code']){
											unset($stu_req[$d]['prereq'][$e]);	
									}
								}
							}
							/*if(in_array($stu_req[$d]['prereq'][$e]['course_code'],array_column($orgroup[$d],'course_code'))){
								//unset($stu_req[$d]['prereq'][$e]);
								//echo "yes is in array ".$stu_req[$d]['prereq'][$e]['course_code']."<br>";
							}
							else{
								unset($stu_req[$d]['prereq'][$e]);
							}*/
						}
					}
					
				}
			}
		}
		}
	}
	/*echo "stu_foundation";
	print_r($stu_foundation);*/
	$all_foundation_loop = sizeof($stu_foundation);
	for($i=0; $i<$all_foundation_loop; $i++)
	{
		for($j=0; $j<sizeof($stu_completed); $j++)
		{	
				if(!empty($stu_foundation[$i]['course_code']))
				{
					if($stu_foundation[$i]['course_code']==$stu_completed[$j]['course_code'])
					{
						
						unset($stu_foundation[$i]);
						break 1;
					}
					/*echo $stu_foundation[$i]['course_set'] . "<br>";
					print_r($foundation_set);*/
					elseif($stu_foundation[$i]['course_set'] != 0){
						if(in_array($stu_foundation[$i]['course_set'],$foundation_set)){
							//echo "deadepool";
							unset($stu_foundation[$i]);
							break 1;
							
						}
					}
				}
			}
			  
		  if(!empty($stu_foundation[$i]['course_code'])){
				if($stu_foundation[$i]['course_status'] == "REQ")
				{
					$foundation_details = getFoundationCourseFromCoursecode($foundation_databasename,$stu_foundation[$i]['course_code']);
					$stu_req_foundation[$stu_foundation_count]['course_code']= $foundation_details[0]['course_code'];
					if(!empty($stu_req[$req_count]['course_code'])){
					$stu_req_foundation[$stu_foundation_count]['course_type']= "FOUNDATION";
					}
					$stu_req_foundation[$stu_foundation_count]['credit']= $foundation_details[0]['credit'];
					$stu_req_foundation[$stu_foundation_count]['course_ava']= $foundation_details[0]['course_ava'];
					$stu_req_foundation[$stu_foundation_count]['course_set']= $foundation_details[0]['course_set'];
					$stu_foundation_count++;
				}
				  unset($all_req[$i]);
		  }
	}
	/*echo "<pre>";
	print_r($stu_req[0]['prereq']);*/
	/*echo "orgroup  <pre>";
	print_r($orgroup);*/
	
	
	$result['foundation'] = $stu_req_foundation;
	$result['required'] = $stu_req;
	/*echo  "student req  <pre>";
	print_r($result);*/
	
	return $result;
}

function studentprereqsubject($database,$coursecode){
	$rows = array();
 $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `req_course_code`,`course_code`, `credit`, `course_name`, `course_set`,`course_ava` FROM `$database` WHERE `req_course_code` = '$coursecode';";
  // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. studentprereqsubject');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');
	/*echo "<pre>";
	print_r($rows);*/
    return $rows;
}

function courseset($student_id,$database){
	 $dbc = dbconnect('local');
	$stu_completed = completedcourses($student_id);
	$set=array();
	$counter = 0;
	$loop=sizeof($stu_completed);
	$flag=0;
//	echo "$loop";
	for($i=0; $i<$loop; $i++){
		//echo "$i";
		$rows = array();
		$coursecode =$stu_completed[$i]['course_code'];
		$query = " SELECT `course_set` FROM `$database` WHERE `course_code` = '$coursecode';";
		$result = $dbc->query($query) or die('.Error querying database. courseset');
   		 while ($row = $result->fetch_assoc()) {
       	 $rows[] = $row;
		 }
		//echo $stu_completed[$i]['course_type'];
		if($stu_completed[$i]['course_type']=="ELECTIVE" || $stu_completed[$i]['course_type']=="elective" || (strcasecmp($stu_completed[$i]['course_type'], "elective") == 0)){
		//	echo "iambatman";
			if($flag == 0 ){
				$coursecode ="GCIS ELE";
				$flag =2;
			}
			else{
				$coursecode ="GCIS ELE".$flag;
				$flag++;
			}
			
		//	echo $coursecode;
			$query = " SELECT `course_set` FROM `$database` WHERE `course_code` = '$coursecode';";
			$result = $dbc->query($query) or die('.Error querying database. courseset');
			 while ($row = $result->fetch_assoc()) {
			 $rows[] = $row;
			 }
			// print_r($rows);
		}
		
		if(!empty($rows)){
			$set[$counter]=$rows[0]['course_set'];
			$counter++;
		}
	}
	/*echo "<pre>";
	print_r($set);*/
    return $set;

}

function checkset($set){
	
	if($set == 0){
		//echo "none";
	}
	elseif($set == 1){
		echo "style=\"border:2pt solid blue;\"";
	}
	elseif($set == 2){
		echo "style=\"border:2pt solid red;\"";
	}
	elseif($set == 3){
		echo "style=\"border:2pt solid #33CC33;\"";
	}
	elseif($set == 4){
		echo "style=\"border:2pt solid #66FFFF;\"";
	}
	elseif($set == 5){
		echo "style=\"border:2pt solid black;\"";
	}
	elseif($set == 6){
		echo "style=\"border:2pt solid yellow;\"";
	}
	return 0;
}
function checkset2($set){
	
	if($set == 0){
		//echo "none";
	}
	elseif($set == 1){
		echo "style=\"background-color:yellow;\"";
	}
	elseif($set == 2){
		echo "style=\"background-color: #FFB2B2;\"";
	}
	elseif($set == 3){
		echo "style=\"background-color: #33CC33;\"";
	}
	elseif($set == 4){
		echo "style=\"background-color:#66FFFF;\"";
	}
	elseif($set == 5){
		echo "style=\"background-color:black;\"";
	}
	elseif($set == 6){
		echo "style=\"background-color: yellow;\"";
	}
	return 0;
}
function studentgrade($studentid,$coursecode){
	$dbc = dbconnect('local');
		$query = " SELECT `grade` FROM `student_course_details` WHERE `student_id` = '$studentid' AND `course_code` = '$coursecode';";
		$result = $dbc->query($query) or die('.Error querying database. studentgrade');
   		 while ($row = $result->fetch_assoc()) {
       	 $rows[] = $row;
		}
		if(!empty($rows)){
			$set=$rows[0]['grade'];
		}
	
	/*echo "<pre>";
	print_r($set);*/
    return $set;

}

/*function prereq_courseset($database,$coursecode){
	$rows = array();
 	$dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `req_course_code`,`course_code`, `credit`, `course_name`, `course_set`,`course_ava` FROM `$database` WHERE `req_course_code` = '$coursecode' AND (`course_set` = '2' OR `course_set` = '0');";
 //  echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getfoundationcourse');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');
	echo "<pre>";
	print_r($rows);
    return $rows;
}*/

function all_courses($major){
		$dbc = dbconnect('local');
		$result= array();
		$rows = array();
		$set = array();
		$query = "show TABLES from srms LIKE '".$major."%\_req\_%';";
	//	echo $query;
		$result = $dbc->query($query) or die('.Error querying database'.$query.' all_courses table');
   		 while ($row = $result->fetch_array(MYSQLI_NUM)) {
       	 $rows[] = $row;
		}
		if(!empty($rows)){
			$loop1 = sizeof($rows);
			
			for($i=0; $i<$loop1; $i++){
				$curriculum=$rows[$i][0];
			$query = "SELECT `course_code`,`course_name`,`credit` FROM `$curriculum`;";
			$result = $dbc->query($query) or die('.Error querying database'.$query.' all_courses curriculum');
			 while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			 $rowsset[] = $row;
			}
			$result= unique_array($rowsset);
			$set['required']=$result;
			
		}
		}
	//	echo "<pre>";print_r($rowsset);
		
		
		$query = "show TABLES from srms LIKE '".$major."%\_%\_foundation\_%';";
		//echo $query."<br>";
		$result = $dbc->query($query) or die('.Error querying database'.$query.' foundationall_courses');
   		 while ($row = $result->fetch_array(MYSQLI_NUM)) {
       	 $rows1[] = $row;
		}
		if(!empty($rows1)){
			$loop1 = sizeof($rows1);
			//print_r($rows1);
			for($i=0; $i<$loop1; $i++){
				$curriculum=$rows1[$i][0];
				//echo $curriculum."<br>";
			$query = "SELECT `course_code`,`course_name`,`credit` FROM `$curriculum`;";
			$result = $dbc->query($query) or die('.Error querying database'.$query.' curriculum 2 all_courses');
				 while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $rowsset1[] = $row;
				}
			}
				$result= unique_array($rowsset1);
					$set['foundation']=$result;
		}
	//echo "<pre>";print_r($rowsset1);
	return $set;
}

function all_major_course(){
	$dbc = dbconnect('local');
	$resultset['required']= array();
	$resultset['foundation']= array();
	$list=getMajorsList();
	$list = array_column($list, 'major');
//	echo "<pre>";print_r($list);
	//echo "<pre>";print_r($resultset);
		//echo "<pre>";print_r($result);
	for($i=0; $i<sizeof($list); $i++){
		$result =  all_courses($list[$i]);
		//print_r($result);
		if(!empty($result)){
		$resultset['required']=array_merge($resultset['required'],$result['required']);
		$resultset['foundation']=array_merge($resultset['foundation'],$result['foundation']);
		}
	}
	$set['required']= unique_array($resultset['required']);
	asort($set['required']);
	$set['foundation']= unique_array($resultset['foundation']);
	asort($set['foundation']);

	//echo "<pre>";print_r($set);
		return $set;
}

function unique_array($data){
	$fieldValue ="";
	 foreach($data as $i => $dataRow)
    {
        foreach($dataRow as $course_code => $fieldValue)
        {
			//echo $course_code;
			if($course_code == "course_code"){
				for($j=0; $j<$i; $j++)
				{
					if($data[$j] != "" && $fieldValue != ""){
					if($data[$j][$course_code] == $fieldValue)
					{
						$data[$i] = "";
					}
					}
				}
			}
		}
    }
	asort($data);
	$data = array_filter($data);
	//echo "<pre>";print_r(array_filter($data));//print_r($data);
	return($data);
}
function completedElective($studentid) {
	$dbc = dbconnect('local');

    $query = " SELECT student_id,credit, course_code, semester, year, grade, course_type FROM student_course_details WHERE student_id = '$studentid' AND course_type = 'Elective';";
    //echo $query;
    $result_set = $dbc->query($query) or die('Error querying database.completedElective');
    //$result = $result_set;
    $result = $result_set->num_rows;
    //echo $result;

    return $result;
}

// Email Password Reset
function reset_token(){
	return md5(uniqid(rand()));
}
function set_token($user,$token){
	$dbc = dbconnect('local');

	$query ="UPDATE  login set `reset_key`='$token' WHERE username = '".$user[0]['username']."' AND user_type='".$user[0]['user_type']."' ; ";
	//echo $query."<br>";
	 if ($dbc->query($query) === TRUE) {
        return $token;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
	
	
	
}

function user_exists($user,$usertype){
	$rows =array();
	$dbc = dbconnect('local');

    $query = "SELECT * FROM login WHERE username = '$user' AND user_type = '$usertype';";
   // echo $query;
    $result = $dbc->query($query) or die('Error querying database.user_exists');
	
	 while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	//  print_r($rows);
	 return $rows;
	
}

function send_mail($user){
	$token = set_token($user,reset_token());
	$message = "Reset Your Password  <br>";
$message .= "gu-blade-spare1.compsci.gannon.edu/";
	$message .= "SRMS/reset_password.php?token=".$token."&user=".$user[0]['username']."&usertype=".$user[0]['user_type'];
	$to = $user[0]['username']."@knights.gannon.edu";
	include('gmail.php');
	
	//echo $message;
//	mail($to,$subject,$message,$headers);
}

function check_user_token($user,$usertype,$token){
		$rows =array();
	$dbc = dbconnect('local');

    $query = "SELECT * FROM login WHERE username = '$user' AND user_type = '$usertype' AND  reset_key='$token';";
   // echo $query;
    $result = $dbc->query($query) or die('Error querying database.user_exists');
	
	 while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	//  print_r($rows);
	 return $rows;
	
	
}
function update_user_password($user,$usertype,$password){
	$dbc = dbconnect('local');
	$password = md5($password);
	//echo $password."<br>";
	$query ="UPDATE login set `password`='".$password."' WHERE username = '".$user."' AND user_type='".$usertype."'; ";
//	echo $query."<br>";
	 if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
	
	
}

function get_set($course){



}

function next_semester(){
	@$year = date("Y");
	@$month = date("m");
	
	if($month > 0 && $month < 8 ){
		$semester = "Fall";
	}
	else{
		$semester = "Spring";
	}
	
	$result[0]=$year;
	$result[1]=$semester;
	
	return $result;
}
?>
