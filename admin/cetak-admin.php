<?php
    include "../config/koneksi.php";
?>
<style>
    .content{
        font-size: 14px;
    }
    .content label{
        font-size: 14px;
    }
</style>
<center style="font-family: Georgia, 'Times New Roman', Times, serif;">
<h2>Laporan Data Barang</h2>
<h4>Sistem Pengelola Barang Riject</h4>
<hr>
</center>
<?php
    if(isset($_GET['cetak'])){
    $sql  = mysqli_query($con, "SELECT * FROM tb_barang WHERE id_barang = '$_GET[id]'");
    $data = mysqli_fetch_array($sql);
    }
?>

<br>
<center>
<table border="1">
<tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Merk Barang</th>
        <th>Warna Barang</th>
        <th>Ukuran Barang</th>
        <th>Tanggal Masuk</th>
        <th>keterangan</th>
    </tr>
    <tr>
        <td><?php echo $data['kd_barang']?></td>
        <td><?php echo $data['nama_barang']?></td>
        <td><?php echo $data['merk_barang']?></td>
        <td><?php echo $data['warna_barang']?></td>
        <td><?php echo $data['ukuran_barang']?></td>
        <td><?php echo $data['tgl_masuk']?></td>
        <td><?php echo $data['keterangan']?></td>
    </tr>
</table>
</center>
<br>
<br>
<div align="right">

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