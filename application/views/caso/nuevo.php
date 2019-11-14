<header class="content__title">
    <h1>Casos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nuevo Caso</h4>
        <div class="row">
            <?php
            foreach ($registro as $fila){
                $id=$fila->idcaso;
                $nombre=$fila->nombre;
                $asunto=$fila->asunto;
            }
            ?>
            <form method="POST" action="<?= base_url() ?>caso/agregar" class="col-sm-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre del Caso</span>
                    </div>
                    <input type="text" class="form-control" value="<?=  isset($id) ? $nombre : '' ?>" name="nombre" >
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Asunto</span>
                    </div>
                    <input type="text" class="form-control" value="<?=  isset($id) ? $asunto : '' ?>" name="asunto" >
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <select class="select2" multiple data-placeholder=" Documentos Emitidos (una o más opciones)" name="doc_emitidos[]">
                        <?php foreach ($doc_emitido as $row) { ?>
                            <option value="<?= $row->iddoc_emitido ?>" ><?= $row->codigo ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="select2" multiple data-placeholder=" Documentos Recibidos (una o más opciones)" name="doc_recibidos[]">
                        <?php foreach ($doc_recibido as $row) { ?>
                            <option value="<?= $row->iddoc_recibido ?>"><?= $row->codigo ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</div>