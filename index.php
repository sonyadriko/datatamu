
<?php 
//panggil koneksi database
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login </title>
    <!-- Buat Favicon -->
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           <div class="col-lg-6 d-lg-block bg-gray-200  p-5 text-center">
                           <img src="assets/img/logo.png" alt="image" height="300" width="300"><hr>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buku Tamu BPSDMP Kominfo Surabaya</h1>
                                    </div>
                                    <form class="user" action="#" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="exampleInputUsername" aria-describedby="usernameHelp"
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" name="btn_login">Login</button>
                                       
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">BPSDMP Kominfo | 2021- <?=date('Y')?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	

</body>

</html>

<?php

//aktifkan session
  session_start();

if(isset($_POST['btn_login']))
{
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);

    $sql_login = "SELECT * FROM user where binary username='$username' and password='$password'";
    $query_login= mysqli_query($koneksi, $sql_login);
    $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
    $jumlah_login=mysqli_num_rows($query_login);

    //uji jika username dan passsword ditemukan/sesuai
        if ($jumlah_login == 1) 
        {
            $_SESSION['id_user'] = $data_login['id_user'];
            $_SESSION['username'] = $data_login['username'];
            $_SESSION['password'] = $data_login['password'];
            $_SESSION['nama_pengguna'] = $data_login['nama_pengguna'];
            
            echo "<script>
                            Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    document.location = 'admin.php';
                                }
                            })</script>";

        }
        else
        {
          echo "<script>
                            Swal.fire({title: 'Login Gagal Silahkan Coba Sekali Lagi',text: '',icon: 'error',confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    document.location = 'index.php';
                                }
                            })</script>";
        }
  }

?>