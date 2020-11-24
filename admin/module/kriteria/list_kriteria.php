<!-- Content Wrapper. Contains page content -->
<?php
    include "../lib/config.php";
    include "../lib/koneksi.php";
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h4>List Kriteria</h4>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="box box-secondary">
                <div class="box-header with-border">
                    <a href="<?php echo $admin_url; ?>adminweb.php?module=tambah_kriteria"><button type="submit"
                            class="btn" style="background-color: #fcaf58; color: black;">Tambah Data</button></a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #4c5760; color: white;">
                                    <th>ID Kriteria</th>
                                    <th>Kriteria</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #9DBEBB;">
                                <?php
        						$KueriKategori=mysqli_query($con,"select * from kriteria");
                                    while ($kat=mysqli_fetch_array($KueriKategori)) {
                                ?>
                                <tr>
                                    <td><?php echo $kat['id_kriteria']; ?></td>
                                    <td><?php echo $kat['kriteria']; ?></td>
                                    <td><?php echo $kat['nilai']; ?></td>
                                    <td>
                                        <div class="btn">
                                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_kriteria&id_kriteria=<?php echo $kat['id_kriteria']; ?>"
                                                class="btn-sm btn bg"
                                                style="background-color: #283845; color: white;">Edit</button></a>
                                            <a href="<?= $admin_url;?>/module/kriteria/aksi_hapus.php?id_kriteria=<?= $kat['id_kriteria']; ?>"
                                                onClick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                class="btn-sm btn bg"
                                                style="background-color: #006d77; color: white;">Hapus</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- warna header :  style="background-color: #031926; color : white;" -->
<!-- warna isi :  style="background-color: #9DBEBB;" -->
<!-- warna jumlah :  style="background-color: #fcaf58;" -->
<!-- warna prioritas :  style="background-color: #468189; color: white;" -->
<!-- warna abu muda striped :  style="background-color: #F9F9F9;" -->