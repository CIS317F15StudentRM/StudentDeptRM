<?php // print_r($_SESSION);
?> 
<?php if($_SESSION['usertype'] == "administrator"){ ?>
<div id="menu-wrapper">
  <div id="menu" class="container">
    <ul>
      <li>Create New Student Record
        <ul>
          <li><a href="add_student_details.php">Add Single Student</a></li>
          <li><a href="add_students_details.php">Add Multiple Students</a></li>
        </ul>
      </li>
      <li>Update Existing Student Record
        <ul>
          <li><a href="update_student_id_details.php">Update Single Student</a></li>
          <li><a href="update_students_details.php">Update Multiple Students</a></li>
        </ul>
      </li>
      <li>Student Report
        <ul>
          <li><a href="student_id_report.php">Single Student Report</a></li>
          <li><a href="select_multiple_student_report.php">Multiple Students Report</a></li>
        </ul>
      </li>
      <li>Course Report
        <ul>
          <li><a href="select_single_course_report.php">Single Course Report</a></li>
          <li><a href="select_multiple_course_report.php">Multiple Courses Report</a></li>
        </ul>
      </li>
      <a href="profile.php">
      <li>Profile</li>
      </a> <a href="logout.php">
      <li>Logout</li>
      </a>
    </ul>
  </div>
  <!--End of MENU div --> 
</div>
<!-- End Div menu-wrapper-->
<?php } ?>
<?php if($_SESSION['usertype'] == "chairperson"){ ?>
<div id="menu-wrapper">
  <div id="menu" class="container">
    <ul>
      <li>Create New Student Record
        <ul>
          <li><a href="add_student_details.php">Add Single Student</a></li>
          <li><a href="add_students_details.php">Add Multiple Students</a></li>
        </ul>
      </li>
      <li>Update Existing Student Record
        <ul>
          <li><a href="update_student_id_details.php">Update Single Student</a></li>
          <li><a href="update_students_details.php">Update Multiple Students</a></li>
        </ul>
      </li>
      <li>Student Report
        <ul>
          <li><a href="student_id_report.php">Single Student Report</a></li>
          <li><a href="select_multiple_student_report.php">Multiple Students Report</a></li>
        </ul>
      </li>
      <li>Course Report
        <ul>
          <li><a href="select_single_course_report.php">Single Course Report</a></li>
          <li><a href="select_multiple_course_report.php">Multiple Courses Report</a></li>
        </ul>
      </li>
      <a href="profile.php">
      <li>Profile</li>
      </a> <a href="logout.php">
      <li>Logout</li>
      </a>
    </ul>
  </div>
  <!--End of MENU div --> 
</div>
<!-- End Div menu-wrapper-->
<?php } ?>
<?php if($_SESSION['usertype'] == "advisor"){ ?>
<div id="menu-wrapper">
  <div id="menu" class="container">
    <ul>
     
      <li>Student Report
        <ul>
          <li><a href="student_id_report.php">Single Student Report</a></li>
          <li><a href="select_multiple_student_report.php">Multiple Students Report</a></li>
        </ul>
      </li>
      <li>Course Report
        <ul>
          <li><a href="select_single_course_report.php">Single Course Report</a></li>
          <li><a href="select_multiple_course_report.php">Multiple Courses Report</a></li>
        </ul>
      </li>
      <a href="profile.php">
      <li>Profile</li>
      </a> <a href="logout.php">
      <li>Logout</li>
      </a>
    </ul>
  </div>
  <!--End of MENU div --> 
</div>
<!-- End Div menu-wrapper-->
<?php } ?>