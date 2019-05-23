
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
		    	<h3 class="panel-title"><?php if($_SESSION['type']=='admin') echo "Student Portal"; else echo "UUM Parcel Tracker [STUDENT]"?></h3>
		    </div>
		    <div class="panel-body">
		    	Welcome <?php echo $_SESSION['username'];?>! You have Succesfully logged in... 
		    </div>
		</div>
	</div>
</div>

<?php include('footer.php');?>

<style>
	.form-group {
    margin:0;
    padding:10px ;

    &:first-child { border-color: transparent; }
}

.form-control {
  padding: 0px 10px 0 20px;
  margin-top: 10px;
  color: #333;
  font-size: 28px;
  font-weight: 500;
    border: 3px solid #555;
    -webkit-box-shadow: none;
    box-shadow: none;
    min-height:60px;
    height: auto;
    border-radius: 50px 0  0 50px !important;
}
.form-control :focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: transparent;

    }

#searchbtn
{ border:0;
  padding: 0px 10px;
  margin-top: 10px;
  color: #fff;
  background:#888;
  font-size: 27px;
  font-weight: 500;
    border: 1px solid #555;
    border-left: none;
    -webkit-box-shadow: none;
    box-shadow: none;
    min-height:60px;
    height: auto;
border-radius: 0 50px 50px 0 !important;
}
	</style>

<div class="container">
    <h3 class=text-center> ENTER YOUR PARCEL ID HERE</h3><br><hr>
	<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    <form action="#" method="#" role="search">
    <div class="input-group">
    <input class="form-control" placeholder="Search . . ." name="srch-term" id="ed-srch-term" type="text">
    <div class="input-group-btn">
    <button type="submit" id="searchbtn">
    search</button>
    </div>
    </div>
    </form>
    </div>
	</div>
</div>