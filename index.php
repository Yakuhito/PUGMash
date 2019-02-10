<!-- Coded by Yakuhito -->
<!-- Contains a quick fix -->
<?php
include 'config.php';

$sql = "SELECT imagepath, score, id FROM data;";
$array = array();
$ids = array();
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
	array_push($array, $row["imagepath"]);
	array_push($ids, $row["id"]);
}
$rnd = array_rand($array, 2);
shuffle($rnd);

if(isset($_POST["selected1_x"])) {
    $_POST["selected"] = 1;
}

if(isset($_POST["selected2_x"])) {
    $_POST["selected"] = 2;
}

if(isset($_POST["selected"]) && isset($_POST["id1"]) && isset($_POST["id2"]) && in_array($_POST["id1"], $ids) && in_array($_POST["id2"], $ids)) {
	$id1 = $_POST["id1"];
	$id2 = $_POST["id2"];
	if($_POST["selected"] == 1) {
		/* Get score of the first player */
		$sql = "SELECT score FROM data WHERE id=" . $_POST["id1"] . "\n";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$score1 = $row["score"] + 0;
		
		/* Get score of the second player */
		$sql = "SELECT score FROM data WHERE id=" . $_POST["id2"] . "\n";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$score2 = $row["score"] + 0;
		
		/* Calculate new scores */
		$exp = 1 / (1 + 10 ** (($score2 - $score1) / 400));
		$score1 = $score1 + $k_factor * (1 - $exp);
		$score1 = round($score1);
		
		$exp = 1 / (1 + 10 ** (($score1 - $score2) / 400));
		$score2 = $score2 + $k_factor * (0 - $exp);
		$score2 = round($score2);
		
		/* Update database */
		$sql = "UPDATE data set score=" . $score1 . " WHERE id=" . $id1;
		$conn->query($sql);
		
		$sql = "UPDATE data set score=" . $score2 . " WHERE id=" . $id2;
		$conn->query($sql);		
	} else {
		if($_POST["selected"] == 2) {
			/* Get score of the first player */
			$sql = "SELECT score FROM data WHERE id=" . $_POST["id1"] . "\n";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$score1 = $row["score"] + 0;
			
			/* Get score of the second player */
			$sql = "SELECT score FROM data WHERE id=" . $_POST["id2"] . "\n";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$score2 = $row["score"] + 0;
			
			/* Calculate new scores */
			$exp = 1 / (1 + 10 ** (($score2 - $score1) / 400));
			$score1 = $score1 + $k_factor * (0 - $exp);
			$score1 = round($score1);
			
			$exp = 1 / (1 + 10 ** (($score1 - $score2) / 400));
			$score2 = $score2 + $k_factor * (1 - $exp);
			$score2 = round($score2);
			
			/* Update database */
			$sql = "UPDATE data set score=" . $score1 . " WHERE id=" . $id1;
			$conn->query($sql);
			
			$sql = "UPDATE data set score=" . $score2 . " WHERE id=" . $id2;
			$conn->query($sql);		
			}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $app_name; ?></title>
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
<style>
.center {
    margin: auto;
    width: 75%;
    padding: 10px;
}
</style>
</head>
<body>
<div class="topnav" id="myTopnav">
	<a href="/index.php" class="active">Home</a>
	<a href="/leaderboard.php">Leaderboard</a>
	<a href="/about.php">About</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<div style="text-align:center">
	<p>Alege fata mai frumoasa:</p>
</div>
<div>
	<div class="w3-display-middle">	
		<form action="" method="POST">
			<input type="hidden" name="id1" value=<?php echo "\"".$ids[$rnd[0]]."\""; ?>/>
			<input type="hidden" name="id2" value=<?php echo "\"".$ids[$rnd[1]]."\""; ?>/>
			<div class="w3-third">
			<input type="image" class="w3-image" src=<?php echo "\"".$array[$rnd[0]]."\""; ?> alt="Image #1" name="selected1" value="1"/>
			</div>
			<div class="w3-third" style="text-align:center"><h1>VS</h1></div>
			<div class="w3-third">
			<input type="image" class="w3-image" src=<?php echo "\"".$array[$rnd[1]]."\""; ?> alt="Image #2" name="selected2" value="2"/>
			</div>
		</form>
	</div>
</div>
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
