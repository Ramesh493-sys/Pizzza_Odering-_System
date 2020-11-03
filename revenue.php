<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body background="6.jpg"><br>
<h2 align="center">Revenue</h2>
<div class="input-group">
<form method="post" action="revenue.php">
<br><input placeholder="Delivery date" type="text" name="date"><br>
<br><input placeholder="Pizza type" type="text" name="type"><br><br>
<input type="submit" name="view" id="view" value="Show revenue" style="background-color:#00cc66;border: 2px solid #00cc66;color:white;width:30%;height:40px">

	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
?>


		<?php 

$t=0;
if(isset($_POST['view'])){
		$date=$_POST['date'];
		$type=$_POST['type'];
		$results = mysqli_query($conn, "SELECT * FROM pizza where d='$date' and pt='$type'"); 
		while ($row = mysqli_fetch_array($results)) { 
			$s=$row['ps'];
			$r=mysqli_query($conn, "SELECT p FROM price where pt='$type' and ps='$s'");
			$row1 = mysqli_fetch_array($r);
			$pr=$row1['p'];
			$t=$t+$row['q']*$pr;
		 }
		echo "<br><br>";
		echo "Revenue of $type pizza in $date = ".$t;
		$t=0;
}

?>
</form>
</div>
</body>
</html>