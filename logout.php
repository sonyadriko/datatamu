
 <!-- sweet alert -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

//session start
session_start();
 
//hilangkan session yang sudah di set
unset($_SESSION['id_user']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();

header("location:index.php");
?>
  
 
