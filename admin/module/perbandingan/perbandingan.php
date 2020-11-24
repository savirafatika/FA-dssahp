<?php
include "../lib/config.php";
include "../lib/koneksi.php";
?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h4>Matrik Perbandingan</h4>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Perbandingan Kriteria -->
        <div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4>Perbandingan Kriteria</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="background-color: #9DBEBB;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tes Microteaching</th>
                                <th>Tes Wawancara</th>
                                <th>Tes Akademik</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tes Microteaching -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_ktm.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_kriteria WHERE id_pbk=1");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPbk=$hasilQuery['id_pbk'];
                                    $Tm=$hasilQuery['tm'];
                                    $Tw=$hasilQuery['tw'];
                                    $Ta=$hasilQuery['ta'];
                                    ?>
                                    <td>Tes Microteaching
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tm">
                                            <option value="<?= $Tm; ?>">Now = <?= $Tm; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tw">
                                            <option value="<?= $Tw; ?>">Now = <?= $Tw; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Ta">
                                            <option value="<?= $Ta; ?>">Now = <?= $Ta; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Tes Wawancara -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_ktw.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_kriteria WHERE id_pbk=2");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPbk=$hasilQuery['id_pbk'];
                                    $Tm=$hasilQuery['tm'];
                                    $Tw=$hasilQuery['tw'];
                                    $Ta=$hasilQuery['ta'];
                                    ?>
                                    <td>Tes Wawancara
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tm">
                                            <option value="<?= $Tm; ?>">Now = <?= $Tm; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tw">
                                            <option value="<?= $Tw; ?>">Now = <?= $Tw; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Ta">
                                            <option value="<?= $Ta; ?>">Now = <?= $Ta; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Tes Akademik -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_kta.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_kriteria WHERE id_pbk=3");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPbk=$hasilQuery['id_pbk'];
                                    $Tm=$hasilQuery['tm'];
                                    $Tw=$hasilQuery['tw'];
                                    $Ta=$hasilQuery['ta'];
                                    ?>
                                    <td>Tes Akademik
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tm">
                                            <option value="<?= $Tm; ?>">Now = <?= $Tm; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tw">
                                            <option value="<?= $Tw; ?>">Now = <?= $Tw; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Ta">
                                            <option value="<?= $Ta; ?>">Now = <?= $Ta; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Perbandingan Tes Microteaching -->
        <div>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h4>Perbandingan Tes Microteaching</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="background-color: #9DBEBB;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Kompeten</th>
                                <th>Kurang Kompeten</th>
                                <th>Tidak Kompeten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Kompeten -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_kompetan.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tm WHERE id_pbtm=1");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtm=$hasilQuery['id_pbtm'];
                                    $Kp=$hasilQuery['kompeten'];
                                    $Kr=$hasilQuery['kurang'];
                                    $Tdk=$hasilQuery['tidak'];
                                    ?>
                                    <td>Kompeten
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kp">
                                            <option value="<?= $Kp; ?>">Now = <?= $Kp; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kr">
                                            <option value="<?= $Kr; ?>">Now = <?= $Kr; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tdk">
                                            <option value="<?= $Tdk; ?>">Now = <?= $Tdk; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Kurang Kompeten -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_kurang.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tm WHERE id_pbtm=2");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtm=$hasilQuery['id_pbtm'];
                                    $Kp=$hasilQuery['kompeten'];
                                    $Kr=$hasilQuery['kurang'];
                                    $Tdk=$hasilQuery['tidak'];
                                    ?>
                                    <td>Kurang Kompeten
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kp">
                                            <option value="<?= $Kp; ?>">Now = <?= $Kp; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kr">
                                            <option value="<?= $Kr; ?>">Now = <?= $Kr; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tdk">
                                            <option value="<?= $Tdk; ?>">Now = <?= $Tdk; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Tidak Kompeten -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_tidak.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tm WHERE id_pbtm=3");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtm=$hasilQuery['id_pbtm'];
                                    $Kp=$hasilQuery['kompeten'];
                                    $Kr=$hasilQuery['kurang'];
                                    $Tdk=$hasilQuery['tidak'];
                                    ?>
                                    <td>Tidak Kompeten
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kp">
                                            <option value="<?= $Kp; ?>">Now = <?= $Kp; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kr">
                                            <option value="<?= $Kr; ?>">Now = <?= $Kr; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tdk">
                                            <option value="<?= $Tdk; ?>">Now = <?= $Tdk; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Perbandingan Tes Wawancara -->
        <div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Perbandingan Tes Wawancara</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="background-color: #9DBEBB;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Baik</th>
                                <th>Cukup</th>
                                <th>Kurang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baik -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_baik.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tw WHERE id_pbtw=1");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtw=$hasilQuery['id_pbtw'];
                                    $B=$hasilQuery['baik'];
                                    $C=$hasilQuery['cukup'];
                                    $K=$hasilQuery['kurang'];
                                    ?>
                                    <td>Baik
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Baik">
                                            <option value="<?= $B; ?>">Now = <?= $B; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Cukup">
                                            <option value="<?= $C; ?>">Now = <?= $C; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kurang">
                                            <option value="<?= $K; ?>">Now = <?= $K; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Cukup -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_cukup.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tw WHERE id_pbtw=2");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtw=$hasilQuery['id_pbtw'];
                                    $B=$hasilQuery['baik'];
                                    $C=$hasilQuery['cukup'];
                                    $K=$hasilQuery['kurang'];
                                    ?>
                                    <td>Cukup
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Baik">
                                            <option value="<?= $B; ?>">Now = <?= $B; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Cukup">
                                            <option value="<?= $C; ?>">Now = <?= $C; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kurang">
                                            <option value="<?= $K; ?>">Now = <?= $K; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Kurang -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_kurang_tw.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_tw WHERE id_pbtw=3");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPtw=$hasilQuery['id_pbtw'];
                                    $B=$hasilQuery['baik'];
                                    $C=$hasilQuery['cukup'];
                                    $K=$hasilQuery['kurang'];
                                    ?>
                                    <td>Kurang
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Baik">
                                            <option value="<?= $B; ?>">Now = <?= $B; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Cukup">
                                            <option value="<?= $C; ?>">Now = <?= $C; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Kurang">
                                            <option value="<?= $K; ?>">Now = <?= $K; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- Perbandingan Tes Akademik -->
        <div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h4>Perbandingan Tes Akademik</h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped" style="background-color: #9DBEBB;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tinggi</th>
                                <th>Sedang</th>
                                <th>Rendah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Tinggi -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_tinggi.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_ta WHERE id_pbta=1");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPta=$hasilQuery['id_pbta'];
                                    $T=$hasilQuery['tinggi'];
                                    $S=$hasilQuery['sedang'];
                                    $R=$hasilQuery['rendah'];
                                    ?>
                                    <td>Tinggi
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tinggi">
                                            <option value="<?= $T; ?>">Now = <?= $T; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Sedang">
                                            <option value="<?= $S; ?>">Now = <?= $S; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Rendah">
                                            <option value="<?= $R; ?>">Now = <?= $R; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Sedang -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_sedang.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_ta WHERE id_pbta=2");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPta=$hasilQuery['id_pbta'];
                                    $T=$hasilQuery['tinggi'];
                                    $S=$hasilQuery['sedang'];
                                    $R=$hasilQuery['rendah'];
                                    ?>
                                    <td>Sedang
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tinggi">
                                            <option value="<?= $T; ?>">Now = <?= $T; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Sedang">
                                            <option value="<?= $S; ?>">Now = <?= $S; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Rendah">
                                            <option value="<?= $R; ?>">Now = <?= $R; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <!-- Rendah -->
                            <tr>
                                <form class="form-horizontal" action="../admin/module/perbandingan/edit_rendah.php"
                                    method="POST">
                                    <?php 
                                    $queryEdit=mysqli_query($con,"SELECT * FROM pb_ta WHERE id_pbta=3");
                                    
                                    $hasilQuery=mysqli_fetch_array($queryEdit);
                                    $idPta=$hasilQuery['id_pbta'];
                                    $T=$hasilQuery['tinggi'];
                                    $S=$hasilQuery['sedang'];
                                    $R=$hasilQuery['rendah'];
                                    ?>
                                    <td>Rendah
                                        <div class="box-body">
                                    </td>
                                    <td>
                                        <select class="form-control" name="Tinggi">
                                            <option value="<?= $T; ?>">Now = <?= $T; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Sedang">
                                            <option value="<?= $S; ?>">Now = <?= $S; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="Rendah">
                                            <option value="<?= $R; ?>">Now = <?= $R; ?></option>
                                            <?php 
												$kueri=mysqli_query($con,"SELECT * FROM kepentingan");
												while ($kat=mysqli_fetch_array($kueri)) {
                                                ?>
                                            <option value="<?= $kat['intensitas']; ?>">
                                                <?php echo $kat['intensitas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="btn">
                                            <button type="submit" class="btn-sm btn-warning pull-right">Simpan</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
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