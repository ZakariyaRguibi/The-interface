<?php
// include database connection file
require_once'dbconfig.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Posted Values
$un=$_POST['un'];
$pwd=$_POST['pwd'];
$nam=$_POST['name'];
// Query for Insertion
$sql="INSERT INTO account(`id-account`,username,`password`,`name`) VALUES(null,:un,:pwd,:nam)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':un',$un,PDO::PARAM_STR);
$query->bindParam(':pwd',$pwd,PDO::PARAM_STR);
$query->bindParam(':nam',$nam,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}

else{

    echo <<<form
    <form action="post.php" method="post">
    <input type="text" name="insert">
    <input type="text" name="un">
    <input type="text" name="pwd">
    <input type="text" name="name">
    <button type="submit">submit</button>
    </form>
form;

}