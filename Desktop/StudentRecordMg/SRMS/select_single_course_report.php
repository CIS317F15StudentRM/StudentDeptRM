<?php include('includes/session_define.php'); ?>
<?php include('includes/function.php');?>
<?php include('includes/queries.php');?>
<?php $error = "";?>
<?php 
if(isset($_POST['submit'])){
	$_SESSION['single_course_major']=$_POST['major'];
	redirect_to("course_report.php");
}
?>
<?php include('includes/header.php');?>
  <?php include('includes/menu.php');?>
  <div id="page" class="container">
    <div id="student_id_wrapper">
      <div id="student_id_title">
        <h1>Single Course Report</h1>
      </div>
      <!-- End student_id_title div -->
      <div class="main">
        <form class="form" method="post" action="select_single_course_report.php">
          <table class="center simpletable design-table design-table-horizontal design-table-highlight center">
            <tbody>
              <tr class="name">
                <td><label for="advisor">Major</label></td>
                <td><select name="major" id="major">
                    <?php
						$row = getMajorsList();
						$loop = sizeof($row); 
						echo '<option value="ALL">ALL</option>';
						for($i=0; $i<$loop; $i++)
						{
							$option = $row[$i]['major'];
							//$option = $row[$i]['last_name'];
							echo '<option value="'.$option.'">'.$option.'</option>';
						}
					
					
					?>
                  </select></td>
              </tr>
            
            </tbody>
          </table>
          <p class="submit" align="center">
            <input name="submit" type="submit" value="Submit" />
          </p>
         
        </form>
      </div>
      <!-- End student_id div --> 
    </div>
    <!-- End student_id_wrapper div --> 
  </div>
  <!-- End Div Page-->
  <?php include('includes/footer.php'); ?>
