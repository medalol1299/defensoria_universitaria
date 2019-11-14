<header class="content__title">
    <h1>Documentos Emitidos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Editar Documento Emitido</h4>
        <div class="row">
            <?php
            $idtipo_documento = '';
            if (isset($registro)) {
                foreach ($registro as $fila) {
                    $id = $fila->iddoc_emitido;
                    $tipo_documento = $fila->tipo_documento;
                    $idtipo_documento = $fila->idtipo_documento;
                    $codigo = $fila->codigo;
                    $fecha = $fila->fecha_emision;
                    $destinatario = $fila->destinatario;
                    $asunto = $fila->asunto;
                    $observaciones = $fila->observaciones;
                    $archivo = $fila->archivo;
                }
            }
            ?>

            <form enctype="multipart/form-data" method="POST" action="<?= base_url() ?>doc_emitido/<?= isset($id) ? 'modificar' : 'agregar' ?>" class="col-sm-12">
                <div style="color: red">
                    <?= isset($error) ? $error : '' ?>
                </div>
                <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" >
                <input type="hidden" name="archivo_e" value="<?= isset($id) ? $archivo : '' ?>" >
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">N°Documento</span>
                    </div>
                    <input type="text" class="form-control" name="codigo" value="<?= isset($id) ? $codigo : '' ?>" placeholder="  N°0000" disabled="">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tipo de Documento</span>
                    </div>
                    <select class="form-control" name="idtipo_documento" required>
                        <option>[Seleccione Tipo de Documento]</option>
                        <?php foreach ($tipo_documentos as $row) { ?>
                            <option value="<?= $row->idtipo_documento ?>" <?= (($row->idtipo_documento) == $idtipo_documento) ? 'SELECTED' : '' ?>><?= $row->tipo_documento ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha Emisión</span>
                    </div>
                    <input type="text" name="fecha" value="<?= isset($id) ? $fecha : '' ?>"class="form-control date-picker" placeholder="Selecione la Fecha" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Destinatario</span>
                    </div>
                    <input type="text" class="form-control" name="destinatario" value="<?= isset($id) ? $destinatario : '' ?>" placeholder="  Persona Dirigida" required>
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Asunto</span>
                    </div>
                    <input type="text" class="form-control" name="asunto" value="<?= isset($id) ? $asunto : '' ?>" placeholder="  Asunto" required>
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Observaciones</span>
                    </div>
                    <input type="text" class="form-control" name="observaciones" value="<?= isset($id) ? $observaciones : '' ?>" placeholder="  Observaciones">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
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
