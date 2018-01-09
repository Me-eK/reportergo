<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['email']) && isset($_POST['longitude']) && isset($_POST['latitude'])) {

    // receiving the post params
    $email= $_POST['email'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
	
	$con=mysqli_connect("localhost","root","","android_api");
    // Check connection
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		
		      $response["error"] = TRUE;
			}
			
			else{
			$result = mysqli_query($con,"UPDATE  users  SET longitude= '$longitude',latitude='$latitude' WHERE email='$email' ") or die(mysqli_error($con));
			$response["error"] = FALSE;
			$response["error_msg"] = "Unknown error occurred in registration Location!";
            echo json_encode($response);
			}

   }else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (email, longitude or latitude) is missing!";
    echo json_encode($response);
}
?>

