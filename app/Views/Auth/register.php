<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Circl - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/main.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="login-page">
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 col-lg-4">
                <div class="card login-box-container">
                    <div class="card-body">
                        <div class="authent-logo">
                            <img src="/tema/admin/circladmin-10/circl/theme/assets/images/logo@2x.png" alt="">
                        </div>
                        <div class="authent-text">
                            <p>Welcome to IO!</p>
                            <h2 class="card-header"><?= lang('Auth.register') ?></h2>

                        </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= route_to('register') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="floatingInput" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                    <label for="floatingInput"><?= lang('Auth.email') ?></label>
                                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="floatingInput1" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    <label for="floatingInput"><?= lang('Auth.username') ?></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="floatingPassword" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <label for="floatingPassword"><?= lang('Auth.password') ?></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="floatingPassword1" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <label for="floatingPassword"><?= lang('Auth.repeatPassword') ?></label>
                                </div>
                            </div>
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree the <a href="#">Terms and Conditions</a></label>
                            </div> -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary m-b-xs"><?= lang('Auth.register') ?></button>
                            </div>
                        </form>
                        <div class="authent-login">
                            <p>Already have an account? <a href="<?= route_to('login') ?>">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Javascripts -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/feather.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/main.min.js"></script>
</body>

</html>