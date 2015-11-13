<?php

// Database Constants
    define("DB_SERVER", "pendragon.gannon.edu");
    define("DB_SERVER_LOCAL", "localhost");
    define("DB_USER", "srms");
    define("DB_PASS", "Id#7029");
    define("DB_NAME", "srms");

function dbConnect($usertype, $connectionType = 'mysqli') {
$user = DB_USER;
$pwd = DB_PASS;
$db = DB_NAME;
if ($usertype == 'local') {
$host = DB_SERVER_LOCAL;
} elseif ($usertype == 'remote') {
$host = DB_SERVER;
} else {
exit('Unrecognized connection type');
}

if ($connectionType == 'mysqli') {
$result = new mysqli($host, $user, $pwd, $db);
if ($result->connect_error) {
    die("Connection failed in dbConnect Function: " . $result->connect_error);
}
/*or die('Failed to connect in function'.mysql_error());*/
return $result;
} else {
try {
return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
} catch (PDOException $e) {
echo 'Cannot connect to database';
exit;
}
}
}
?>