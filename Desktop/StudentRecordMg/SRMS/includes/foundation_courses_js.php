<?php 
$curriculum=array();
$curriculumdetails = "";

//print_r($_SESSION);
$curriculum[0]=$_SESSION['student']['major'];
$curriculum[1]=$_SESSION['student']['start_semester'];
$curriculum[2]=$_SESSION['student']['start_year'];

$curriculumdetails=$curriculum[0]."_".$curriculum[1]."_".$curriculum[2];
$curriculumdetails=$curriculumdetails."_foundation_courses";
//$_SESSION['student']['curriculumdetails'] = $curriculumdetails;
//$curriculumdetails = "875_fall_2014_foundation_courses";
$result= getFoundationCourse($curriculumdetails);
$option = $result;
//print_r($result);

//echo "$curriculumdetails";
 ?>
<script>

cnt=0;
function addrow(){
	
	$('#tbl1 tr').last().after('<tr id = "row'+cnt+'"><td><select name="table['+cnt+'][course]" id="course'+cnt+'"><?php 
	foreach($result as $result) 	
	{
		echo '<option value="'.$result.'">'.$result.'</option>';
	}?></select></td><td><select name="table['+cnt+'][status]" id= "status'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>'); cnt++;
	
	/*$('#tbl1 tr').last().after('<tr id = "row'+cnt+'"><td><select name="course'+cnt+'" id="course'+cnt+'"><?php 
	/*foreach($result as $result) 	
	{
		echo '<option value="'.$result.'">'.$result.'</option>';
	}*/?></select></td><td><select name="status'+cnt+'" id= "status'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>'); cnt++;*/
	
}

function delrow(x){
   document.getElementById(x).remove();

}

function foundationcourse(){
	var sem = document.getElementById("startingsemester").value;
	var year = document.getElementById("startingyear").value;
}
</script>