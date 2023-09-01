        <?= $this->extend('layout/mainlayout') ?>
        <?= $this->section('content') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Ubah Instansi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('instansi') ?>">Instansi</a></li>
                                <li class="breadcrumb-item active">Ubah Instansi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <?php
                            $inputs = session()->getFlashdata('inputs');
                            $errors = session()->getFlashdata('errors');
                            $error = session()->getFlashdata('error');
                            $success = session()->getFlashdata('success');
                            if(!empty($errors)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                <?php foreach ($errors as $errors) : ?>
                                    <li><?= esc($errors) ?></li>
                                <?php endforeach ?>
                                </ul>
                            </div>
                            <?php
                            } 
                            if(!empty($error)){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?= esc($error) ?><br />
                            </div>
                            <?php } 
                            if(!empty($success)){?>
                            <div class="alert alert-success" role="alert">
                                <?= esc($success) ?><br />
                            </div>
                            <?php } ?>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Ubah Instansi</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nama_instansi">Instansi</label>
                                                    <input type="text" class="form-control" name="nama_instansi" value="<?php if(isset($inputs['nama_instansi'])){ echo $inputs['nama_instansi']; }else{ echo $instansi['nama_instansi']; } ?>" placeholder="Masukkan Instansi">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="deskripsi_instansi">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi_instansi" placeholder="Masukkan Deskripsi"><?php if(isset($inputs['deskripsi_instansi'])){ echo $inputs['deskripsi_instansi']; }else{ echo $instansi['deskripsi_instansi']; } ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="<?= base_url('users') ?>" class="btn btn-default">Kembali</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->endSection() ?>
        