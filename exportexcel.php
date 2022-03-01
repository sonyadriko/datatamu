<?php
include "koneksi.php";

//Persiapan untuk excel
header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=Export Excel Data Tamu.xls");
header("Pragma: no-cache");
header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6"> Rekapitulasi Data Tamu</th>
    </tr>
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
<tbody>
                                    <?php

                                    $tgl1 = $_POST['tanggal1a']; 
                                    $tgl2 = $_POST['tanggal1b']; 

                                
                            
                                    $hasil=mysqli_query($koneksi, "SELECT * FROM tb_tamu where tanggal between '$tgl1' and '$tgl2' order by Tanggal asc");
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