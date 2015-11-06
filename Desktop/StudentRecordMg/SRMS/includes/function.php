
<?php
/*
 echo '<p class="message" >';
	   echo '<p class="error" >';
	 echo "</p>";

*/
ob_start();
include('connection.php');
// Regular Function

include("csv_functions.php");

//ini_set('max_execution_time', 3000);

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

/* function conform_query($result_set) {
  if (!$result_set) {
  die("Database query failed: " . mysql_error());
  }
  } */

function logout() {
    session_destroy();
    // Double check to see if their sessions exists
    if (isset($_SESSION["usertype"])) {
        redirect_to("update_student.php");
    } else {
        redirect_to("index.php");
   exit();
    }
}

function file_check($temp) {
    $result = "";
    if (isset($temp["file"])) {
        //print_r($temp);
        $allowedExts = array("csv");
        $mimes = array('application/vnd.ms-excel', 'application/vnd.msexcel', 'application/csv', 'text/plain', 'text/csv', 'text/tsv', 'text/comma-separated-values', 'application/excel');
//	$csv_mimetypes = array('text/csv','text/plain','application/csv','text/comma-separated-values','application/excel','application/vnd.ms-excel','application/vnd.msexcel','application/octet-stream','application/txt');
        if (in_array($temp['file']['type'], $mimes)) {
            // do something
            if ($temp["file"]["size"] > 102400) {
                $result = "File size shoud be less than 100 kB<br />";
            }
            $result = "success";
            ;
        } else {
            $result = "Sorry, File type not allowed Only CSV file";
        }

        return $result;
    }
}

// database query function

function login_validation($usertype, $email, $password) {
    global $dbc;
	$password = md5($password);
	//echo "$password"; 
    $query = " SELECT * FROM login WHERE username = '" . $email . "' AND password = '" . $password . "' AND user_type = '" . $usertype . "';";
    //echo $query;
    $result_set = $dbc->query($query) or die('Error querying database.login_validation');
    //$result = $result_set;
    $result = $result_set->num_rows;
   // echo $result;

    if ($result == 1) {
        $_SESSION["login_user"] = $email;
        $_SESSION["usertype"] = $usertype;

        return 1;
    } else {
        $error = " Username or Password is not correct ";
        return $error;
    }
}

//======x=x=================x===============================================x=======================================x

function add_students_from_csv($files) {
    $filename = "";
	//print_r($files);
    $filename = $files["file"]["tmp_name"];
    //print_r($files);
    $options['delimiter'] = ",";
    //echo tableFromCsv($files["file"]["name"], true, $options);
    //echo "<pre>";
    $result = extractCsv($filename, true, $options);
   // echo"<pre>";print_r($result);
//   echo "iambatman . $result";
	// print_r($result);
	$ids = array_column($result,"ID #");
	//echo "<pre>";print_r($ids);
	$keys=array_keys($result[0]);
	$check_keys = array_slice($keys,0,6);
	//echo "<pre>";print_r($check_keys);
	$format_key=array ("ID #", "Last", "First" , "Advisor", "Start SEM.",  "Option");
	// echo "<pre>";print_r($format_key);
	 //echo "value".($check_keys === $format_key);
	 if($check_keys === $format_key){
		//echo "iambatman";
		$students=array();
		$counter = 0;
	   // echo"<pre>";print_r($ids);
		for($i=0; $i<sizeof($ids); $i++){
			$check =studentid_validation($ids[$i]);
			if($check == "false"){
			//	echo "<br>".$ids[$i];
				$students[$counter][$i] = $ids[$i];
				$counter++;
			}
		//	echo $i."  ".$ids[$i]."<br>";
		}
		if($counter > 0){
	   // echo"<pre>";print_r($students);
			return $students;
		}
		else{
			
			$keys=array_keys($result[0]);
			//echo "<pre>";print_r($keys);
		  /*foreach ($result as $i => $values) {
				//echo "<pre>";print_r($values);
				add_student($values);
			}*/
			foreach ($result as $i => $values) {
				add_student($values);
				for($i=6; $i<sizeof($keys); $i++){
					//echo $values ['ID #'].$keys[$i];print_r($values[$keys[$i]]);echo "<br>";
					add_foundatation($values ['ID #'], "GCIS ".$keys[$i],$values[$keys[$i]]);
				}
				
			}
			return 1;
		}
	 }
	 else{
		 return 0;
	 }
}

