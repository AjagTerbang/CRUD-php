<?php
header("Content-Type: application/json");
 define ("BASEPATH", true);
 require_once "../connection.php";

 $db = new Database();
 if(!isset($_GET['id'])){
    echo json_encode([
        "status" => "error",
        "message"=> "invalid id"
    ]);
    return ;
 }
 $data = $db->getdata($_GET['id']);
 echo json_encode([
    "status"=>"success",
    "data" => $data
 ]);

return;
?>