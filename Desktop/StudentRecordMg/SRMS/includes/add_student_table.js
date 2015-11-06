//new javascript by batman

cnt=1;
function addrow(){
	
	$('#tbl1 tr').last().after('<tr id = "row'+cnt+'"><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="status'+cnt+'" id= "status'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td><td><a onclick="delrow(\'row'+cnt+'\');" id="delbut" class="button button-blue center"><span>X</span></a></td></tr>');
 cnt++;
	
}

function delrow(x){
   document.getElementById(x).remove();

}



/*// JavaScript Document<script>
 $(document).ready(function(){
 var cnt = 2;
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr id = "row'+cnt+'"><td><select name="course'+cnt+'" id= "course'+cnt+'"><option value="GCIS500">GCIS500</option><option value="GCIS501">GCIS501</option><option value="GCIS502">GCIS502</option></select></td><td><select name="status'+cnt+'" id= "status'+cnt+'"><option value="NR">Not Req with Major</option><option value="REQ">Required</option><option value="TR">Waived Course</option></select></td></tr>');
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