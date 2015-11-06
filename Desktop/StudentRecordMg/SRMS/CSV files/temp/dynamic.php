	
<!DOCTYPE html>
 <html>
 <head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
 </script>
 <script>
 $(document).ready(function(){
 var cnt = 2;
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr><td>Static Content ['+cnt+']</td><td><select type="" name="txtbx'+cnt+'" value="<?php echo "batamn";?>"><option value="administrator">Administrator</option><option value="advisor">Advisor</option><option value="chairperson">Chairperson</option></select></td></tr>');
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
 </script>
 <style>
 
 .button {
    margin: 10px;
    text-decoration: none;
    font: bold 1.5em 'Trebuchet MS',Arial, Helvetica; /*Change the em value to scale the button*/
    display: inline-block;
    text-align: center;
    color: #fff;    
    border: 1px solid #9c9c9c; /* Fallback style */
    border: 1px solid rgba(0, 0, 0, 0.3);
    text-shadow: 0 1px 0 rgba(0,0,0,0.4);    
    box-shadow: 0 0 .05em rgba(0,0,0,0.4);   
}

.button, 
.button span {
    -moz-border-radius: .3em;
    border-radius: .3em;
}

.button span {
    border-top: 1px solid #fff; /* Fallback style */
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    display: block;
    padding: 0.5em 2.5em;    
    /* The background pattern */
    background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.05) 25%, transparent 25%, transparent),
                      linear-gradient(-45deg, rgba(0, 0, 0, 0.05) 25%, transparent 25%, transparent),
                      linear-gradient(45deg, transparent 75%, rgba(0, 0, 0, 0.05) 75%),
                      linear-gradient(-45deg, transparent 75%, rgba(0, 0, 0, 0.05) 75%);

    /* Pattern settings */
    background-size: 3px 3px;            
}

.button:hover {
    box-shadow: 0 0 .1em rgba(0,0,0,0.4);
}

.button:active {
    /* When pressed, move it down 1px */
    position: relative;
    top: 1px;
}
.button-blue {
    background: #4477a1;
    background: -webkit-gradient(linear, left top, left bottom, from(#81a8cb), to(#4477a1) );
    background: -moz-linear-gradient(-90deg, #81a8cb, #4477a1);
    filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#81a8cb', endColorstr='#4477a1');
}

.button-blue:hover {
    background: #81a8cb;
    background: -webkit-gradient(linear, left top, left bottom, from(#4477a1), to(#81a8cb) );
    background: -moz-linear-gradient(-90deg, #4477a1, #81a8cb);
    filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#4477a1', endColorstr='#81a8cb');            
}

.button-blue:active {
    background: #4477a1;
}

<!-- table desing -->
.design-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
	margin: 0px auto;
}
.design-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.design-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.design-table-highlight tbody tr:hover {
    background-color: #CCE7E7;
}
.design-table-horizontal tbody td {
    border-left: none;
    border-right: none;
}
 </style>
 </head>
 <body>
 
<a href="javascript:void(0);" id='anc_add' class="button button-blue" ><span> Add Subject</span></a>
 <a href="javascript:void(0);" id='anc_rem' class="button button-blue"><span>Remove Subject</span></a>
 <!--<table  id="tbl1" border="1">
 <tr><td>Static Content [1]</td><td><input type="text" name="txtbx1" value="1"></td></tr>
</table>
 -->
 
 <table id="tbl1" class="design-table design-table-horizontal design-table-highlight">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Height</th>
            <th>Born</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>DeMarcus Cousins</td>
            <td>C</td>
            <td>6'11"</td>
            <td>08-13-1990</td>
            <td>$4,917,000</td>
        </tr>
        <tr>
            <td>Isaiah Thomas</td>
            <td>PG</td>
            <td>5'9"</td>
            <td>02-07-1989</td>
            <td>$473,604</td>
        </tr>
        <tr>
            <td>Ben McLemore</td>
            <td>SG</td>
            <td>6'5"</td>
            <td>02-11-1993</td>
            <td>$2,895,960</td>
        </tr>
        <tr>
            <td>Marcus Thornton</td>
            <td>SG</td>
            <td>6'4"</td>
            <td>05-05-1987</td>
            <td>$7,000,000</td>
        </tr>
        <tr>
            <td>Jason Thompson</td>
            <td>PF</td>
            <td>6'11"</td>
            <td>06-21-1986</td>
            <td>$3,001,000</td>
        </tr>
    </tbody>
</table>
 
</body>
 </html>