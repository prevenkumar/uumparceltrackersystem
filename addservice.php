<?php 
include("layout.php");
include("config_2.php");

session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

//echo "Hello admin";
?>

<?php 
//include("menu_admin.php"); 
include("menu_customer.php");
?>

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h3 class="panel-title"><?php if($_SESSION['type']=='admin') echo "Apply For Runner"; else echo "UUM Parcel Tracker [STUDENT]"?></h3>
		    </div> 
		</div>
	</div>
</div>
<?php
include_once("dbconnect.php");
if (isset($_POST['runner_id'])) {
 $runid = $_POST["runner_id"];
 if (!empty($runid)) {
 $runname = $_POST["runner_name"];
 $rtime = $_POST["runner_time"];
 $rstatus = $_POST["parcel_status"];
 $sql = "SELECT * FROM parcelstatus WHERE id = '$runid'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 echo "<script>alert('Duplicate data!!');
 window.location.href='addservice.php';</script>";}
else {
 $sqlinsert = "INSERT INTO parcelstatus(rid,rname,time_est,status)
values('$runid','$runname','$rtime','$rstatus')";
 if ($conn->query($sqlinsert) === TRUE) {
 echo "<script>alert('Successfully Sent');
 window.location.href='addservice.php';</script>";
 } else {
 echo "<script>alert('Failed!!!');
 window.location.href='addservice.php';</script>";
 }
 }
 }else{
echo "<script>alert('Fill in data first');
window.location.href='addservice.php';</script>";
}
 $conn->close();
}
?>
<?php include('footer.php');?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/parcel.css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Accept Delivery Service</title>
</head>
<body>

<form method="post" action="addservice.php" >
 <table align = "center" border="0" >
 <tr>
 <td><label for="runner_id">Runner ID</label></td>
 <td><input type="text" name="runner_id" id="runner_id">
</td>
 </tr>
 <tr>
 <td><label for="runner_name">Runner Name</label></td>
 <td><input name="runner_name" type="text"
id="runner_name"></input></td>
 </tr>
 <tr>
 <td><label for="runner_time">Estimate Time</label></td>
 <td><input name="runner_time" type="text"
id="runner_time"> </input></td>
 </tr>
<tr>
 <td><label for="parcel_status">Status</label></td>
 <td>
 	<select name="parcel_status">
    <option value="Accepted">Accepted</option>
    <option value="Rejected">Rejected</option>
  </select></td>
 </tr>
 <tr align="center">
 <td></td>

<td><input type="submit" class="button" value="Send" />
<input type="submit" class="button" value="Cancel"
formaction="mainpage2.php"/></td>
 </tr>
 </table>
 </form>
</body>
</html>