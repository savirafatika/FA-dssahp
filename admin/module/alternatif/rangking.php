<!-- Content Wrapper. Contains page content -->
<?php
    include "../lib/config.php";
    include "../lib/koneksi.php";
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h4>Rangking</h4>
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4>Rangking Alternatif</h4>
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
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #9DBEBB;">
                                <?php
        						$KueriKategori=mysqli_query($con,"SELECT * FROM alternatif ORDER BY total DESC");
                                    while ($kat=mysqli_fetch_array($KueriKategori)) {
                                ?>
                                <tr>
                                    <td><?= $kat['nim']; ?></td>
                                    <td><?= $kat['nama']; ?></td>
                                    <td><?= $kat['total']; ?></td>
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