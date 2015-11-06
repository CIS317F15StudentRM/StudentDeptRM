<?php
//echo $_SESSION['student']['major'];
$set = all_courses($_SESSION['student']['major']);
//print_r($courses_set);
	$required_set = array_column($set['required'],'course_code');
	//echo "<pre>"; print_r($required_set);
	
	$foundation_set = array_column($set['foundation'],'course_code');
 ?>
 <script>
cnt=1;
var start = new Date().getFullYear();
function addrow(){
$('#updatestudentdetails tr').last().after('<tr id ="row'+cnt+'""><td><input type="text" required="required" name="table['+cnt+'][course]" id="course'+cnt+'" placeholder="Course Code" list="searchresults" autocomplete="off"><datalist label="Require Courses" id="searchresults"><?php
	 foreach($required_set as $option){
	 	echo '<option value="'.$option.'"'.'>'.$option.'</option>';
	 	}?><?php	
				foreach($foundation_set as $option){
			   echo '<option value="'.$option.'"'.'>'.$option.'</option>';}
			   ?></datalist></td><td><select name="table['+cnt+'][credit]""><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option></select></td><td><select name=table['+cnt+'][sem]" id= "sem'+cnt+'""><option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer">Summer</option></select></td><td><select name=table['+cnt+'][year]"><option value='+[start-1]+'>'+[start-1]+'</option><option value='+start+'>'+start+'</option><option value='+[start+1]+'>'+[start+1]+'</option></select></td><td><select name="table['+cnt+'][grade]" id= "grade'+cnt+'""><option value="A+">A+</option> <option value="A">A</option><option value="A-">A-</option><option value="B+">B+</option><option value="B">B</option><option value="B-">B-</option><option value="C+">C+</option><option value="C">C</option><option value="F">F</option><option value="I"> I </option>  <option value="x"> X </option> </select></td>  <td><select name="table['+cnt+'][coursetype]" id= "coursetype'+cnt+'""> <option value="FOUNDATION">Foundation</option> <option value="REQUIRED">Required</option><option value="ELECTIVE">Elective</option>  </select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td> </tr>');
cnt++;
}
function delrow(x){
   document.getElementById(x).remove();
}
</script>