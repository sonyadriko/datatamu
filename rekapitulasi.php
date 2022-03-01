<?php include "header.php" ?>
<!-- Awal Arrow-->
<div class="row">
    <!-- Awal col-md-12 --> 
    <div class="col-md-12">
        <!-- Awal Card -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Tamu</h6>
            </div>
        <div class="card-body">
            <form method="POST" action="" class="text-center">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input class="form-control" type="date" name="tanggal1" value="<?= isset($_POST['tanggal1'])? $_POST['tanggal1']: date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input class="form-control" type="date" name="tanggal2" value="<?= isset($_POST['tanggal2'])? $_POST['tanggal2']: date('Y-m-d') ?>"  required>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <button class="btn btn-primary form-control" name="btampilkan"><i class="fa fa-search"></i> Tampilkan</button>
            </div>
            <div class="col-md-2">
                   <a href="admin.php" class="btn btn-danger form-control"><i class="fa fa-backward"></i> Kembali</a>
            </div>
</div>
        </form>

        <?php
        if(isset($_POST['btampilkan'])) :

?>

        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No.KTP</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Instansi</th>
                                            <th>Keperluan</th>
                                            <td>Checkin</td>
                                            <td>Checkout</td>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>No.KTP</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Instansi</th>
                                            <th>Keperluan</th>
                                            <td>Checkin</td>
                                            <td>Checkout</td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

                                    $tgl1 = $_POST['tanggal1']; 
                                    $tgl2 = $_POST['tanggal2']; 

                                
                            
                                    $hasil=mysqli_query($koneksi, "SELECT * FROM tb_tamu where tanggal between '$tgl1' and '$tgl2' order by Tanggal");
                                    $no = 1; 
                                    while ($data =mysqli_fetch_array($hasil))
                                    {
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data['No_Ktp']?></td>
                                            <td><?=$data['Tanggal']?></td>
                                            <td><?=$data['Nama_tamu']?></td>
                                            <td><?=$data['Alamat_tamu']?></td>
                                            <td><?=$data['No_Hp']?></td>
                                            <td><?=$data['Instansi']?></td>
                                            <td><?=$data['Keperluan']?></td>
                                            <td><?=$data['Check_in']?></td>
                                            <td><?=$data['Check_out']?></td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>

                                <center>
                                 <form method="POST" action="exportexcel.php">
                                     <div class="col-md-4">
                                     <input type="hidden" name="tanggal1a" value ="<?=@$_POST['tanggal1'] ?>">
                                     <input type="hidden" name="tanggal1b" value ="<?=@$_POST['tanggal2'] ?>">

                                     <button class="btn btn-success form-control" name="bexport"><i class="fa fa-download"></i> Export Data Excel</button>
                                    </form>           
                                </center>            

                            </div>
        <?php endif; ?>                    
        </div>
    </div>
    <!-- end Card -->
</div>
<!-- Akhir col-md-12 -->

</div>
<!-- Akhir Arrow -->





<?php include "footer.php"; ?>