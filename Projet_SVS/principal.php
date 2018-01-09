<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="images/play.ico" />
<title>SVS</title>

<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jwplayer.js"></script>       
<script src="js/player.js" type="text/javascript"></script>
<script>jwplayer.key = ""</script>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATDV3mgVlpL1_FDGUMb2x17ABPf5I879M&signed_in=true"></script>
  
  
<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATDV3mgVlpL1_FDGUMb2x17ABPf5I879M&callback=initMap" type="text/javascript"></script-->
<script>
var myCenter = new google.maps.LatLng(45.7667, 4.8833);

function initialize() {
var mapProp = {
  center: myCenter,
  zoom: 13,
  
  
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

<?php

$con=mysqli_connect("localhost","root","","android_api");
//$conn=mysqli_connect("localhost","root","","google_maps");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query  = "SELECT * FROM users;";
$query .= "SELECT * FROM google_maps.map";

if(mysqli_multi_query($con,$query)){

        /* store first result set */
        if ($result = mysqli_use_result($con)) {
        
            while ($data = mysqli_fetch_row($result)) {
                echo '  
 					var marker=new google.maps.Marker({
  					position:{lat:'.$data[4].',lng:'.$data[5].'},
      				label:"'.$data[0].'" ,
      				map: map,
      				draggable: false,
                    animation: google.maps.Animation.DROP,
                    
  
  					});

				marker.setMap(map);';
            }
            mysqli_free_result($result);
        }
        
       if (mysqli_next_result($con)) {
          if ($result = mysqli_use_result($con)) {
        
            while ($data = mysqli_fetch_row($result)) {
                echo '  
 					var marker=new google.maps.Marker({
  					position:{lat:'.$data[4].',lng:'.$data[3].'},
  					draggable: false,
  					map: map,
                    animation: google.maps.Animation.DROP,
                    title: "'.$data[2].'",
                    
  					});
	    
				marker.setMap(map);
				
google.maps.event.addListener(marker, "click", function() {
        var infowindow;
	      if (infowindow) infowindow.close();
	      infowindow = new google.maps.InfoWindow({content: "'.$data[2].'" });
	      infowindow.open(map, marker);	})		
			
			';	
				
            }
            mysqli_free_result($result);
           }
        
       }
        
}

?> 
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
        <!--<link rel="stylesheet" type="text/css" href="csss/style.css" />       -->
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
#video_preview{
    text-align: center;
}
#player, #player_wrapper{
    margin: 0 auto !important;
    margin-bottom: 0px !important;
    margin-top: 0px !important;    
}
input#stream_url{
    background: none;
    border: 2px solid #1E90FF;
    outline: none;
    padding: 0px 0px;
    font: 18px arial;
    color: #666;
    width: 700px;
    text-align: center;
}
#btn_start{
	background: #3bbe13;  
    padding: 8px 30px;
    color: #fff;
    border: none;
    outline: none;
    font: normal 16px arial;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 5px;
	margin-left: 60px;
}
#btn_stop{
    padding: 8px 30px;
    color: #fff;
    border: none;
    outline: none;
    font: normal 16px arial;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 5px;
	background: #e6304f; 
}

tr
{
    border: 1px solid black;
}

</style>

<header>
  <!--img src="end_logo.png"  style="width:100%;height:150px;"-->
  <a href="https://telecom.insa-lyon.fr/"><img src="images/logoinsa.png" width="180" height="65"></a>
</header>
</head>

<body>

<table>
	<tr>

    <th style="width:50%;">
	  
      <!-- googlemaps-->

	  <div id="googleMap" style="width:100%;height:420px;"></div>
	        <!-- table client-->
	
	 <table  class="w3-table w3-border">


				<tr  class="w3-blue">
					<th>ID</th>
					<th>Name</th>
					<th>Position</th>
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
echo '<th> '. $data[4] .','. $data[5] . '</th>';
echo '<th><a href="delete_user.php?id='.$data[0].'"><img src="images/remov.png" width="35" height="35"></img></a></th>';
//echo '<th><button onclick="delete_user.php?id='.$data[0].'"\" class="delete"><img src="remov.png" width="50" height="35"/></img></button></th>';

echo "</tr>";
}}
?>        </table>
	   

	
	</th>
	
              <!-- live streaming-->
	<th><div  style="width:50%;height:500px;">            
            <div >                    
                <div id="player"></div><div class="clear"></div>
                <br/>
                <input type="text" id="stream_url" value="rtmp://192.168.43.181:1935/live/android_test"/><br/>
                <input type="button" id="btn_start" class="" value="Start" />
                <input type="button" id="btn_stop" class="" value="Stop"/>
            </div>
            <div class="clear"></div>
        </div>
	</th>
		
		
	</tr>
	<tr></tr>
</table>

<!--footer>Smart Video Surveillance</footer-->



</body>
</html>
