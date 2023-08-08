<?php
    include "../config/koneksi.php";
?>
<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard-admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form action="" method="post"  enctype="multipart/form-data">
    <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Barang</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Barang
            </div>
            <a href="cetak.php" class="btn btn-success">Cetak Semua Data</a>
            <br>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk Barang</th>
                            <th>Warna Barang</th>
                            <th>Ukuran Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            <td><a href="cetak-admin.php?cetak&id=<?php echo $data['id_barang']?>" class="btn btn-success">Cetak</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>

    </section>
    </form>
    <!-- Basic Tables end -->
</div>
        </div>