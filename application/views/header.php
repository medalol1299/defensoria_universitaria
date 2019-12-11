<?php
if (!$this->session->userdata('nombre')) {
    header('Location: ' . base_url());
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/dropzone/dist/dropzone.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/nouislider/distribute/nouislider.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/flatpickr/flatpickr.min.css" />

        <!-- Calendario-->
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/sweetalert2/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>public/css/app.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>public/demo/css/demo.css">
        
        <script>
            var base_url='<?=base_url()?>';
        </script>
    </head>

    <body data-ma-theme="green">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                    <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1>
                        <a href="<?= base_url() ?>home">
                            <img style="height: 70px" src="<?= base_url() ?>public/img/logo.png">
                            DEFENSORÍA UNIVERSITARIA UNSM-T
                        </a>
                    </h1>
                </div>

                <ul class="top-nav">                    
                    <li class="dropdown hidden-xs-down">
                        <a href="html-table.html" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item">Actualizar Datos</a>
                            <a href="<?= base_url() ?>login/cerrar" class="dropdown-item">Cerrar Seción</a>
                        </div>
                    </li>
                </ul>
            </header>

            <aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="<?= base_url() ?>public/demo/img/profile-pics/2.jpg" alt="">
                            <div>
                                <div class="user__name"><?= $this->session->userdata('grado') . ' ' . $this->session->userdata('nombre') ?></div>
                                <div class="user__email"><?= $this->session->userdata('cargo') ?></div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">View Profile</a>
                            <a class="dropdown-item" href="<?= base_url() ?>login/cerrar">Cerrar Seción</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li><a href="<?= base_url() ?>home"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-collection-text"></i> Documentos</a>
                            <ul>
                                <li><a href="<?= base_url() ?>doc_emitido">Doc. Emitidos</a></li>
                                <li><a href="<?= base_url() ?>doc_recibido">Doc. Recibidos</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= base_url() ?>caso"><i class="zmdi zmdi-folder-person"></i> Casos</a></li>
                        <li><a href="<?= base_url() ?>ocurrencia"><i class="zmdi zmdi-folder-outline"></i> Ocurrencias</a></li>
                        <li><a href="<?= base_url() ?>actividad"><i class="zmdi zmdi-calendar-note"></i> Actividades</a></li>

                        <li class="navigation__sub">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Mantenimiento</a>
                            <ul>
                                <li><a href="<?= base_url() ?>tipo_documento">Tipo de Documento</a></li>
                                <?php if ($this->session->userdata('perfil') == 'A') { ?>
                                    <li><a href="<?= base_url() ?>usuario">Usuarios</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>
            <section class="content">

