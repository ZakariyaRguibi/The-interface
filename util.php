<?php
include_once("dbconfig.php");
function writeMsg($dbi,$int) {

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM `log` where `id-capt` = 0";
if ($int==2){
    if ($result = mysqli_query($dbi, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
      printf ("%s,", $row[2]);
    }
    mysqli_free_result($result);
  }
}
else if($int==3) {
    if ($result = mysqli_query($dbi, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
          printf ("\"%s\",", $row[3]);
        }
        mysqli_free_result($result);
      }
}
else{

    if ($result = mysqli_query($dbi, $sql)) {
        // Fetch one and one row
        while ($row = mysqli_fetch_row($result)) {
          printf ("\"%s\",", $row[1]);
        }
        mysqli_free_result($result);
      }
    }

}

function lineTable($dbi)
{
    $sql = "SELECT * FROM `log` where `id-capt` = 0";

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  if ($result = mysqli_query($dbi, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        printf("<tr><td>");
        printf ("%s", $row[1]);
        printf("</td>");
        printf("<td>");
        printf ("%s", ($row[2]) ? "On" :"Off                            ");
        printf("</td>");
        printf("<td>");
        printf ("%s", $row[3]);
        printf("<td></tr>");
    }
    mysqli_free_result($result);
  }
}

?>