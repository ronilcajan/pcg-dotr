<!DOCTYPE html>
<html lang="en">
<?php
$sql = $this->db->query("SELECT * FROM `system` WHERE id=1");
$ss = $sql->row();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= $ss->system_logo ? site_url('assets/uploads/').$ss->system_logo : base_url('assets/img/logo.png') ?>">
    <title><?= $page_title;  ?> | <?= $ss->system_name ? $ss->system_name : 'eTanaw Monitoring System' ?></title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="<?= site_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="<?= site_url() ?>assets/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="<?= site_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="<?= site_url() ?>assets/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <style>
    .login-register {
        background: #4F5467 !important;
    }

    .login-box {
        background: #192135 !important;
        margin-top: 5%;
    }

    .login-box .white-box {
        background-color: #202940;
        box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%);
        border: 1px solid #202940;
    }

    .g-recaptcha div {
        width: 100% !important;
        text-align: center !important;
    }

    @media (max-width:480px) {
        .login-register {
            background: #4F5467 !important;
        }

        .login-box {
            background: #192135 !important;
            margin-top: 5%;
        }

        html {
            background: #4F5467 !important;
        }
    }

    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -27px;
        margin-right: 5px;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }
    </style>
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" action="<?= site_url('user_login') ?>" method="POST">
                    <div class="text-center">
                        <img src="<?= $ss->system_logo ? site_url('assets/uploads/').$ss->system_logo : base_url('assets/img/logo.png') ?>"
                            class="img-fluid rounded-circle my-3" width="200px" alt="profile">
                        <h3 class="box-title m-b-20 text-white">Sign In</h3>
                    </div>
                    <?php
							$error_flashData = $this->session->flashdata('error_flashData');  
							if ($error_flashData !== NULL) {
									echo '<div class="alert alert-danger text-center">'.$error_flashData.'</div>';
							} 
						?>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input
                                class="form-control text-white <?= (form_error('username') == "" ? '':'is-invalid') ?>"
                                type="text" required="" name="username" placeholder="Username"
                                value="<?= set_value('username'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input
                                class="form-control  text-white <?= (form_error('password') == "" ? '':'is-invalid') ?>"
                                id="password" name="password" type="password" required="" placeholder="Password">
                            <span toggle="#password" class="fa fa-fw field-icon toggle-password fa-eye"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="<?= $site_key ?>"></div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-b-40 m-t-40">
                        <div class="col-sm-12 text-center">
                            <p>Powered by: <a href="javascript:void(0)"
                                    class="text-white m-l-5"><b><?= $ss->system_name ? $ss->system_name : 'eTanaw Monitoring System' ?></b></a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?= site_url() ?>assets/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= site_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= site_url() ?>assets/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <!-- <script src="<?= site_url() ?>assets/js/jquery.slimscroll.js"></script> -->
    <!--Wave Effects -->
    <!-- <script src="<?= site_url() ?>assets/js/waves.js"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="<?= site_url() ?>assets/js/custom.js"></script>
    <!--Style Switcher -->
    <!-- <script src="<?= site_url() ?>assets/plugins/components/styleswitcher/jQuery.style.switcher.js"></script> -->
    <script>
    // show password when toggle
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));

        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    </script>
</body>

</html>