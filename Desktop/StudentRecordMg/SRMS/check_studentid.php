<?php include('includes/function.php'); 

$dbc = dbconnect('local');

 $query = "SELECT * FROM student_details WHERE student_id = $studentid";
    //echo $query;
    $result_set = $dbc->query($query) or die('Error querying database.');
    //$result = $result_set;
    $result = $result_set->num_rows;
    echo $result;


 /*   if ($result == 1) {
        $error= "User already exist";

        return $error;
    } else {
        $error = "";
        return $error;
    }*/


?>