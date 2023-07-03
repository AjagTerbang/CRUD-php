<?php

define("BASEPATH", true);

require_once 'connection.php';
$db = new Database();


$action = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case "delete":
        $result =$db->delete($id);
        if ($result){
            echo "<script>alert('Data berhasil dihapus');</script>";
            echo "<script>history.back();</script>";
        }else{
            echo "<script>alert('Data gagal dihapus');</script>";
            echo "<script>history.back();</script>";
        }
        break;
}