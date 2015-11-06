 <?php include('CMStodatabase.php'); ?>
<html>
<head>
<title>Sending HTML email using PHP</title>
</head>
<body>

<?php
  $test= curriculum_request($majorcode,$full_semester);
		echo "<pre>"; print_r($test);
		//echo "iambatman live";
?>
</body>
</html>