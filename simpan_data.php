<?php
    include "koneksi.php";
    // uji jika tombol simpan di klik
    if (isset($_POST["btsimpan"]))
    {
        $no_ktp   =htmlspecialchars($_POST['No_Ktp'], ENT_QUOTES);
        $tgl      =date('Y-m-d');
        //htmlspecialchars agara inputan lebih aman dari injection
        $nama     =htmlspecialchars($_POST['Nama_tamu'], ENT_QUOTES);
        $alamat   =htmlspecialchars($_POST['Alamat_tamu'], ENT_QUOTES);
        $no_hp    =htmlspecialchars($_POST['No_Hp'], ENT_QUOTES);
        $instansi =htmlspecialchars($_POST['Instansi'], ENT_QUOTES);
        $keperluan=htmlspecialchars($_POST['Keperluan'], ENT_QUOTES);
        $checkin  =htmlspecialchars($_POST['Check_in'], ENT_QUOTES);
        
        //persiapan query simpan data
        $simpan   = mysqli_query($koneksi, "INSERT INTO tb_tamu SET No_Ktp='$no_ktp', Nama_Tamu='$nama', Alamat_Tamu='$alamat', No_Hp='$no_hp', Instansi='$instansi', Keperluan='$keperluan'");
        $simpan  = mysqli_query($koneksi, "INSERT INTO cek_inout SET id_inout='', No_Ktp='$no_ktp', Tanggal='$tgl', Check_in='$checkin'");

        //uji jika simpan data
        if($simpan)
        {
            echo "<script>alert('Berhasil checkin.')</script>";
            header("Location:admin.php");
            
        }
        else
        {
            echo "<script>alert('Gagal checkin.')</script>";
                header("Location:admin.php");
        }   
    }
    
    ?>