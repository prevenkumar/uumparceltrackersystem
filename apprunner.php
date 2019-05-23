
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
		    	<h3 align="center" class="panel-title"><?php if($_SESSION['type']=='admin') echo "Apply For Runner"; else echo "APPLY FOR RUNNER"?></h3>
		    </div> 
		</div>
	</div>
</div>

<?php
include_once("dbconnect.php");
if (isset($_POST['parcel_id'])) {
 $parcid = $_POST["parcel_id"];
 if (!empty($parcid)) {
 $studname = $_POST["student_name"];
 $studmatric = $_POST["student_matric"];
 $studphone = $_POST["student_phone"];
 $studaddr = $_POST["student_address"];
 $sql = "SELECT * FROM parcel WHERE id = '$parcid'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 echo "<script>alert('Duplicate data!!');
 window.location.href='apprunner.php';</script>";}
else {
 $sqlinsert = "INSERT INTO parcel(id,name,matricno,phone,address)
values('$parcid','$studname','$studmatric','$studphone','$studaddr')";
 if ($conn->query($sqlinsert) === TRUE) {
 echo "<script>alert('Your application successfully sent... Please wait for runner response...');
 window.location.href='apprunner.php';</script>";
 } else {
 echo "<script>alert('Failed!!!');
 window.location.href='apprunner.php';</script>";
 }
 }
 }else{
echo "<script>alert('Fill in data first');
window.location.href='apprunner.php';</script>";
}
 $conn->close();
}
?>
<?php include('footer.php');?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/parcel.css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Runner Service</title>
</head>
<body>

<form method="post" action="apprunner.php" >
 <table align = "center" border="0" >
 <tr>
 <td><label for="parcel_id">Parcel ID        </label></td>
 <td><input type="text" name="parcel_id" id="parcel_id">
</td>
 </tr>
 <tr>
 <td><label for="student_name">Student Name  </label></td>
 <td><input name="student_name" type="text"
id="student_name"></input></td>
 </tr>
  <tr>
 <td><label for="student_matric">Matric No   </label></td>
 <td><input name="student_matric" type="text"
id="student_matric"></input></td>
 </tr>
 <tr>
 <td><label for="student_phone">Phone No     </label></td>
 <td><input name="student_phone" type="text"
id="student_phone"> </input></td>
 </tr>
<tr>
 <td><label for="student_address">Address    </label></td>
 <td><textarea rows="6" cols="30" name="student_address"
 type="text" id="student_address"></textarea></td>
 </tr>
 <tr align="center">
 <td></td>

 <td><input type="submit" class="button" value="Apply" />
<input type="submit" class="button" value="Cancel"
formaction="mainpage.php"/></td>
 </tr>
 </table>
 </form>
</body>
</html>