//======x=x=================x===============================================x=======================================x


function add_student($values) {
    global $dbc;
    global $error;
    $query = "";
    if (isset($values['Start SEM.'])) {

        $str = $values['Start SEM.'];
        $sem = explode("/", $str);
        $sem1 = $sem[1];
        if (isset($sem[0])) {
            $sem0 = "20" . $sem[0];
        }

        if (strcasecmp($sem1, "sp") == 0) {
            $sem1 = "spring";
        } else if (strcasecmp($sem1, "fa") == 0) {
            $sem1 = "fall";
        } else if (strcasecmp($sem1, "su") == 0) {
            $sem1 = "summer";
        }

        if (!isset($values ['startsem'])) {
            $values ['startsem'] = $sem1;
        }
        if (!isset($values ['startyear'])) {
            $values ['startyear'] = $sem0;
        }
    }



    //print_r($values);
   
    $student_id = $dbc->real_escape_string($values ['ID #']);
    $last_name = $dbc->real_escape_string($values ['Last']);
    $first_name = $dbc->real_escape_string($values ['First']);
    $advisor = $dbc->real_escape_string($values ['Advisor']);
    $start_year = $dbc->real_escape_string($values ['startyear']);
    $start_semester = $dbc->real_escape_string(@$values ['startsem']);
    $major = $dbc->real_escape_string($values ['Option']);
     $call =cmc_call($major,$start_semester,$start_year);
	if($call ==0 ){
		echo "<h3>Contact Curriculum Management System's Admin. Curriculum not available<h3> ";
		return 0;
	}
	
    $query = "INSERT INTO student_details (student_id,advisor,first_name,last_name,start_semester,start_year,major) VALUES ('$student_id','$advisor','$first_name','$last_name','$start_semester','$start_year','$major');";

    //  echo "$query";

    if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
}

//======x=x=================x===============================================x=======================================x

// foundation corse for just list
function getFoundationCourse($curriculum) {

    $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = " SELECT `course_code`, `credit`, `course_name`, `course_set` FROM `$curriculum`;";
  // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getfoundationcourse');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

    $result = array_column($rows, 'course_code');
	/*echo "<pre>";
	print_r($result);*/
    return $result;
}

//======x=x=================x===============================================x=======================================x

function add_foundatation($student, $course_code, $status_status) {
    $dbc = dbconnect('local');
    //echo $student.$course_code.$status_status;
    $student = $dbc->real_escape_string($student);
    $course_code = $dbc->real_escape_string($course_code);
    $status_status = $dbc->real_escape_string($status_status);

    $query = "INSERT INTO student_foundation_courses (student_id, course_code, course_status) VALUES ('$student','$course_code','$status_status');";

    // echo "$query <br>";

    if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
}

//===========xxxxxx========================================xxxxxxxxxxxxxxxxxxxx==========================================
function update_student_foundation_courses($id, $course_code, $status_status){
	$dbc = dbconnect('local');
    //echo $student.$course_code.$status_status;
    $id = $dbc->real_escape_string($id);
    $course_code = $dbc->real_escape_string($course_code);
    $course_status = $dbc->real_escape_string($status_status);
		//echo $id;
    $query = "UPDATE student_foundation_courses SET course_code='$course_code',course_status='$course_status' WHERE student_foundation_course_id = '$id'";

     echo "$query <br>";

    if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
}


//======x=x=================x===============================================x=======================================x

function update_student($values) {

    global $dbc;
    global $error;

    //print_r($values);

    $student_id = $dbc->real_escape_string($values ['ID #']);
    $last_name = $dbc->real_escape_string($values ['Last']);
    $first_name = $dbc->real_escape_string($values ['First']);
    $advisor = $dbc->real_escape_string($values ['Advisor']);
    $start_year = $dbc->real_escape_string($values ['startyear']);
    $start_semester = $dbc->real_escape_string(@$values ['startsem']);
    $major = $dbc->real_escape_string($values ['Option']);
 	$call = cmc_call($major,$start_semester,$start_year);
	if($call ==0 ){
		echo "<h3>Contact Curriculum Management System's Admin. Curriculum not available<h3> ";
		return 0;
	}

    $query = "UPDATE student_details SET advisor='$advisor',first_name='$first_name',last_name='$last_name',start_semester='$start_semester',start_year='$start_year',major='$major' WHERE student_id='$student_id' ;";

   // echo "$query";

     	if ($dbc->query($query) === TRUE) {
      return 1;
      } else {
      echo "Error: " . $query . "<br>" . $dbc->error;
      } 
}

