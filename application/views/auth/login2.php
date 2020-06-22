<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V20</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/Login_v20/') ?> images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/Login_v20/') ?>css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-b-160 p-t-50">
                <span class="login100-form-title p-b-43">
                    Account Login
                </span>


                <form class="login100-form" method="post" action="<?= base_url(); ?>">

                    <div class="wrap-input100 rs1">
                        <input type="text" class="form-control form-control-user input100" id="username" name="username" value="<?= set_value('Username'); ?>">
                        <span class="label-input100">Username</span>
                    </div>

                    <div class="wrap-input100 rs2">
                        <input type="password" class="form-control form-control-user input100" id="pwd" name="pwd">
                        <span class="label-input100">Password</span>
                        <?= form_error('pwd') ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>


                <div class="text-center w-full p-t-23">
                    <button type="button" class="txt1" data-toggle="modal" data-target="#exampleModal">
                        README!
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ID Testing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Password</th>
                                <th scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>ukmif</td>
                                <td>1234</td>
                                <td>UKM</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>kms</td>
                                <td>1234</td>
                                <td>Kemahasiswaan</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>kpif</td>
                                <td>1234</td>
                                <td>Kaprodi</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>lm</td>
                                <td>1234</td>
                                <td>Layanan Mahasiswa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/Login_v20/') ?>js/main.js"></script>

</body>

</html>