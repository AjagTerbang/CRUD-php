<?php
    define("BASEPATH", "public");
    include_once("connection.php");
    $db = new database();
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $db->login($username, $password);
        if($result){
            
        echo "  <script>
                    alert('login berhasil');
                </script>";
                header("Location: index.php");
            exit();    
        }
        echo "<script>
                alert('email/password salah');
            </script>";
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="public\css\maxcdn.bootstrapcdn.com_bootstrap_4.0.0_css_bootstrap.min.css">
</head>

<body style="background-image: url(public/img/wp2.jpg);background-size: cover;background-repeat: no-repeat;background-position: center;">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center" style="color:white">Form Login</h2>
            <form method="post" class="mx-auto">
                <div class="form-group">
                    <label for="username" style="color:white">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password" style="color:white">Password</label>
                    <input type="password" class="form-control" name="password"id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
        </div>
    </div>
</div>
<!-- Pills content -->
<script src="public/js/code.jquery.com_jquery-3.2.1.slim.min.js"></script>
<script src="public/js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.12.9_umd_popper.min.js"></script>
<script src="public/js/maxcdn.bootstrapcdn.com_bootstrap_4.0.0_js_bootstrap.min.js"></script>

</body>
</html>



<!-- <!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link rel="stylesheet" href="public\css\maxcdn.bootstrapcdn.com_bootstrap_4.0.0_css_bootstrap.min.css">
</head>
<body style="background-image: url(public/img/wp2.jpg);background-size: cover;background-repeat: no-repeat;background-position: center;">
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center" style="color:white">Form Login</h2>
            <form method="post">
                <div class="form-group">
                    <label for="username" style="color:white">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password" style="color:white">Password</label>
                    <input type="password" class="form-control" name="password"id="password" placeholder="Enter password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
        </div>
    </div>
</div>
<!-- Pills content -->
<!-- <script src="public/js/code.jquery.com_jquery-3.2.1.slim.min.js"></script>
<script src="public/js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.12.9_umd_popper.min.js"></script>
<script src="public/js/maxcdn.bootstrapcdn.com_bootstrap_4.0.0_js_bootstrap.min.js"></script> -->

<!-- </body>
</html> --> -->
