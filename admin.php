    <!-- panggil file footer -->
    <?php 
    
    include "header.php";
    include "koneksi.php";
    
    ?>
    


    <!-- Head -->
    <!-- Buat Favicon -->
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
    <div class="head text-center">
        <img src="assets/img/logo.PNG" width="150">
        <br><h2 class="text-white">Buku Tamu BPSDMP Kominfo Surabaya</h2><br>
    </div>
    <!-- Akhir Head -->

    <!-- Awal row -->
    <div class="row mt-2">
        <!-- Awal col-lg-7 -->
        <div class="col-lg-7 mb-3">
            <div class="card shadow bg-gradient-light">
                <!-- Awal card-body -->
                <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas Tamu</h1>
                            </div>
                            <form class="user" method="POST" action="simpan_data.php">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="No_Ktp" placeholder="No KTP" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Nama_tamu" placeholder="Nama Tamu" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Alamat_tamu" placeholder="Alamat Tamu" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="No_Hp" placeholder="No HP" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Instansi" placeholder="Instansi" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="Keperluan" placeholder="Keperluan" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h5 class="text-center">Checkin</h5>
                                        <input type="time" class="form-control form-control-user" name="Check_in" placeholder="Checkin" required>
                                    </div>
                                </div>
                                <input type="submit" name="btsimpan" class="btn btn-primary btn-user btn-block"  value="Simpan Data"></input>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" >BPSDMP Kominfo 2021 - <?=date('Y') ?></a>
                            </div>
                </div>
                <!-- end card-body -->
            </div>
        </div>
        <!-- end col-lg-7 -->

        <!-- Awal col-lg-5 -->
        <div class="col-lg-5 mb-3">
            <!-- Awal card -->
            <div class="card shadow ">
                <!-- Awal card-body -->
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Statistik Tamu</h1>
                    </div>
                    <?php
                    //deklarasi tanggal

                    // menampilkan tanggal sekarang

                    $tgl_sekarang = date('Y-m-d');

                    // menampilkan tgl kemarin
                    $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                    
                    //mendapatkan 6 hari sebelum tgl sekarang
                    $seminggu= date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));
                    
                    $sekarang = date('Y-m-d h:i:s');

                    $bulan_ini = date('m');

                    // persiapan query tampilkan data pengunjung
                    $tgl_sekarang = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                        "SELECT count(*) FROM cek_inout where Tanggal like '%$tgl_sekarang%'"));
                    
                    $kemarin = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                        "SELECT count(*) FROM cek_inout where Tanggal like '%$kemarin%'"));
                    
                    $seminggu = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                        "SELECT count(*) FROM cek_inout where Tanggal BETWEEN '$seminggu' and '$sekarang'"));
                    
                    $sebulan = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                        "SELECT count(*) FROM cek_inout where month(Tanggal) = '$bulan_ini'"));
                    
                    $keseluruhan = mysqli_fetch_array(mysqli_query(
                        $koneksi, 
                        "SELECT count(*) FROM tb_tamu"));
                    
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Hari ini</td>
                            <td>: <?= $tgl_sekarang[0]?></td>
                        </tr>
                        <tr>
                            <td>Kemarin</td>
                            <td>: <?= $kemarin[0]?></td>
                        </tr>
                        <tr>
                            <td>Minggu ini</td>
                            <td>: <?= $seminggu[0]?></td>
                        </tr>
                        <tr>
                            <td>Bulan ini</td>
                            <td>: <?= $sebulan[0]?></td>
                        </tr>
                        <tr>
                            <td>Keseluruhan</td>
                            <td>: <?= $keseluruhan[0]?></td>
                        </tr>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-lg-5 -->

    </div>
    <!-- end row -->

<!-- panggil tampil data -->
<?php include "tampil_data.php";?>

<!-- panggil file footer -->
 <?php include "footer.php";?>