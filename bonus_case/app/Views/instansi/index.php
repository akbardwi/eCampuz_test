        <?= $this->extend('layout/mainlayout') ?>
        <?= $this->section('content') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Instansi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Instansi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Instansi</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tblInstansi" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($instansi as $key => $instansi): ?>
                                            <tr>
                                                <td><?= $key+1 ?></td>
                                                <td><?= $instansi['nama_instansi'] ?></td>
                                                <td><?= $instansi['deskripsi_instansi'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('instansi/'.$instansi['id_instansi'])."/ubah" ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="<?= base_url('instansi/'.$instansi['id_instansi'])."/hapus" ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->endSection() ?>
        <?= $this->section('js') ?>
        <script>
            $(function () {
                $("#tblInstansi").DataTable({
                    "responsive": true, 
                    "lengthChange": false, 
                    "autoWidth": false,
                    "buttons": [
                        "copy", 
                        "csv", 
                        "excel", 
                        "pdf", 
                        "print",
                        {
                            text: 'Tambah Instansi',
                            className: 'btn btn-primary',
                            action: function ( e, dt, node, config ) {
                                window.location.href = '<?= base_url('instansi/tambah') ?>';
                            }
                        }
                    ],
                    "language": {
                        "emptyTable": "Tidak ada data",
                        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                        "infoFiltered": "(difilter dari _MAX_ total data)",
                        "lengthMenu": "Tampilkan _MENU_ data",
                        "loadingRecords": "Memuat...",
                        "processing": "Memproses...",
                        "search": "Cari:",
                        "zeroRecords": "Pencarian tidak ditemukan",
                        "paginate": {
                            "first": "Awal",
                            "last": "Akhir",
                            "next": "Selanjutnya",
                            "previous": "Sebelumnya"
                        },
                        "aria": {
                            "sortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                            "sortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                        }
                    }
                    
                }).buttons().container().appendTo('#tblInstansi_wrapper .col-md-6:eq(0)');
            });
        </script>
        <?= $this->endSection() ?>
        