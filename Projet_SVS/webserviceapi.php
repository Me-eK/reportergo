<?php

require_once 'include/DB_Functions_new.php';  
$db = new DB_Functions();


$result = $db->conn->query("SELECT * FROM users");
$users = $result->fetchAll();
$response = array();
$response["users"] = array();
if($users){
foreach($users as $user) {
            $info = array();
            $info["id"] = $user["id"];
            $info["name"] = $user["name"];
            $info["email"] = $user["email"];
             $info["event"] = $user["event"];
            $info["password"] = $user["password"];
            $info["latitude"] = $user["latitude"];
            $info["longitude"] = $user["longitude"];
            $info["created_at"] = $user["created_at"];
            $info["updated_at"] = $user["updated_at"];
            array_push($response["users"], $info);
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


