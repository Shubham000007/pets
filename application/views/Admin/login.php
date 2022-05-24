<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dogs & Mogs | Log in</title>
    <!-- favicon  -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/theme.min.css">

    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
        var csrf_test_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>admin"><b>Dogs</b> & Mogs</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <?php
                $attr = array('id' => 'authenticate_form');
                echo form_open_multipart('Admin/authorize_user', $attr);
                ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block" id="login_button">Sign In</button>
                    </div>
                </div>
                <?php echo form_close(); ?>

                <div class="alert alert-danger alert-dismissible fade show d-none mt-3" role="alert">
                    <strong></strong>
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/dist/js/login.js"></script>
</body>

</html>