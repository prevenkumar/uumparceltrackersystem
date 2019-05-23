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
          <h3 align="center" class="panel-title"><?php if($_SESSION['type']=='admin') echo "Delivery Status"; else echo "DELIVERY STATUS"?></h3>
        </div> 
    </div>
  </div>
</div>

<?php include('footer.php');?>


<?php
include_once ("dbconnect.php");
if (isset($_POST['runner_id'])){
$runid = $_POST['runner_id'];
if (empty($runid)){
$sql = "SELECT * FROM parcelstatus";}
 else {
$sql = "SELECT * FROM parcelstatus WHERE id = '$runid'";}
}else{
$sql = "SELECT * FROM parcelstatus";}
$result = $conn->query($sql);
if ($result->num_rows > 0){
echo '<table id="parcelstatus" cellpadding="1" cellspacing="1" class="dbtable">';
echo '<tr><th>RUNNER ID</th><th>RUNNER NAME</th><th>ARRIVAL TIME</th><th>STATUS</th></tr>';
while ($row = $result->fetch_assoc()){
echo '<tr>';
foreach($row as $key => $value){
echo '<td>', $value, '</td>';}

echo '</tr>';
}
}
 else{
echo '<table id="parcelstatus" cellpadding="1" cellspacing="1" class="dbtable">';
echo '<tr><th>RUNNER ID</th><th>RUNNER NAME</th><th>ARRIVAL TIME</th><th>STATUS</th></tr>';}
$conn->close();
?>
<!DOCTYPE html>
<html>
<title>Delivery Details</title>
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
</head>
<body>

<form action="mainpage2.php" method= "post">

 </form>
</body>
</html>