<?php
defined("BASEPATH") or exit("Access Denied");

include_once("const.php");
session_start();
class database{
    public $db;
    public function __construct() {
       $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         if ($this->db->connect_errno) {
              echo "Failed to connect to MySQL: " . $this->db->connect_error;
              exit();
         }
    } 

    function login($username, $password)  {
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $stmt = mysqli_query($this->db, $query);
        if($stmt->num_rows>0){
            $row = mysqli_fetch_assoc($stmt);
            $_SESSION['nama']=$row['nama'];
            return true;
        }
        return false;
        
    }

   function addPemain($name, $skor){
        try{

            $query = "INSERT INTO peserta (nama, skor) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("si", $name, $skor);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    function delete($id){
        try {
            if (!isset($id)) return false;
            $query = "DELETE FROM peserta WHERE id=$id";
            $result = mysqli_query($this->db, $query);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
            return false;
        }
     
    }

    function getdata($id){
        
        $query = "SELECT * FROM peserta where id = $id";

        $result = mysqli_query($this->db, $query);
        if ($result) {
            return $result->fetch_assoc();  
        }
      
    }
    

    function update($id, $nama, $skor){
        $query = "UPDATE peserta SET nama ='$nama', skor='$skor' WHERE id='$id'";
        $stmt = mysqli_query($this->db, $query);
  
  
        if ($stmt === true) {
          return true;
        }else{
          return false;
        }
     
    }
}
?>