function student_new_course_details($student, $course_set, $credit_set, $semester_set, $year_set, $grade_set, $course_type_set) {
    $dbc = dbconnect('local');
    //echo $student.$course_code.$status_status;
    $course_set = $dbc->real_escape_string($course_set);
    $credit_set = $dbc->real_escape_string($credit_set);
    $semester_set = $dbc->real_escape_string($semester_set);
    $year_set = $dbc->real_escape_string($year_set);
    $grade_set = $dbc->real_escape_string($grade_set);
    $course_type_set = $dbc->real_escape_string($course_type_set);

    $query = "INSERT INTO student_course_details (student_id, course_code, credit, semester,year, grade, course_type) VALUES ('$student','$course_set','$credit_set','$semester_set','$year_set','$grade_set','$course_type_set');";

   // echo "$query";

    if ($dbc->query($query) === TRUE) {
        return 1;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }
}

//===================================xxxxxxxxxxxxxxxxxxxxxxxxxxxxx=====================================
function select_all_foundation($studentid){
	 $dbc = dbconnect('local');
	 $predatabase = studentcurriculum($studentid);
	$foundation_databasename = $predatabase."_foundation_courses";

	$rows = array();
	 $studentid = $dbc->real_escape_string($studentid);
	// $query = "SELECT student_foundation_course_id,student_id,course_code,course_status FROM student_foundation_courses WHERE student_id = '$studentid';";
	$query = "SELECT student_foundation_courses.student_foundation_course_id,student_foundation_courses.student_id,student_foundation_courses.course_code,student_foundation_courses.course_status,".$foundation_databasename.".course_set FROM student_foundation_courses,".$foundation_databasename." WHERE student_id = '$studentid' AND ".$foundation_databasename.".course_code = student_foundation_courses.course_code ORDER BY `student_foundation_courses`.`course_code` ASC";
	 //echo $query;
	 $result = $dbc->query($query) or die('Error querying database.SELECT FOUNDATION');
     while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	
	//print_r($rows);
	//$result =sizeof($rows);
	//echo $result;
	//return($rows);
	if ($rows >= 1){
		 return $rows;
    } else {
        echo "Error: No Foundation found<br>" ;//. $dbc->error;
    }
	/* if ($dbc->query($query) === TRUE) {
        return $rows;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }*/
}


//========================XXXXX========================XXXXXXXXXXXXXX==========================XXXXXXXXXXXXXXXXXX===================

