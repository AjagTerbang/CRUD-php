<?php
    define("BASEPATH", "public");
    include_once("connection.php");
    if(!isset($_SESSION['nama'])){
        header("Location: login.php");
         exit;
      }
    $db = new database();
    if(isset($_POST['submit'])){
      
        $nama=$_POST['nama'];
        $skor=$_POST['skor'];
        if (!$nama || $skor) {
            return "
            <script>
                alert('Harap isi data dengan benar!');
            </script>
            ";
        }
        $result = $db->addPemain($nama, $skor);
        if($result){
            echo "  <script>                
            alert('data berhasil ditambahkan');
                    </script>";
            echo "<script>history.back();</script>";
            exit();
        }
        echo "<script>
                alert('data gagal ditambahkan');
            </script>";
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\css\maxcdn.bootstrapcdn.com_bootstrap_4.0.0_css_bootstrap.min.css">

    
    <title>Ranking Bulu Tangkis</title>
</head>
<body style="background-image: url(public/img/wp2.jpg);background-size: cover;background-repeat: no-repeat;background-position: center;">


    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-5 mb-5" style="color: white;">
                Ranking Pemain Bulu Tangkis Tunggal Putra
            </h1>
        </div>
        <div class="main row justify-content-center">
            <form method="POST" class="row justify-content-center mb-4">
                <div class="col-10 mb-3">
                    <label for="nama" style="color: white;">NAMA</label>
                    <input type="text" id="nama"class="form-control" name="nama" placeholder="NAMA" require>
                </div>
                <div class="col-10 mb-3">
                    <label for="skor" style="color: white;">SKOR</label>
                    <input type="number" id="skor"class="form-control" name="skor" placeholder="0" require>
                </div>
                <div class="col-10 mb-5">
                    <input type="submit" name="submit"value="tambah" class="btn btn-primary">
                    <input type="submit" name="logout"value="logout" class="btn b">
                </div>
                
            </form>
            <div class="col-10 mt-5">

            <table class="table table-striped table-light"> 

                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>NAMA</th>
                        <th>SKOR</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                        $sql = "SELECT * FROM peserta ORDER BY skor DESC";
                        $result = mysqli_query($db->db, $sql);
                        $rank = 1;

                        if (mysqli_num_rows($result) > 0) {
    
                        while ($row = $result->fetch_assoc()) {
                          
                    ?>
                <tbody>
                    <td><?= $rank ?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['skor'] ?></td>
                    <td>
                    <button class="btn btn-sm btn-warning update" data-id='<?=$row['id']?>'>Edit</button>
                    <a href="delete.php?id=<?= $row['id']?>&type=delete" class="btn btn-danger btn-sm delete">Delete</a>
                    </td>
                    <?php
                        $rank++;
                        }
                    }else{
                        echo "Tidak ada Pemain";
                    }
                    ?>
                </tbody>

            </table>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> -->
                    <!-- Isi konten form edit di sini -->
                    <!-- <form method="POST" action="process.php">
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $nama; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    

    <script src="public/js/code.jquery.com_jquery-3.2.1.slim.min.js"></script>
    <script src="public/js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.12.9_umd_popper.min.js"></script>
    <script src="public/js/maxcdn.bootstrapcdn.com_bootstrap_4.0.0_js_bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="admin.js"></script>
</body>
</html>