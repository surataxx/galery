<?php
include "koneksi.php";

if(isset($_POST['Username'])) {
    $nama        = $_POST['NamaLengkap'];
    $email       = $_POST['Email'];
    $alamat      = $_POST['Alamat'];
    $username    = $_POST['Username'];
    $password    = $_POST['Password'];

   $query = mysqli_query($koneksi, "INSERT INTO user(NamaLengkap,Email,Alamat,Username,Password) values('$nama','$email','$alamat','$username','$password')");

    if($query > 0 ) {

        echo '<script>alert("Register berhasil, silahkan login");</script>';
        header('location:login.php');

    }else{

        echo '<script>alert("Register gagal");</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Galeri Foto</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-danger">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">

                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control" type="text" placeholder="Masukan Nama Lengkap" name="NamaLengkap" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control" type="email" placeholder="Masukan Email" name="Email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="Alamat" id="" class="form-control py-4" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmail">Username</label>
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Masukan Username" name="Username" />
                                            </div>
                                            <div class="form-gruop">             
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Masukan Password" name="Password" />
                                            </div>
                                            <div class="from-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Sudah punya akun? Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>