function select_foundation($studentid){
	 $dbc = dbconnect('local');
	 $predatabase = studentcurriculum($studentid);
	$foundation_databasename = $predatabase."_foundation_courses";

	$rows = array();
	 $studentid = $dbc->real_escape_string($studentid);
	// $query = "SELECT student_foundation_course_id,student_id,course_code,course_status FROM student_foundation_courses WHERE student_id = '$studentid';";
	$query = "SELECT student_foundation_courses.student_foundation_course_id,student_foundation_courses.student_id,student_foundation_courses.course_code,student_foundation_courses.course_status,".$foundation_databasename.".course_set FROM student_foundation_courses,".$foundation_databasename." WHERE student_id = '$studentid' AND ".$foundation_databasename.".course_code = student_foundation_courses.course_code AND student_foundation_courses.course_status = 'REQ' ORDER BY `student_foundation_courses`.`course_code` ASC";
	 //echo $query;
	 $result = $dbc->query($query) or die('Error querying database.SELECT FOUNDATION');
     while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	
	//print_r($rows);
	//$result =sizeof($rows);
	//echo $result;
	//return($rows);
	if ($rows >= 1){
		 return $rows;
    } else {
        echo "Error: No Foundation found<br>" ;//. $dbc->error;
    }
	/* if ($dbc->query($query) === TRUE) {
        return $rows;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }*/
}
//======================xxxxxxxxxxxxxxxxxxxx=================================xxxxxxxxxxxxxxxxxxxxxx=================================================
function select_waived_foundation($studentid){
	 $dbc = dbconnect('local');
	 $predatabase = studentcurriculum($studentid);
	$foundation_databasename = $predatabase."_foundation_courses";

	$rows = array();
	 $studentid = $dbc->real_escape_string($studentid);
	// $query = "SELECT student_foundation_course_id,student_id,course_code,course_status FROM student_foundation_courses WHERE student_id = '$studentid';";
	$query = "SELECT student_foundation_courses.student_foundation_course_id,student_foundation_courses.student_id,student_foundation_courses.course_code,student_foundation_courses.course_status,".$foundation_databasename.".course_set FROM student_foundation_courses,".$foundation_databasename." WHERE student_id = '$studentid' AND ".$foundation_databasename.".course_code = student_foundation_courses.course_code AND student_foundation_courses.course_status = 'TR' ";
	// echo $query;
	 $result = $dbc->query($query) or die('Error querying database.SELECT FOUNDATION');
     while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	
	//print_r($rows);
	//$result =sizeof($rows);
	//echo $result;
	//return($rows);
	if ($rows >= 1){
		 return $rows;
    } else {
        echo "Error: No Foundation found<br>" ;//. $dbc->error;
    }
	/* if ($dbc->query($query) === TRUE) {
        return $rows;
    } else {
        echo "Error: " . $query . "<br>" . $dbc->error;
    }*/
}
// Serch student by id ========================================xxxxxxxxxxxxxxxxxx
function search_student($values){
	$dbc = dbconnect('local');
	
	 
	if(isset($values ['ID #']))$student_id = $dbc->real_escape_string($values ['ID #']);	 
	if(isset($values ['Last'])){$last_name = $dbc->real_escape_string($values ['Last']);}
    if(isset($values ['First'])){$first_name = $dbc->real_escape_string($values ['First']);}
    if(isset($values ['Advisor'])){$advisor = $dbc->real_escape_string($values ['Advisor']);}
    if(isset($values ['startyear'])){$start_year = $dbc->real_escape_string($values ['startyear']);}
    if(isset($values ['startsem'])){$start_semester = $dbc->real_escape_string(@$values ['startsem']);}
    if(isset($values ['Option'])){$major = $dbc->real_escape_string($values ['Option']);}
	 
	 
	 
	 
	 $query = "SELECT student_id,advisor, first_name, last_name, start_semester, start_year, major FROM student_details WHERE 1 AND ";
	 
	 if(!empty($student_id)){

	  $query .= "student_id = '$student_id' AND ";
	 }
	 if(!empty($last_name)){

	  $query .= "last_name = '$last_name' AND ";
	 }
	 if(!empty($first_name)){

	  $query .= "first_name = '$first_name' AND ";
	 }
	 if(!empty($advisor)){

	  $query .= "advisor = '$advisor' AND ";
	 }
	 if(!empty($start_year)){

	  $query .= "start_year = '$start_year' AND ";
	 }
	 if(!empty($start_semester)){

	  $query .= "start_semester = '$start_semester' AND ";
	 }
	 if(!empty($major)){

	  $query .= "major = '$major' AND ";
	 }
	  $query .= " 1 ;";
	// echo $query;
	 $result = $dbc->query($query) or die('Error querying database.SEARCH STUDENT');
	 
	 $resultno = $result->num_rows;
     while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	
	
	
	//echo "<pre>";
	//echo $resultno;
	//print_r($rows);
	 if ($resultno >= 1) {
       
        return $rows;
    } else {
        $error= array();
        return $error;
    }
	
}

//========xxx==============xxx======================xxx=====================xxx

function getAdvisorList() {

    $dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = "SELECT user.salutation,user.first_name , user.last_name,user.username FROM  user INNER JOIN login ON user.username = login.username WHERE login.user_type = \"advisor\";";
   // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getAdvisorList');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');

    return $rows;
}

