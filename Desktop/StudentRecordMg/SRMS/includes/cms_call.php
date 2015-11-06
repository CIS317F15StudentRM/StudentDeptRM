<?php 

include('CMStodatabase.php');


function cmc_call($majorcode,$semester,$year){
	$database = $majorcode."_".$semester."_".$year."_req_courses";
	
	if(table_exists($database) != 1){
		
		if (strpos($semester, 'fall') !== false)
				$Csemester = "Fall";
			if (strpos($semester, 'spring') !== false)
				$Csemester = "Spring";
			if (strpos($semester, 'summer') !== false)
				$Csemester = "Summer";
			$full_semester =$Csemester." ".$year;
			//echo $full_semester;
		//echo "$database";
		
		$test= curriculum_request($majorcode,$full_semester);
		//echo "<pre>"; print_r($test);
		//echo "iambatman live";
		if($test != 1)
		{
			
			$result = cms_to_database($majorcode,$semester,$year,$test); // uncheck this after meeting
			return 1;
		//print_r($test);
		}
		else{
			return 0;
		}
	}
	else {
		return 1;
	}
}
?>

