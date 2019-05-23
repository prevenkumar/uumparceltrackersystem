<?php 
include("layout.php");
include("config.php");

session_start();
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">Parcel Tracking System</a>
    </div>

 <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Home <span class="sr-only"></span></a></li>
        <li><a href="mainpage.php">View Delivery Services</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="destroy.php">Logout<?php echo"(".$_SESSION['username'].")";?></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<h3 align="center" class="panel-title"><?php if($_SESSION['type']=='admin') echo "AVAILABLE DELIVERY SERVICES"; else echo "AVAILABLE DELIVERY SERVICES"?></h3>
		    </div> 
		</div>
	</div>
</div> 

<?php include('footer.php');?>


<?php
include_once ("dbconnect.php");

if (isset($_POST['parcel_id'])){
$parcid = $_POST['parcel_id'];
if (empty($parcid)){
$sql = "SELECT * FROM parcel";}
 else {
$sql = "SELECT * FROM parcel WHERE id = '$parcid'";}
}else{
$sql = "SELECT * FROM parcel";}
$result = $conn->query($sql);
if ($result->num_rows > 0){
echo '<table id="parcel" cellpadding="1" cellspacing="1" class="dbtable">';
echo '<tr><th>PARCEL ID</th><th>STUDENT NAME</th><th>MATRIC NO</th><th>PHONE</th><th>
ADDRESS</th></tr>';
while ($row = $result->fetch_assoc()){
echo '<tr>';
foreach($row as $key => $value){
echo '<td>', $value, '</td>';}
echo '<td><form action="addservice.php" method="post"><input
type="hidden" name="parcid" value=' . $row['id'] . '><input
class="buttondel" type="submit" value="Accept service"></form> </td>';
echo '</tr>';
}
}
 else{
echo '<table id="parcel" cellpadding="1" cellspacing="1" class="center">';
echo '<tr><th>PARCELIDID</th><th>STUDENT NAME</th><th>MATRIC NO</th><th>PHONE</th><th>
ADDRESS</th></tr>';}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<style>

table {
    margin:0 auto;
}

 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<title>Delivery Service Information</title>	
</head>
<body>


 <form action="mainpage.php" method= "post">

 </form>
</body>
</html>

