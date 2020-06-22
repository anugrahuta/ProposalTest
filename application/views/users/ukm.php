<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= 'Proposal' ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?> vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Proposal</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/logout') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'] ?></span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- TABEL -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4 pl-0">
                                <?= form_error('namaProp', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                                <?= form_error('peserta', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                                <?= form_error('tanggal', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                                <?= $this->session->flashdata('message') ?>
                            </div>
                            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">Tambah Proposal Baru</a>
                            <table class="table table-hover table-bordered table-striped" id="example">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Proposal</th>
                                        <th scope="col">Status KMS</th>
                                        <th scope="col">Status Kaprodi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($proposal as $t) : ?>
                                        <tr>
                                            <td><?= $t['nama_proposal']; ?></td>
                                            <td><?= $t['approval_kms']; ?></td>
                                            <td><?= $t['approval_kaprodi']; ?></td>
                                            <td>
                                                <a href="<?= base_url('user/download_propUkm') ?>/<?= $t['file_proposal'] ?>" class="btn btn-info" role="button">Cek Proposal</a>
                                                <a href="<?= base_url('user/download_izinUkm') ?>/<?= $t['file_izin'] ?>" class="btn btn-info" role="button">Cek Surat Izin</a>
                                                <a href="<?= base_url('user/delete') ?>/<?= $t['id_proposal'] ?>" class="btn btn-danger" role="button" onclick="return confirm('Anda yakin?')">Delete</a>
                                                <a href="<?= base_url('user/izin') ?>/<?= $t['id_proposal'] ?>" class="btn btn-primary" role="button">Buat Surat Izin</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- FORM Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Buat Proposal Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('user/addProposal') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control mb-2" id="username" name="username" placeholder="username" value="<?= $user['username'] ?>">
                        <input type="text" class="form-control mb-2" id="namaProposal" name="namaProp" placeholder="Nama Proposal">
                        <input type="date" class="form-control mb-2" id="tanggal" name="tanggal">
                        <input type="file" class="form-control mb-2" id="fileProp" name="fileProp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>