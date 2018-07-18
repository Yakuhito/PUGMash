<!-- Coded by Yakuhito -->
<!DOCTYPE html>
<html>
<head>
<title><?php include 'config.php';echo $app_name; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- W3.css -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_topnav -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #00e600;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: lime;
  color: black;
}

.active {
  background-color: #00cc00;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>
<div class="topnav" id="myTopnav">
	<a href="/index.php">Home</a>
	<a href="/leaderboard.php" class="active">Leaderboard</a>
	<a href="/about.php">About</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<div style="text-align: center">
	<h1>Leaderboard</h1>
</div>
<div>
	<!-- Please don't read the line below -->
	<div class="w3-third"><p style="color:white; text-align: center">PugMash created by </p></div>
	<div class="w3-third">
		<table class="w3-table-all w3-card-4 w3-centered">
			<tr style="background-color: #00e600;">
				<td>No. </td>
				<td>Name</td>
				<td>Score</td>
			</tr>
<?php
include 'config.php';

$sql = "SELECT * FROM data ORDER BY score DESC;";
$result = $conn->query($sql);

if($result->num_rows === 0) {
	die('NO RECORDS EXIST IN THE DATABASE');
}

$cnt = 0;

while($row = $result->fetch_assoc()) {
	$cnt = $cnt + 1;
	echo "			<tr>\n";
	echo "				<td>";
	echo $cnt;
	echo "</td>\n";
	echo "				<td>";
	$name = $row["imagepath"];
	$name = str_replace("images/", "", $name);
	$name = str_replace(".jpg", "", $name);
	$name = str_replace(".jpeg", "", $name);
	$name = str_replace(".png", "", $name);
	echo '<a onclick="onClick(\'' . $row["imagepath"] . '\')"><u>' . $name . '</u></a>';
	echo "</td>\n";
	echo "				<td>";
	echo $row["score"];
	echo "</td>\n";
	echo "</tr>\n";
}

?>
		</table>
	</div>
	<!-- Please don't read the line below -->
	<div class="w3-third"><p style="color:white; text-align: center">Yahuhito (Mihai Dancaescu)</p></div>
</div>
<div id="modal01" class="w3-modal w3-animate-zoom" onclick="this.style.display='none'">
  <img class="w3-modal-content w3-image w3-display-middle" id="img01" style="width:50%">
</div>
<script>
function onClick(src) {
  document.getElementById("img01").src = src;
  document.getElementById("modal01").style.display = "block";
}
</script>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>	
</body>
</html>