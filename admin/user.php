<?php
    include "../config/koneksi.php";
    if(isset($_POST['simpan'])){
        mysqli_query($con, "INSERT INTO tb_user VALUES('', '$_POST[username]', '$_POST[password]', '$_POST[level]')");
        echo "<script>alert('Data Tersimpan')</script>";
        echo "<script>document.location.href = '?user'</script>";
    }
    //delete code
    if(isset($_GET['hapus'])){
        mysqli_query($con, "DELETE FROM tb_user WHERE id_barang = '$_GET[id]'");
        echo "<script>alert('Data Terhapus')</script>";
        echo "<script>document.location.href = '?user'</script>";
    }
    //edit code
    if(isset($_GET['edit'])){
        $ed = mysqli_query($con, "SELECT * FROM tb_user WHERE id_user = '$_GET[id]'");
        $edit = mysqli_fetch_array($ed);
    }
    //update code
    if(isset($_POST['update'])){
        mysqli_query($con, "UPDATE tb_user SET username = '$_POST[username]', password = '$_POST[password]', level = '$_POST[level]' WHERE id_user = '$_GET[id]'");
        echo "<script>alert('Data Terubah')</script>";
        echo "<script>document.location.href = '?user'</script>";
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
                <h3>Input Data User</h3>
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
                            <label for="basicInput">Username</label>
                            <input type="text" class="form-control" id="basicInput" name="username" placeholder="Enter Username" value="<?php echo @$edit['username']?>">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Password</label>
                            <input type="password" class="form-control" id="basicInput" name="password" placeholder="Enter Password" value="<?php echo @$edit['password']?>">
                        </div>
                        <div class="form-group">
                        <label for="basicInput">Level</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="basicSelect" name="level">
                                    <?php
                                        $lv = array("Admin", "Manager");
                                            foreach($lv as $lv){
                                    ?>
                                <option value="<?php echo $lv ?>" <?php if($lv == @$edit['level']) echo "selected='selected'"?>><?php echo $lv ?></option>
                                    <?php } ?>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <?php
                            if(isset($_GET['edit'])){ ?>
                                <input type="submit" name="update" value="Update" class="btn btn-primary me-1 mb-1">
                            <?php }else{ ?>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary me-1 mb-1">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data User</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data User
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = mysqli_query($con, "SELECT * FROM tb_user ORDER BY username ASC");
                            $no = 0;
                            while($data = mysqli_fetch_array($sql)){
                            $no++;
                        ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['username']?></td>
                            <td><?php echo $data['password']?></td>
                            <td><?php echo $data['level']?></td>
                            <td><a href="?user&edit&id=<?php echo $data['id_user']?>" class="btn btn-warning">Edit</a>
                                <a href="?user&hapus&id=<?php echo $data['id_user']?>" class="btn btn-danger">Delete</a></td>
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