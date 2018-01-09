<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['id']) && isset($_POST['text'])) {

    // receiving the post params
    $id = $_POST['id'];
    $event = $_POST['text'];

    // POST the user by email and password
    $user = $db->addevent($id, $event);

    if ($user != false) {
        // use is found
        $response["succes"] = true;
       
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

