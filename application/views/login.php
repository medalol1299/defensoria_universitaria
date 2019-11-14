<?php
if ($this->session->userdata('nombre')) {
    header('Location: ' . base_url() . 'home');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    ¡Hola! Ingrese sesión

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="#">Recuperar Cuenta</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p style="color:red;"><?= isset($mensaje) ? $mensaje : '' ?></p>
                    <form action="<?= base_url() ?>login/validar" method="POST">
                        <div class="form-group form-group--float form-group--centered">
                            <input type="text" name="usuario" class="form-control">
                            <label>Usuario</label>
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group form-group--float form-group--centered">
                            <input type="password" name="clave" class="form-control">
                            <label>Contraseña</label>
                            <i class="form-group__bar"></i>
                        </div>

                        <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>


            <!-- Forgot Password -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header palette-Purple bg">
                    <i class="zmdi zmdi-account-circle"></i>
                    Recuperar Contraseña

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-login" href="login.html">¿Ya tienes una cuenta?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <p class="mt-4">Ingrese su usuario para recuperar su contraseña</p>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" class="form-control">
                        <label>Usuario</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <button href="#" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-check"></i></button>
                </div>
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if IE]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                <div class="ie-warning__downloads">
                    <a href="http://www.google.com/chrome">
                        <img src="img/browsers/chrome.png" alt="">
                    </a>

                    <a href="https://www.mozilla.org/en-US/firefox/new">
                        <img src="img/browsers/firefox.png" alt="">
                    </a>

                    <a href="http://www.opera.com">
                        <img src="img/browsers/opera.png" alt="">
                    </a>

                    <a href="https://support.apple.com/downloads/safari">
                        <img src="img/browsers/safari.png" alt="">
                    </a>

                    <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                        <img src="img/browsers/edge.png" alt="">
                    </a>

                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="img/browsers/ie.png" alt="">
                    </a>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="<?= base_url() ?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="<?= base_url() ?>public/js/app.min.js"></script>
    </body>
</html>