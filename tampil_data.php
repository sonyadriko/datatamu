<?php
    include 'koneksi.php';
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tamu Hari ini [<?=date('d-m-Y')?>]</h6>
                        </div>
                        <div class="card-body">
                            <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Tamu </a>
                            <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i> Log out </a>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No.KTP</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>Instansi</th>
                                            <th>Keperluan</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>No.KTP</th>
                                            <th>Tanggal</th>
                                            <th>Nama Tamu</th>
                                            <th>Alamat</th>
                                            <th>Instansi</th>
                                            <th>Keperluan</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    
                                    $tgl= date('Y-m-d');
                                    $no = 1;
                                    $hasil=mysqli_query($koneksi, "SELECT * FROM tb_tamu INNER JOIN  cek_inout ON tb_tamu.No_Ktp = cek_inout.No_Ktp WHERE Tanggal like '%$tgl%' order by 'Check_in'");
                                    while ($data =mysqli_fetch_array($hasil))
                                    {
                                    ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$data['No_Ktp']?></td>
                                            <td><?=$data['Tanggal']?></td>
                                            <td><?=$data['Nama_tamu']?></td>
                                            <td><?=$data['Alamat_tamu']?></td>
                                            <td><?=$data['Instansi']?></td>
                                            <td><?=$data['Keperluan']?></td>
                                            <td><?=$data['Check_in']?></td>
                                            <td><?=$data['Check_out']?></td>
                                            <td>
                                                <a href='checkout.php?No_Ktp=<?php echo $data['No_Ktp']; ?>' class="btn btn-primary btn-user btn-block">Check Out</a>
                                                
                                            </td>
                                        </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
