<?php include('includes/session_define.php'); ?>
<?php 
include('includes/function.php'); 
//include('includes/session_define.php');
include('includes/header.php');
include('includes/menu.php');
$error ="";
?>
<?php 
if(isset($_SESSION['search'])){
	//echo "<pre>";
	//print_r($_SESSION['search']);
	$size = sizeof($_SESSION['search']);
	/*$output = "<table>\n<tr>\n";
	
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
        $output .= "</table>\n";*/
	 
}
else{
//	redirect_to("search_student_id.php");
}
?>

<div id="page" class="container">
  <div id="show_result_wrapper">
    <div id="show_result_title">
      <h1> Add New Student Details </h1>
      <br>
    </div>
    <!-- End show_result div -->
    <div class="main">
      <div class="result">
   
        <h3>Search Result</h3>
        
        <table id="result" class="design-table design-table-horizontal design-table-highlight center">
    <thead>
        <tr>
            <th>Student Id</th>
            <th>Advisor</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Major</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        	<?php for($i=0; $i<$size; $i++) { ?> 
            <td><label for="studentid"><?php echo $_SESSION['search'][$i]['student_id']; ?></label></td>
          <td><label for="advisor"><?php echo $_SESSION['search'][$i]['advisor']; ?></label></td>
          	<td><label for="fname"><?php echo $_SESSION['search'][$i]['first_name']; ?></label></td>
            <td><label for="lanme"><?php echo $_SESSION['search'][$i]['last_name']; ?></label></td>
            <td><label for="major"><?php echo $_SESSION['search'][$i]['major']; ?></label></td>
        </tr>
            <?php } ?>
    </tbody>
</table>
       
       
  </div>
  <!-- End show_result div --> 
</div>
<!-- End show_result_wrapper div -->
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