function getMajorsList(){
	
	$dbc = dbconnect('local');
    //$curriculum = "875_fall_2014_foundation_courses";
    $query = "SELECT major, name, grad_undergrad FROM majors;";
   // echo $query;
    $result = $dbc->query($query) or die('.Error querying database. getMajorsList');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   // $result = array_column($rows, 'course_code');

    return $rows;
	
}
//==================xxxxxxxxxxxxx==================================xxxxxxxxxxxxx===============

function studentid_validation($studentid) {
	$dbc = dbconnect('local');

    $query = "SELECT * FROM student_details WHERE student_id = $studentid";
    //echo $query;
    $result_set = $dbc->query($query) or die('Error querying database.studentid_validation');
    //$result = $result_set;
    $result = $result_set->num_rows;
   // echo $result;

    if ($result == 1) {
        $error= "false";

        return $error;
    } else {
        $error = "true";
        return $error;
    }
}

function table_exists($tablename){
		$dbc = dbconnect('local');
	
    $query = "SHOW TABLES LIKE '$tablename';";
	//echo $query;
	
    $result = $dbc->query($query) or die('Error querying database.tableexists');
	//$result = sizeof($result);
	while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
	//print_r($rows);
	if(empty($rows)){
		return 0; //false
	}
	else{
		return 1; //true
	}
	
	
}

function advisor_details($id){
  $dbc = dbconnect('local');
    $query = "SELECT `user_id`, `first_name`, `last_name`, `username`, `salutation` FROM `user` WHERE `username`= '$id';";
   //echo $query;
    $result = $dbc->query($query) or die('.Error querying database.advisor_details ');
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
//	$row = $result_set->fetch_array(MYSQLI_ASSOC);

   
	/*echo "<pre>";
	print_r($rows);*/
    return $rows;
}

//===================xxxxxxxxxxxxxxxxx=============================================xxxxxxxxxxxxxxxxxxxxxxxxxxxx=============================================
function tableFromCsv($filename, $titles = true, $options = null) {
    if (!file_exists($filename) || !is_readable($filename)) {
        return false;
    } else {
        $options['length'] = (isset($options['length'])) ? $options['length'] : 0;
        $options['delimiter'] = (isset($options['delimiter'])) ? $options['delimiter'] : ',';
        $options['enclosure'] = (isset($options['enclosure'])) ? $options['enclosure'] : '"';
        $options['escape'] = (isset($options['escape'])) ? $options['escape'] : '\\';
        $file = fopen($filename, 'r');
        while (($rows[] = fgetcsv($file, $options['length'],
                $options['delimiter'], $options['enclosure'],
                $options['escape'])) !== false) {}
        $output = "<table>\n<tr>\n";
        if ($titles) {
            $headers = array_shift($rows);
            foreach ($headers as $header) {
                $output .= '<th>' . ucwords($header) . "</th>\n";
            }
            $output .= "</tr>\n";
        }
        foreach ($rows as $row) {
            if (is_array($row)) {
                $output .= "<tr>\n";
                foreach ($row as $item) {
                    $output .= "<td>$item</td>\n";
                }
                $output .= "</tr>\n";
            }
        }
        $output .= "</table>\n";
        fclose($file);
        return $output;
    }
}

function extractCsv($filename, $titles = true, $options = null) {
//	echo "extractCSv";
	//echo $filename;
    if (!file_exists($filename) || !is_readable($filename)) {
		//echo !file_exists($filename);echo !is_readable($filename);
        return false;
    } else {
		//echo "iambatman";
        $options['length'] = (isset($options['length'])) ? $options['length'] : 0;
        $options['delimiter'] = (isset($options['delimiter'])) ? $options['delimiter'] : ',';
        $options['enclosure'] = (isset($options['enclosure'])) ? $options['enclosure'] : '"';
        $options['escape'] = (isset($options['escape'])) ? $options['escape'] : '\\';
        $file = fopen($filename, 'r');
        while (($rows[] = fgetcsv($file, $options['length'],
                $options['delimiter'], $options['enclosure'],
                $options['escape'])) !== false) {}
        $output = "<table>\n<tr>\n";
        if ($titles) {
            $headers = array_shift($rows);
            foreach ($rows as $row) {
                if (is_array($row)) {
                    $csv[] = array_combine($headers, $row);
                }
            }
			//print_r($csv);
            return $csv;
        } else {
			//print_r($rows);
            return $rows;
        }
    }
}


?>
