<?php
include_once("dbconnect.php");
$parcid = $_POST["parcid"];
$sqldelete = "DELETE FROM parcel WHERE id = '$parcid'";
if ($conn->query($sqldelete) === TRUE) {
 echo "<script>alert('You have successfully reject the application');
window.location.href='mainpage.php';</script>";
} else {
echo "<script>alert('Delete Failed!!!');
window.location.href='mainpage.php';</script>";
}
