<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
$password = "iambat";
$encrypt = password_hash($password,PASSWORD_BCRYPT);
$userenter = "iambatman";
$decrypt = password_verify($userenter,$encrypt);

echo $password."<br>";
echo $encrypt."<br>";
echo $userenter."<br>";
echo $decrypt."<br>";

?>
<body>
</body>
</html>