
<?php
$response = array();
$db = new PDO('mysql:host=localhost;dbname=android_api;charset=utf8', 'root', '');
//require_once 'include/DB_Functions.php';
//$db = new DB_Functions();
$result = $bdd->query('SELECT * FROM users') or die(print_r($bdd->errorInfo()));

if (mysql_num_rows($result) > 0) {
 $response["users"] = array();
            while ($row = mysql_fetch_array($result)) {
            $user = array();
            $user["id"] = $result["id"];
            $user["name"] = $result["name"];
            $user["email"] = $result["email"];
            $user["password"] = $result["password"];
            $user["latitude"] = $result["latitude"];
            $user["longitude"] = $result["longitude"];
            $user["created_at"] = $result["created_at"];
            $user["updated_at"] = $result["updated_at"];
            array_push($response["users"], $user);
			}
 $response["success"] = 1;
 // echoing JSON response
echo json_encode($response);
}
 else {
            
            $response["success"] = 0;
            $response["message"] = "No user found";
 
            // echo no users JSON
            echo json_encode($response);
        }
?>


//mysql_query("SELECT * FROM users") or die(mysql_error());