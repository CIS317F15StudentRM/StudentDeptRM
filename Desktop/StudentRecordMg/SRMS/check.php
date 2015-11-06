<?php
include('includes/function.php');

if(isSet($_POST['username']))
{
$username = $_POST['username'];

$dbc = dbconnect('local');

 $query = "SELECT * FROM student_details WHERE student_id = $username";
    //echo $query;
    $result_set = $dbc->query($query) or die('Error querying database.');
    //$result = $result_set;
    $result = $result_set->num_rows;
   // echo $result;


    if ($result >= 1) {
        echo "<font color=\"red\">Student id already taken</STRONG></font>";

    } else {
        echo '';
    }


}
?>