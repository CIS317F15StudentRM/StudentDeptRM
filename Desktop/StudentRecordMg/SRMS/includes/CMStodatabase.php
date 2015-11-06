<?php
		$error ="";
		/*function  add_foundation_course_curriculum($database,$values,$req_code){
			$dbc = dbconnect('local');
			//echo "$req_code ; <pre>";
			//echo "<br>".$values['prereq_id'][0]['course_name'];
		//print_r($values);
	    //echo $student.$course_code.$status_status;
		$req_course_code = $dbc->real_escape_string($req_code);
		$course_code =  $dbc->real_escape_string($values['prereq_id'][0]['course_code']);
		$course_name =  $dbc->real_escape_string($values['prereq_id'][0]['course_name']);
		$credit= $dbc->real_escape_string($values['prereq_id'][0]['credits']);
		$course_ava =  $dbc->real_escape_string($values['prereq_id'][0]['semester_ava']);
		$course_set =  $dbc->real_escape_string($values['set']); 

		$query = "INSERT INTO $database (req_course_code,course_code, credit, course_name, course_set, course_ava) VALUES ('$req_course_code','$course_code','$credit','$course_name','$course_set','$course_ava');";

     	echo $query."<br>";

	/*	if ($dbc->query($query) === TRUE) {
			return "course added successfully";;
		} else {
			return "Error prerequiite: " . $query . "<br>" . $dbc->error;
		}
	
		}*/
		
?>
<?php
		
		$error ="";
		function  add_prereq_course_curriculum($database,$values,$req_code){
			$dbc = dbconnect('local');
			//echo "$req_code ; <pre>";
			//echo "<br>".$values['prereq_id'][0]['course_name'];
		//print_r($values);
	    //echo $student.$course_code.$status_status;
		$req_course_code = $dbc->real_escape_string($req_code);
		$course_code =  $dbc->real_escape_string($values['prereq_id'][0]['course_code']);
		$course_name =  $dbc->real_escape_string($values['prereq_id'][0]['course_name']);
		$credit= $dbc->real_escape_string($values['prereq_id'][0]['credits']);
		$course_ava =  $dbc->real_escape_string($values['prereq_id'][0]['semester_ava']);
		$course_set =  $dbc->real_escape_string($values['set']); 

		$query = "INSERT INTO $database (req_course_code,course_code, credit, course_name, course_set, course_ava) VALUES ('$req_course_code','$course_code','$credit','$course_name','$course_set','$course_ava');";

     //	echo $query."<br>";

		if ($dbc->query($query) === TRUE) {
			return "course added successfully";;
		} else {
			return "Error prerequiite: " . $query . "<br>" . $dbc->error;
		}
	
		}
		
?>
<?php 
		function add_req_course_curriculum($database , $values){
	    $dbc = dbconnect('local');
		//print_r($values);
	    //echo $student.$course_code.$status_status;
		$course_code =  $dbc->real_escape_string($values['course_code']);
		$course_name =  $dbc->real_escape_string($values['course_name']);
		$credit= $dbc->real_escape_string($values['credits']);
		$course_ava =  $dbc->real_escape_string($values['semester_ava']);
		$course_set =  $dbc->real_escape_string($values['set_number']); 

		$query = "INSERT INTO $database (course_code, credit, course_name, course_set, course_ava) VALUES ('$course_code','$credit','$course_name','$course_set','$course_ava');";

   // echo "$query <br>";

		if ($dbc->query($query) === TRUE) {
			return "course added successfully";;
		} else {
			return "Error required: " . $query . "<br>" . $dbc->error;
		}
	}
?>
<?php 
function create_table($majorcode,$semester,$year){
		    $dbc = dbconnect('local');

	$req_database = $majorcode."_".$semester."_".$year."_req_courses";
	$prereq_database = $majorcode."_".$semester."_".$year."_prereq_courses";
	$foundation_database = $majorcode."_".$semester."_".$year."_foundation_courses";
	$query1 = "CREATE TABLE `$foundation_database` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `course_set` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ";
	$query2="CREATE TABLE `$prereq_database` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_course_code` varchar(45) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_set` int(11) NOT NULL,
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ";
	$query3="CREATE TABLE `$req_database` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `course_set` int(11) DEFAULT '0',
  `course_ava` int(11) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ";
$query4 = "INSERT INTO `$foundation_database` (`course_id`, `course_code`, `credit`, `course_name`, `course_ava`, `course_set`) VALUES
(1, 'GCIS 500', 3, 'GCIS 500', 0, 0),
(2, 'GCIS 501', 3, 'GCIS 501', 0, 0),
(3, 'GCIS 502', 3, 'GCIS 502', 0, 0),
(4, 'GCIS 503', 3, 'GCIS 503', 0, 0),
(5, 'GCIS 504', 3, 'GCIS 504', 0, 0),
(6, 'GCIS 505', 3, 'GCIS 505', 0, 2),
(7, 'GCIS 506', 3, 'GCIS 506', 1, 2),
(9, 'GCIS 508', 3, 'GCIS 508', 2, 0),
(10, 'GCIS 509', 3, 'GCIS 509', 0, 1),
(11, 'GCIS 510', 3, 'GCIS 510', 1, 1);";
/*echo $query1."<br>";
echo $query2."<br>";
echo $query3."<br>";*/
echo $query4."<br>";

	if ($dbc->query($query1) === TRUE) {
		echo "1";
		if ($dbc->query($query2) === TRUE) {
			echo "2";
			if ($dbc->query($query3) === TRUE) {
				echo "3";
				if ($dbc->query($query4) === TRUE) {
					echo "4";
     		  	 return 1;
				}
			}
		}
    } else {
        echo "Error: " . $query1 . "<br>" . $dbc->error;
    }
}
?>
<?php
function cms_to_database($majorcode,$semester,$year,$test){
	$curriculum = $test;
$database = $majorcode."_".$semester."_".$year."_req_courses";
	//$database = "774_fall_2016_req_courses";
		include('CMSarray.php');
		
		
	$database1 = $majorcode."_".$semester."_".$year."_prereq_courses";
	$database2 = $majorcode."_".$semester."_".$year."_foundation_courses";
	create_table($majorcode,$semester,$year);
	//	$database1 = "774_fall_2016_prereq_courses";
		$temp= "";
		$loop = sizeof($curriculum);
		//add_foundation_course_curriculum($database2);
		for($i=0; $i<$loop; $i++)
		{
			
			//echo "$i = <pre>";
			$error = add_req_course_curriculum($database , $curriculum[$i]);
			if(array_key_exists('pre_req' ,$curriculum[$i])){
			//	echo "<pre>";
			//print_r($curriculum[$i]['pre_req']);	
				for($j=0; $j<sizeof($curriculum[$i]['pre_req']); $j++){
					$result = add_prereq_course_curriculum($database1 , $curriculum[$i]['pre_req'][$j],$curriculum[$i]['course_code']);
				}
			}
			//print_r($curriculum[$i]);
		}
		//echo "<pre>";
	//	print_r($curriculum);
		return 1;
		
}
?>
