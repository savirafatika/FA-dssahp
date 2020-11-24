<!-- Content Wrapper. Contains page content -->
<?php
    include "../lib/config.php";
    include "../lib/koneksi.php";
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h4>Alternatif</h4>
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
            <!-- Hirarki dan Nilai prioritasnya -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Hierarchy</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body img-responsive">
                    <center>
                        <img src="../asset/images/h1.png" alt="hirarki">
                    </center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- Nilai Alternatif -->
            <div class="box box-secondary">
                <div class="box-header with-border">
                    <a href="<?php echo $admin_url; ?>adminweb.php?module=tambah_a"><button type="submit" class="btn"
                            style="background-color: #fcaf58; color: black;">Tambah Data</button></a>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <!-- CRUD ALTERNATIF -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #4c5760; color: white;">
                                    <th>ID</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Tes Microteaching</th>
                                    <th>Tes Wawancara</th>
                                    <th>Tes Akademik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #9DBEBB;">
                                <?php
        						$KueriKategori=mysqli_query($con,"select * from alternatif");
                                    while ($kat=mysqli_fetch_array($KueriKategori)) {
                                ?>
                                <tr>
                                    <td><?php echo $kat['id_a']; ?></td>
                                    <td><?php echo $kat['nim']; ?></td>
                                    <td><?php echo $kat['nama']; ?></td>
                                    <td><?php echo $kat['ntm']; ?></td>
                                    <td><?php echo $kat['ntw']; ?></td>
                                    <td><?php echo $kat['nta']; ?></td>
                                    <td>
                                        <div class="btn">
                                            <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_a&id_a=<?php echo $kat['id_a']; ?>"
                                                class="btn-sm btn bg"
                                                style="background-color: #283845; color: white;">Edit</button></a>
                                            <a href="<?= $admin_url;?>/module/alternatif/aksi_hapus_a.php?id_a=<?= $kat['id_a']; ?>"
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
                    <!-- /CRUD ALTERNATIF -->
                    <!-- Pemilihan Keputusan -->
                    <div class="box-body">
                        <h4><b>Pemilihan Keputusan</b></h4>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #4c5760; color: white;">
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tes Microteaching</th>
                                    <th>Tes Wawancara</th>
                                    <th>Tes Akademik</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #9DBEBB;">
                                <?php
                                    $Kueri = mysqli_query($con, "SELECT * FROM alternatif");
                                    while ($kat = mysqli_fetch_array($Kueri)) {
                                ?>
                                <tr>
                                    <td><?= $id = $kat['id_a']; ?></td>
                                    <td><?= $nama = $kat['nama']; ?></td>
                                    <td>
                                        <?php
                                            $Kueri2 = mysqli_query($con, "SELECT p FROM s_kr WHERE id_s = 1"); // p = 0.64
                                            $Kueri3 = mysqli_query($con, "SELECT p FROM s_tm WHERE id_stm = 1"); // p = 0.73 kompeten
                                            $Kueri4 = mysqli_query($con, "SELECT p FROM s_tm WHERE id_stm = 2"); // p = 0.19 kurang
                                            $Kueri5 = mysqli_query($con, "SELECT p FROM s_tm WHERE id_stm = 3"); // p = 0.08 tidak
                                            $kat2 = mysqli_fetch_array($Kueri2);
                                            $kat3 = mysqli_fetch_array($Kueri3);
                                            $kat4 = mysqli_fetch_array($Kueri4);
                                            $kat5 = mysqli_fetch_array($Kueri5);
                                            $ttl = 0;
                                            if ($kat['ntm'] == "Kompeten") {
                                                $ttl = round($kat3['p'] * $kat2['p'], 3);
                                            } else if ($kat['ntm'] == "Kurang Kompeten") {
                                                $ttl = round($kat4['p'] * $kat2['p'], 3);
                                            } else if ($kat['ntm'] == "Tidak Kompeten") {
                                                $ttl = round($kat5['p'] * $kat2['p'], 3);
                                            }
                                        ?>
                                        <?= $ttl; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $Kueri6 = mysqli_query($con, "SELECT p FROM s_kr WHERE id_s = 2"); // p = 0.25
                                            $Kueri7 = mysqli_query($con, "SELECT p FROM s_tw WHERE id_stw = 1"); // p = 0.73 baik
                                            $Kueri8 = mysqli_query($con, "SELECT p FROM s_tw WHERE id_stw = 2"); // p = 0.19 cukup
                                            $Kueri9 = mysqli_query($con, "SELECT p FROM s_tw WHERE id_stw = 3"); // p = 0.08 kurang
                                            $kat6 = mysqli_fetch_array($Kueri6);
                                            $kat7 = mysqli_fetch_array($Kueri7);
                                            $kat8 = mysqli_fetch_array($Kueri8);
                                            $kat9 = mysqli_fetch_array($Kueri9);
                                            $ttl2 = 0;
                                            if ($kat['ntw'] == "Baik") {
                                                $ttl2 = round($kat7['p'] * $kat6['p'], 3);
                                            } else if ($kat['ntw'] == "Cukup") {
                                                $ttl2 = round($kat8['p'] * $kat6['p'], 3);
                                            } else if ($kat['ntw'] == "Kurang") {
                                                $ttl2 = round($kat9['p'] * $kat6['p'], 3);
                                            }
                                        ?>
                                        <?= $ttl2; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $Kueri10 = mysqli_query($con, "SELECT p FROM s_kr WHERE id_s = 3"); // p = 0.1
                                            $Kueri11 = mysqli_query($con, "SELECT p FROM s_ta WHERE id_sta = 1"); // p = 0.73 tinggi
                                            $Kueri12 = mysqli_query($con, "SELECT p FROM s_ta WHERE id_sta = 2"); // p = 0.19 sedang
                                            $Kueri13 = mysqli_query($con, "SELECT p FROM s_ta WHERE id_sta = 3"); // p = 0.08 rendah
                                            $kat10 = mysqli_fetch_array($Kueri10);
                                            $kat11 = mysqli_fetch_array($Kueri11);
                                            $kat12 = mysqli_fetch_array($Kueri12);
                                            $kat13 = mysqli_fetch_array($Kueri13);
                                            $ttl3 = 0;
                                            if ($kat['nta'] == "Tinggi") {
                                                $ttl3 = round($kat11['p'] * $kat10['p'], 3);
                                            } else if ($kat['nta'] == "Sedang") {
                                                $ttl3 = round($kat12['p'] * $kat10['p'], 3);
                                            } else if ($kat['nta'] == "Rendah") {
                                                $ttl3 = round($kat13['p'] * $kat10['p'], 3);
                                            }
                                        ?>
                                        <?= $ttl3; ?>
                                    </td>
                                    <td>
                                        <?= $JUMLAH = round($ttl + $ttl2 + $ttl3, 3); ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /Pemilihan Keputusan-->
                </div>
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