<?php include('includes/session_define.php');?>
<?php 
include('includes/function.php');?>
<?php
include('includes/header.php');

include('login.php');
$error ="";
$msg=1;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script>

$(document).ready(function() {

    $("#username").change(function() {

        var usr = $("#username").val();

        if (usr.length >= 0) {
           
            $.ajax({
                type: "POST",
                url: "check.php",
                data: "username=" + usr,
                success: function(msg) {

                    $("#status").ajaxComplete(function(event, request, settings) {

                        if (msg == 'OK') {
                            $("#username").removeClass('object_error'); // if necessary
                            $("#username").addClass("object_ok");
                            $(this).html('');
						
                        } else {
                            $("#username").removeClass('object_ok'); // if necessary
                            $("#username").addClass("object_error");
                            $(this).html(msg);
							
                        }

                    });

                }

            });

        }

    });

});

</script>

<div id="page" class="container">
  <div id="login_wrapper">
    
    <form>
      <table id="tbl1" class="design-table design-table-horizontal design-table-highlight center">
      	<?php if($msg == 0 ) echo "iambatman";?>
        <tr><td colspan="2" id="status"> </td></tr>
        <tr class="name">
          <td><label for="studentid">Student Id</label></td>
          <td><input type=""  name="username" id="username" required="required"/></td>
        </tr>
        <tr id = "row1">
          <td><label for="advisor">Advisor</label></td>
          <td><select name="course" id="course">
              <?php
		$row = getAdvisorList();
		$loop = sizeof($row); 
		for($i=0; $i<$loop; $i++)
		{
			$batman = $row[$i]['salutation']." ".$row[$i]['first_name']." ".$row[$i]['last_name'];
			echo '<option value="'.$batman.'">'.$batman.'</option>';
		}
	
	
	?>
            </select></td>
      </table>
      <p class="submit" align="center">
        <input name="submit" type="submit" value="Submit" />
      </p>
      <?php echo $error; ?>
    </form>
  </div>
  <!-- End login_wrapper div --> 
</div>
<!-- End Div Page-->
<?php include('includes/footer.php'); ?>
<table width="100%" border="1">
