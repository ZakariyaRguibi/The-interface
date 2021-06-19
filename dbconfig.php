<?php
// DB credentials.
define('DB_HOST','remotemysql.com');
define('DB_USER','jMEpblEHXo');
define('DB_PASS','RGAa47gZcd');
define('DB_NAME','jMEpblEHXo');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>