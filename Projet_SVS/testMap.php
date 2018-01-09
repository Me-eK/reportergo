<!DOCTYPE html>
<html lang="fr-FR">
<head>
<!--link rel="icon" type="image/png" href="images/play.ico" /-->
<title>Administration users</title>

<script type="text/javascript" src="scripts/scripts.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jwplayer.js"></script>       
<script src="js/player.js" type="text/javascript"></script>

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	
<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb-UGuXj4VnZ97yDcKgGvlE7jaAfj7wUg&signed_in=true"></script-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYkmljuL0CQFjetIgVhKAO8_Gg9nW3amg&callback=initMap"></script>
<script>
var myCenter = new google.maps.LatLng(45.7667, 4.8833);


function initialize() {
var mapProp = {
  center: myCenter,
  zoom: 15,
  
  
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

<?php
$con=mysqli_connect("localhost","root","","android_api");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 

$result = mysqli_query($con,"SELECT * FROM users") or die(mysqli_error($con));
if($result){
 while($data = mysqli_fetch_array($result))
{
 echo '  
 var marker=new google.maps.Marker({
  position:{lat:'.$data[4].',lng:'.$data[5].'},
      label:"'.$data[0].'" ,
	  title:"'.$data[1].'",
	  draggable: false,
      
  
  });
 

marker.setMap(map);';

}}
?> 
}

google.maps.event.addDomListener(window, 'load', initialize);



</script>
        <!--<link rel="stylesheet" type="text/css" href="css/style.css" />       -->
<style>

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}
body { 
    padding:0;
    margin: 0;
}
.clear{
    clear: both;
}
.container{
    width: 1800px;
    margin: 0 auto;
    padding: 0;
}

tr
{
    border: 1px solid black;
}

th{
	width: 100%;
}

</style>

<header>
  <a href="http://www.inpt.ac.ma/"><img src="logoinpt.png" width="180" height="65"></a>
</header>
</head>

<body>

<table cellpadding="20" cellspacing="0" width="100%">
	<tr>

    <th style="width:75%;">
	  
      <!-- googlemaps-->
	  <div id="googleMap" style="width:100%;height:570px;"></div>
	 
	</th>
	
	<th >
	 <!-- table client-->
	 <div style="height:575px;"> 
	 <table class="w3-table w3-border w3-striped w3-card-4">

		<tr  class="w3-blue">
			<th>Id</th>
			<th>Name</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th></th>
		</tr>
				
		<?php
			$con=mysqli_connect("localhost", "root", "", "android_api");
			// Check connection
			if (mysqli_connect_errno())
			{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			 
			$result = mysqli_query($con,"SELECT * FROM users") or die(mysqli_error($con));
			if($result){
			 while($data = mysqli_fetch_array($result))
			{
			echo '<tr class="w3-white" id="autoRefresh()">';
			echo '<th>' . $data[0] . '</th>';
			echo '<th> '. $data[1] . '</th>';
			echo '<th> '. $data[4] . '</th>';
			echo '<th> '. $data[5] . '</th>';
			echo '<th><button onclick="" id="delete"><img src="supprimer.png" width="50" height="35"/></img></button></th>';
			echo "</tr>";
			}}
		?>        
	</table>
	</div>
	</th>

	</tr>
</table>

</body>

<!--footer style="position: relative; right: 0; left: 0;">Smart Video Surveillance</footer-->
</html>
