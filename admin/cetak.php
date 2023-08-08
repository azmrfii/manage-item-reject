<?php
    include "../config/koneksi.php";
?>
<center style="font-family: Georgia, 'Times New Roman', Times, serif;">
<h2>Laporan Data Barang</h2>
<h4>Sistem Pengelola Barang Riject</h4>
</center>
<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk Barang</th>
        <th>Warna Barang</th>
        <th>Ukuran Barang</th>
        <th>Tanggal Masuk</th>
        <th>keterangan</th>
    </tr>
    <?php
                            $sql = mysqli_query($con, "SELECT * FROM tb_barang ORDER BY kd_barang ASC");
                            $no = 0;
                            while($data = mysqli_fetch_array($sql)){
                            $no++;
                        ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data['kd_barang']?></td>
        <td><?php echo $data['nama_barang']?></td>
        <td><?php echo $data['merk_barang']?></td>
        <td><?php echo $data['warna_barang']?></td>
        <td><?php echo $data['ukuran_barang']?></td>
        <td><?php echo $data['tgl_masuk']?></td>
        <td><?php echo $data['keterangan']?></td>
    </tr>
    <?php } ?>
</table>
<br>

<br>
<br>
<div align="right">
    <br><br><br><br><br>
    <br>
    <br>
</div>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br>
<script>
    window.print();
</script>