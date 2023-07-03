<?php
define('BASEPATH', true);

include_once "../connection.php";
$db = new Database();
$id = $_POST['id'];
$nama = $_POST['nama'];
$skor = $_POST['skor'];


$result = $db->update($id, $nama, $skor);


header("Content-type: application/json");
if($result){
    echo json_encode([
        "status"=>"success",
        "data" => $result
    ]);

    die;
}else{
    echo json_encode([
        "status" => "error",
        "message"=> "invalid id"
    ]);
    die;
}


?>