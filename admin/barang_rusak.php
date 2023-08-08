<?php
    include "../config/koneksi.php";
    if(isset($_POST['simpan'])){
        mysqli_query($con, "INSERT INTO tb_barang_rusak VALUES('', '$_POST[kd_barang]', '$_POST[nama_barang]', '$_POST[merk_barang]', '$_POST[warna_barang]', '$_POST[ukuran_barang]', '$_POST[tgl_masuk]', '$_POST[keterangan]')");
        echo "<script>alert('Data Tersimpan')</script>";
        echo "<script>document.location.href = '?barang_rusak'</script>";
    }
    //delete code
    if(isset($_GET['hapus'])){
        mysqli_query($con, "DELETE FROM tb_barang_rusak WHERE id_barang = '$_GET[id]'");
        echo "<script>alert('Data Terhapus')</script>";
        echo "<script>document.location.href = '?barang_rusak'</script>";
    }
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
                <h3>Input Data Barang Rusak</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard-admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Proses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <form action="" method="post"  enctype="multipart/form-data">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Inputs</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Kode Barang</label>
                            <input type="text" class="form-control" id="basicInput" name="kd_barang" placeholder="Enter Kode Barang" value="<?php echo @$_POST['kd_barang']?>" onchange="submit()">
                            <?php
                                if(isset($_POST['kd_barang'])){
                                    $n = mysqli_query($con, "SELECT * FROM tb_barang WHERE kd_barang = '$_POST[kd_barang]'");
                                    $ni = mysqli_fetch_array($n);
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nama Barang</label>
                            <input type="text" class="form-control" id="basicInput" name="nama_barang" placeholder="Enter Nama Barang" value="<?php echo @$ni['nama_barang']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Merk Barang</label>
                            <input type="text" class="form-control" id="basicInput" name="merk_barang" placeholder="Enter Merk Barang" value="<?php echo @$ni['merk_barang']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Warna Barang</label>
                            <input type="text" class="form-control" id="basicInput" name="warna_barang" placeholder="Enter Warna Barang" value="<?php echo @$ni['warna_barang']?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="basicInput">Ukuran Barang</label>
                            <fieldset class="form-group" readonly>
                                <select class="form-select" id="basicSelect" name="ukuran_barang" readonly>
                                    <?php
                                        $sz = array("S", "M", "L", "XL", "XXL");
                                            foreach($sz as $sz){
                                    ?>
                                <option value="<?php echo $sz ?>" <?php if($sz == @$ni['ukuran_barang']) echo "selected='selected'"?> readonly><?php echo $sz ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="basicInput" name="tgl_masuk" value="<?php echo @$ni['tgl_masuk']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="basicInput">keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="5" placeholder="keterangan" readonly><?php echo @$ni['keterangan']?></textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary me-1 mb-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Barang Rusak</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Barang Rusak
            </div>
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
                            $sql = mysqli_query($con, "SELECT * FROM tb_barang_rusak ORDER BY kd_barang ASC");
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
                            <td><a href="?barang_rusak&hapus&id=<?php echo $data['id_barang']?>" class="btn btn-danger">Delete</a></td>
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