<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Tambah Alternatif</small>
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
                    <h3 class="box-title">Isi Form dengan Lengkap</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>

                <div class="box-body">
                    <form class="form-horizontal" action="../admin/module/alternatif/aksi_simpan_a.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Nim" name="Nim" placeholder="Nim"
                                        required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama"
                                        required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nilai Tes Microteaching</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="Ntm">
                                        <option> - Pilih - </option>
                                        <?php 
												include"../lib/koneksi.php";
												$kueriKategori=mysqli_query($con,"SELECT * FROM kriteria WHERE kriteria='Tes Microteaching'");
												while ($kat=mysqli_fetch_array($kueriKategori)) {
                                                ?>
                                        <option value="<?= $kat['nilai']; ?>">
                                            <?php echo $kat['nilai']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nilai Tes Wawancara</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="Ntw">
                                        <option> - Pilih - </option>
                                        <?php 
												include"../lib/koneksi.php";
												$kueriKategori=mysqli_query($con,"SELECT * FROM kriteria WHERE kriteria='Tes Wawancara'");
												while ($kat=mysqli_fetch_array($kueriKategori)) {
                                                ?>
                                        <option value="<?= $kat['nilai']; ?>">
                                            <?php echo $kat['nilai']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nilai Tes Akademik</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="Nta">
                                        <option> - Pilih - </option>
                                        <?php 
												include"../lib/koneksi.php";
												$kueriKategori=mysqli_query($con,"SELECT * FROM kriteria WHERE kriteria='Tes Akademik'");
												while ($kat=mysqli_fetch_array($kueriKategori)) {
                                                ?>
                                        <option value="<?= $kat['nilai']; ?>">
                                            <?php echo $kat['nilai']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                        </div><!-- /.box-body-->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull right">Simpan</button>
                        </div><!-- /.box-footer-->
                    </form>
                </div>

            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->