<?php
include 'config.php';
if(!isset($_GET['pass'])) {
	die("Please prvide the password in config.php to refresh (add '?pass=' to the URL)");
}
if($_GET['pass'] !== $pass) {
	die('INVALID PASSWORD');
}
$path    = 'images/';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));

foreach($files as $file) {
	$sql = "SELECT imagepath FROM data;";
	$result = $conn->query($sql);
	$found = 0;
	$pth = "images/" . $file;
	while($row = $result->fetch_assoc()) {
		if($row["imagepath"] === $pth) {
			$found = 1;
		}
	}
	if($found === 0) {
		echo $pth . "\n";
		$sql = "INSERT INTO data (imagepath, score) VALUES ('".$pth."', " . $default_score . ");";
		if ($conn->query($sql) === FALSE) {
			die('ERROR');
		}
	}
}
?>