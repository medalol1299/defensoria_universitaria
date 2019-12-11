                <footer class="footer hidden-xs-down">
                    <p>© Defensoría Universitaria. Todos los derechos reservados.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="<?=  base_url()?>home">Inicio</a>

                        <a class="nav-link" href="<?=  base_url()?>ocurrencia">Ocurrencias</a>

                        <a class="nav-link" href="<?=  base_url()?>actividad">Actividades</a>

                        <a class="nav-link" href="<?=  base_url()?>doc_emitido">Doc. Emitidos</a>

                        <a class="nav-link" href="<?=  base_url()?>doc_recibido">Doc. Recibidos</a>
                    </ul>
                </footer>
            </section>
        </main>
        <script src="<?=base_url()?>public/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>
        
        <script src="<?=base_url()?>public/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/nouislider/distribute/nouislider.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>
        <script src="<?=base_url()?>public/vendors/flatpickr/flatpickr.min.js"></script>
        
        <!-- Calendario -->
        <script src="<?=base_url()?>public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/sweetalert2/dist/sweetalert2.min.js"></script>
        
        <!-- Vendors: Data tables -->
        <script src="<?=base_url()?>public/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/jszip/dist/jszip.min.js"></script>
        <script src="<?=base_url()?>public/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>

        <!-- App functions and actions -->
        <script src="<?=base_url()?>public/js/app.min.js"></script>
        
        <!-- Calendar Script -->
        <?php if($this->uri->segment(1)=='actividad'){ ?>
        <script src="<?=base_url()?>public/js/calendario.js"></script>
        <?php } ?>
        <script src="<?=base_url()?>public/js/eliminar_registro.js"></script>
    </body>
</html>
