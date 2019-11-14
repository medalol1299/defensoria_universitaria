<header class="content__title">
    <h1>Documentos Emitidos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Subir Documento Recibido</h4>
        <div class="row">
            <?php
            if (isset($registro)) {
                foreach ($registro as $fila) {
                    $codigo = $fila->codigo;
                }
            }
            ?>

            <form enctype="multipart/form-data" method="POST" action="<?= base_url() ?>doc_recibido/guardar_archivo/<?=$id?> ?>" class="col-sm-12">
                <div class="input-group mb-3">
                    <input type="hidden" value="<?=$codigo?>" name="codigo">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir Archivo</span>
                    </div>
                    <input type="file" class="form-control" name="archivo" >
                    <i class="form-group__bar"></i>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</div>