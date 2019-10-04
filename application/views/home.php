<?php
if(!$this->session->userdata('nombre')){
    header('Location: '.base_url());
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
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/app.min.css">
    </head>

    <body data-ma-theme="green">
        <main class="main main--alt">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="header__logo">
                    <img src="<?=  base_url()?>public/demo/img/logo.png">
                </div>

                <div class="search">
                    <ul class="top-menu">
                        <li class="active"><a href="<?=  base_url()?>home">Inicio</a></li>
                        <li><a href="<?=  base_url()?>actividad">Actividades</a></li>
                        <li><a href="<?=  base_url()?>ocurrencia">Ocurrencias</a></li>
                        <li><a href="<?=  base_url()?>doc_emitido">Documentos Emitidos</a></li>
                        <li><a href="<?=  base_url()?>doc_recibido">Documentos Recibidos</a></li>
                        <?php 
                        if($this->session->userdata('perfil')=='A'){ ?>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">Mantenimiento</a>
                            <div class="dropdown-menu">
                                <a href="<?=  base_url()?>tipo_documento" class="dropdown-item">Tipos de Documentos</a>
                                <a href="<?=  base_url()?>usuario" class="dropdown-item">Usuarios</a>
                                <a href="#" class="dropdown-item">Carrusel</a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <ul class="top-nav">                  

                    <li class="dropdown hidden-xs-down">
                        <a href="top-navigation.html" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">

                            <a href="#" class="dropdown-item">Ver Perfil</a>
                            <a href="<?=  base_url()?>login/cerrar" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </li>


                </ul>


            </header>

            <section class="content content--full">
                <div class="content__inner">
                    <div id="carouselExampleCaption" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaption" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaption" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaption" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img style="height: 520px; width: 100%" src="<?= base_url() ?>public/demo/img/carousel/1.png" alt="First slide">
                                <div class="carousel-caption">
                                    <h3>UNIVERSIDAD NACIONAL DE SAN MARTÍN</h3>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img style="height: 520px; width: 100%" src="<?= base_url() ?>public/demo/img/carousel/2.png" alt="Second slide">
                                <div class="carousel-caption">
                                    <h3>Second slide label</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img style="height: 520px; width: 100%;" src="<?= base_url() ?>public/demo/img/carousel/3.jpg" alt="Third slide">
                                <div class="carousel-caption">
                                    <h3>Defensoría Universitaria</h3>
                                    <p>Defensoría Universitaria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer hidden-xs-down">
                    <p>© Material Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="top-navigation.html">Homepage</a>

                        <a class="nav-link" href="top-navigation.html">Company</a>

                        <a class="nav-link" href="top-navigation.html">Support</a>

                        <a class="nav-link" href="top-navigation.html">News</a>

                        <a class="nav-link" href="top-navigation.html">Contacts</a>
                    </ul>
                </footer>
                </div>
            </section>
        </main>

        <!-- Javascript -->
        <!-- ../vendors -->
        <script src="<?= base_url() ?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <script src="<?= base_url() ?>public/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?= base_url() ?>public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

        <!-- Charts and maps-->
        <script src="<?= base_url() ?>public/demo/js/flot-charts/curved-line.js"></script>
        <script src="<?= base_url() ?>public/demo/js/flot-charts/dynamic.js"></script>
        <script src="<?= base_url() ?>public/demo/js/flot-charts/line.js"></script>
        <script src="<?= base_url() ?>public/demo/js/flot-charts/chart-tooltips.js"></script>
        <script src="<?= base_url() ?>public/demo/js/other-charts.js"></script>
        <script src="<?= base_url() ?>public/demo/js/jqvmap.js"></script>

        <!-- App functions and actions -->
        <script src="<?= base_url() ?>public/js/app.min.js"></script>
    </body>
</html>