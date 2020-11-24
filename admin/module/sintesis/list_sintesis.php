<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h4>Proses Sintesis & Cek Konsistensi Logika</h4>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- warna header :  style="background-color: #031926; color : white;" -->
    <!-- warna isi :  style="background-color: #9DBEBB;" -->
    <!-- warna jumlah :  style="background-color: #fcaf58;" -->
    <!-- warna prioritas :  style="background-color: #468189; color: white;" -->
    <!-- warna abu muda striped :  style="background-color: #F9F9F9;" -->

    <!-- Main content -->
    <section class="content">
        <!-- Kriteria -->
        <div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4>Kriteria</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th></th>
                                <th>Tes Microteaching</th>
                                <th>Tes Wawancara</th>
                                <th>Tes Akademik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM pb_kriteria");
                            $sql = mysqli_query($con, "SELECT * FROM jml WHERE tipe='kriteria'");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td></td>
                                <td><?= $kat['tm']; ?></td>
                                <td><?= $kat['tw']; ?></td>
                                <td><?= $kat['ta']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tr style="background-color: #fcaf58;">
                            <td>Jumlah</td>
                            <?php while ($a = mysqli_fetch_array($sql)) { ?>
                            <td><?= $a['jumlah']; ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <br>
                    <!-- Sintesis -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 20%;">Tes Microteaching</th>
                                <th style="width: 20%;">Tes Wawancara</th>
                                <th style="width: 20%;">Tes Akademik</th>
                                <th style="width: 20%;">Jumlah</th>
                                <th style="width: 20%;">Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_kr");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td><?= $kat['tm']; ?></td>
                                <td><?= $kat['tw']; ?></td>
                                <td><?= $kat['ta']; ?></td>
                                <td><?= $kat['j']; ?></td>
                                <td style="background-color: #468189; color: white;"><?= $kat['p']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Cek Konsistensi Logika -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 33%;">Prioritas</th>
                                <th style="width: 33%;">Jumlah</th>
                                <th style="width: 33%;">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_kr");
                            $sql2 = mysqli_query($con, "SELECT * FROM jml WHERE tipe='kriteria'");
                            $lamda = 0;
                            while ($kat = mysqli_fetch_array($queryEdit)) {
                                $b = mysqli_fetch_array($sql2);
                            ?>
                            <tr>
                                <td style="background-color: #468189; color: white;"><?= $prioritas = $kat['p']; ?></td>
                                <td style="background-color: #fcaf58;">
                                    <?= $jum = round($b['jumlah'], 2); ?></td>
                                <td style="background-color: #9DBEBB;"><?= $hsl = round($prioritas * $jum, 2); ?></td>
                            </tr>
                            <?php
                                $lamda += $hsl;
                            }
                            ?>
                        </tbody>
                        <tr>
                            <td colspan="2" align="right">Lamda (λ) maks</td>
                            <td><?= $lamda; ?></td>
                        </tr>
                        <tr style="background-color: #F9F9F9;">
                            <td colspan="2" align="right">CI</td>
                            <td><?= $ci = round(($lamda - 3) / (2), 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">CR</td>
                            <td><?= $cr = round($ci / 0.58, 2); ?></td>
                        </tr>
                        <tr style="background-color: #031926; color : white;">
                            <td colspan="2" align="right"><b>Note</b></td>
                            <td>
                                <?php
                                if ($cr <= 0.1) {
                                    echo "<b>" . $cr . " <= 0.1 <br> sudah konsisten </b>";
                                } else {
                                    echo "<b>" . $cr . " > 0.1 <br> belum konsisten </b>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Tes Microteaching -->
        <div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4>Tes Microteaching</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th></th>
                                <th>Kompeten</th>
                                <th>Kurang Kompeten</th>
                                <th>Tidak Kompeten</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM pb_tm");
                            $sql = mysqli_query($con, "SELECT * FROM jml WHERE tipe='tm'");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td></td>
                                <td><?= $kat['kompeten']; ?></td>
                                <td><?= $kat['kurang']; ?></td>
                                <td><?= $kat['tidak']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tr style="background-color: #fcaf58;">
                            <td>Jumlah</td>
                            <?php while ($a = mysqli_fetch_array($sql)) { ?>
                            <td><?= $a['jumlah']; ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <br>
                    <!-- Sintesis -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 20%;">Kompeten</th>
                                <th style="width: 20%;">Kurang Kompeten</th>
                                <th style="width: 20%;">Tidak Kompeten</th>
                                <th style="width: 20%;">Jumlah</th>
                                <th style="width: 20%;">Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_tm");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td><?= $kat['kp']; ?></td>
                                <td><?= $kat['kr']; ?></td>
                                <td><?= $kat['tdk']; ?></td>
                                <td><?= $kat['j']; ?></td>
                                <td style="background-color: #468189; color: white;"><?= $kat['p']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Cek Konsistensi Logika -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 33%;">Prioritas</th>
                                <th style="width: 33%;">Jumlah</th>
                                <th style="width: 33%;">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_tm");
                            $sql2 = mysqli_query($con, "SELECT * FROM jml WHERE tipe='tm'");
                            $lamda = 0;
                            while ($kat = mysqli_fetch_array($queryEdit)) {
                                $b = mysqli_fetch_array($sql2);
                            ?>
                            <tr>
                                <td style="background-color: #468189; color: white;"><?= $prioritas = $kat['p']; ?></td>
                                <td style="background-color: #fcaf58;"><?= $jum = round($b['jumlah'], 2); ?></td>
                                <td style="background-color: #9DBEBB;"><?= $hsl = round($prioritas * $jum, 2); ?></td>
                            </tr>
                            <?php
                                $lamda += $hsl;
                            }
                            ?>
                        </tbody>
                        <tr>
                            <td colspan="2" align="right">Lamda (λ) maks</td>
                            <td><?= $lamda; ?></td>
                        </tr>
                        <tr style="background-color: #F9F9F9;">
                            <td colspan="2" align="right">CI</td>
                            <td><?= $ci = round(($lamda - 3) / (2), 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">CR</td>
                            <td><?= $cr = round($ci / 0.58, 2); ?></td>
                        </tr>
                        <tr style="background-color: #031926; color : white;">
                            <td colspan="2" align="right"><b>Note</b></td>
                            <td>
                                <?php
                                if ($cr <= 0.1) {
                                    echo "<b>" .  $cr . " <= 0.1 <br> sudah konsisten </b>";
                                } else {
                                    echo "<b>" . $cr . " > 0.1 <br> belum konsisten </b>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Tes Wawancara -->
        <div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Tes Wawancara</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th></th>
                                <th>Baik</th>
                                <th>Cukup</th>
                                <th>Kurang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM pb_tw");
                            $sql = mysqli_query($con, "SELECT * FROM jml WHERE tipe='tw'");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td></td>
                                <td><?= $kat['baik']; ?></td>
                                <td><?= $kat['cukup']; ?></td>
                                <td><?= $kat['kurang']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tr style="background-color: #fcaf58;">
                            <td>Jumlah</td>
                            <?php while ($a = mysqli_fetch_array($sql)) { ?>
                            <td><?= $a['jumlah']; ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <br>
                    <!-- Sintesis -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 20%;">Baik</th>
                                <th style="width: 20%;">Cukup</th>
                                <th style="width: 20%;">Kurang</th>
                                <th style="width: 20%;">Jumlah</th>
                                <th style="width: 20%;">Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_tw");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td><?= $kat['b']; ?></td>
                                <td><?= $kat['c']; ?></td>
                                <td><?= $kat['k']; ?></td>
                                <td><?= $kat['j']; ?></td>
                                <td style="background-color: #468189; color: white;"><?= $kat['p']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Cek Konsistensi Logika -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color : white;">
                                <th style="width: 33%;">Prioritas</th>
                                <th style="width: 33%;">Jumlah</th>
                                <th style="width: 33%;">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_tw");
                            $sql2 = mysqli_query($con, "SELECT * FROM jml WHERE tipe='tw'");
                            $lamda = 0;
                            while ($kat = mysqli_fetch_array($queryEdit)) {
                                $b = mysqli_fetch_array($sql2);
                            ?>
                            <tr>
                                <td style="background-color: #468189; color: white;"><?= $prioritas = $kat['p']; ?></td>
                                <td style="background-color: #fcaf58;">
                                    <?= $jum = round($b['jumlah'], 2); ?></td>
                                <td style="background-color: #9DBEBB;">
                                    <?= $hsl = round($prioritas * $jum, 2); ?></td>
                            </tr>
                            <?php
                                $lamda += $hsl;
                            }
                            ?>
                        </tbody>
                        <tr>
                            <td colspan="2" align="right">Lamda (λ) maks</td>
                            <td><?= $lamda; ?></td>
                        </tr>
                        <tr style="background-color: #F9F9F9;">
                            <td colspan="2" align="right">CI</td>
                            <td><?= $ci = round(($lamda - 3) / (2), 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">CR</td>
                            <td><?= $cr = round($ci / 0.58, 2); ?></td>
                        </tr>
                        <tr style="background-color: #031926; color : white;">
                            <td colspan="2" align="right"><b>Note</b></td>
                            <td>
                                <?php
                                if ($cr <= 0.1) {
                                    echo "<b>" . $cr . " <= 0.1 <br> sudah konsisten </b>";
                                } else {
                                    echo "<b>" . $cr . " > 0.1 <br> belum konsisten </b>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Tes Akademik -->
        <div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h4>Tes Akademik</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color: white;">
                                <th></th>
                                <th>Tinggi</th>
                                <th>Sedang</th>
                                <th>Rendah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM pb_ta");
                            $sql = mysqli_query($con, "SELECT * FROM jml WHERE tipe='ta'");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td></td>
                                <td><?= $kat['tinggi']; ?></td>
                                <td><?= $kat['sedang']; ?></td>
                                <td><?= $kat['rendah']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tr style="background-color: #fcaf58;">
                            <td>Jumlah</td>
                            <?php while ($a = mysqli_fetch_array($sql)) { ?>
                            <td><?= $a['jumlah']; ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <br>
                    <!-- Sintesis -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color: white;">
                                <th style="width: 20%;">Tinggi</th>
                                <th style="width: 20%;">Sedang</th>
                                <th style="width: 20%;">Rendah</th>
                                <th style="width: 20%;">Jumlah</th>
                                <th style="width: 20%;">Prioritas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_ta");

                            while ($kat = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <tr style="background-color: #9DBEBB;">
                                <td><?= $kat['ti'] ?></td>
                                <td><?= $kat['se'] ?></td>
                                <td><?= $kat['re'] ?></td>
                                <td><?= $kat['j'] ?></td>
                                <td style="background-color: #468189; color: white;"><?= $kat['p'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <!-- Cek Konsistensi Logika -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #031926; color: white;">
                                <th style="width: 33%;">Prioritas</th>
                                <th style="width: 33%;">Jumlah</th>
                                <th style="width: 33%;">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryEdit = mysqli_query($con, "SELECT * FROM s_ta");
                            $sql2 = mysqli_query($con, "SELECT * FROM jml WHERE tipe='ta'");
                            $lamda = 0;
                            while ($kat = mysqli_fetch_array($queryEdit)) {
                                $b = mysqli_fetch_array($sql2);
                            ?>
                            <tr>
                                <td style="background-color: #468189; color: white;"><?= $prioritas = $kat['p']; ?></td>
                                <td style="background-color: #fcaf58;"><?= $jum = round($b['jumlah'], 2); ?></td>
                                <td style="background-color: #9DBEBB;"><?= $hsl = round($prioritas * $jum, 2); ?></td>
                            </tr>
                            <?php
                                $lamda += $hsl;
                            }
                            ?>
                        </tbody>
                        <tr>
                            <td colspan="2" align="right">Lamda (λ) maks</td>
                            <td><?= $lamda; ?></td>
                        </tr>
                        <tr style="background-color: #F9F9F9;">
                            <td colspan="2" align="right">CI</td>
                            <td><?= $ci = round(($lamda - 3) / (2), 2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">CR</td>
                            <td><?= $cr = round($ci / 0.58, 2); ?></td>
                        </tr>
                        <tr style="background-color: #031926; color: white;">
                            <td colspan="2" align="right"><b>Note</b></td>
                            <td>
                                <?php
                                if ($cr <= 0.1) {
                                    echo "<b>" . $cr . " <= 0.1 <br> sudah konsisten </b>";
                                } else {
                                    echo "<b>" . $cr . " > 0.1 <br> belum konsisten </b>";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->