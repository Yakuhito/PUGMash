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
	<a href="/index.php">Home</a>
	<a href="/leaderboard.php">Leaderboard</a>
	<a href="/about.php"  class="active">About</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<div class="w3-container">
  <div class="w3-card-4 w3-display-middle" style="width:50%;">
    <header class="w3-container w3-green">
      <h1>PugMesh</h1>
    </header>
    <div class="w3-container">
      <p>PugMesh is an open-source copy of FaceMash.</p>
	  <p>Licensed under GNU General Public License version 3</p>
    </div>
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