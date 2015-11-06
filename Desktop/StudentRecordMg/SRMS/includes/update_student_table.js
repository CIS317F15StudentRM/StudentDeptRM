//new javascript by batman

cnt=1;
var start = new Date().getFullYear();
function addrow(){
$('#updatestudentdetails tr').last().after('<tr><th>Course Id</th><th>Credit</th><th>Semester</th><th>Year</th><th>Grade</th><th>Course Type</th><th>Delete Course</th></tr></thead><tbody><tr id ="row'+cnt+'""><td><select name="course'+cnt+'"" id= "course'+cnt+'""><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="credit'+cnt+'""><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td><td><select name="sem'+cnt+'"" id= "sem'+cnt+'""><option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer">Summer</option></select></td><td><select name="years'+cnt+'""><option value='+[start-1]+'">'+[start-1]+'</option><option value='+start+'">'+start+'</option><option value='+[start+1]+'">'+[start+1]+'</option></select></td><td><select name="grade'+cnt+'"" id= "grade'+cnt+'""><option value="A+">A+</option> <option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="F">F</option><option value="I"> I </option>  <option value="x"> X </option> </select></td>  <td><select name="coursetype'+cnt+'"" id= "coursetype'+cnt+'""> <option value="NR">Foundation</option> <option value="REQ">Required</option><option value="TR">Elective</option>  </select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td> </tr>');
cnt++;
}
	/*$('#updatestudentdetails tr').last().after('<tr><th>Course Id</th><th>Credit</th><th>Semester</th><th>Year</th><th>Grade</th><th>Course Type</th><th>Delete Course</th></tr></thead><tbody><tr id ="row'+cnt+'""><td><select name="course'+cnt+'"" id= "course'+cnt+'""><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="credit'+cnt+'""><?php for($i=0; $i<=6; $i++){echo "<option value=".$i.">".$i."</option>";}?></select></td><td><select name="sem'+cnt+'"" id= "sem'+cnt+'""><option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer">Summer</option></select></td><td><select name="years'+cnt+'""><?php $currentyear = date("Y");for($i=$currentyear-2; $i<=$currentyear+2; $i++){echo "<option value=".$i.">".$i."</option>";}?> </select></td><td><select name="grade'+cnt+'"" id= "grade'+cnt+'""><option value="A+">A+</option> <option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="F">F</option><option value="I"> I </option>  <option value="x"> X </option> </select></td>  <td><select name="coursetype'+cnt+'"" id= "coursetype'+cnt+'""> <option value="NR">Foundation</option> <option value="REQ">Required</option><option value="TR">Elective</option>  </select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td> </tr>');*/
	/*$('#updatestudentdetails tr').last().after('<tr><th>Course Id</th><th>Credit</th><th>Semester</th><th>Year</th><th>Grade</th><th>Course Type</th><th>Delete Course</th></tr></thead><tbody><tr id ="row'+cnt+'""><td><select name="course'+cnt+'"" id= "course'+cnt+'""><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="credit'+cnt+'""><?php for\($i=0\;$i<=6\;$i\+\+\)\{echo "<option value="\.$i\.">"\.$i\."</option>"\;\}\?></select></td><td><select name="sem'+cnt+'"" id= "sem'+cnt+'""><option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer">Summer</option></select></td><td><select name="years'+cnt+'""><?php $currentyear = date("Y");for($i=$currentyear-2; $i<=$currentyear+2; $i++){echo "<option value="\.$i\.">"\.$i\."</option>";}?> </select></td><td><select name="grade'+cnt+'"" id= "grade'+cnt+'""><option value="A+">A+</option> <option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="F">F</option><option value="I"> I </option>  <option value="x"> X </option> </select></td>  <td><select name="coursetype'+cnt+'"" id= "coursetype'+cnt+'""> <option value="NR">Foundation</option> <option value="REQ">Required</option><option value="TR">Elective</option>  </select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td> </tr>');*/

	
	
	
	
	
	
	
/*	$('#updatestudentdetails tr').last().after('<tr id = "row'+cnt+'"><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS50'+cnt+'">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td>5</td><td>A</td><td><select name="coursetype'+cnt+'" id= "coursetype'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>');
 cnt++;*/
	
/*	$('#updatestudentdetails tr').last().after('<tr><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS50'+cnt+'">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><input type="" name="credit'+cnt+'" id="credit'+cnt+'"/></td><td><input type="" name="sem'+cnt+'" id="sem'+cnt+'"/></td><td><input type="" name="grade'+cnt+'" id="grade'+cnt+'"/></td><td><select name="coursetype'+cnt+'" id= "coursetype'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>');
 cnt++;*/
	
	/*$('#updatestudentdetails tr').last().after('<tr id = "row'+cnt+'"><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="status'+cnt+'" id= "status'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>');
 cnt++;*/
	

function delrow(x){
   document.getElementById(x).remove();

}


/*// JavaScript Document<script>
 $(document).ready(function(){
 var cnt = 2;
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS50'+cnt+'">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><input type="" name="credit'+cnt+'" id="credit'+cnt+'"/></td><td><input type="" name="sem'+cnt+'" id="sem'+cnt+'"/></td><td><input type="" name="grade'+cnt+'" id="grade'+cnt+'"/></td><td><select name="coursetype'+cnt+'" id= "coursetype'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td></tr>');
 cnt++;
 });
 
$("#anc_rem").click(function(){
if($('#tbl1 tr').size()>2){
 $('#tbl1 tr:last').remove();
 }else{
 alert('One row should be present in table');
 }
 });
 
});
	
<!--<tr><td>Static Content ['+cnt+']</td><td><select type="" name="txtbx'+cnt+'" value="<?php echo "batamn";?>"><option value="administrator">Administrator</option><option value="advisor">Advisor</option><option value="chairperson">Chairperson</option></select></td></tr>-->
*/