<header class="content__title">
    <h1>Documentos Recibidos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Registro de Documentos Recibidos</h4>
        <a href="<?= base_url() ?>doc_recibido/nuevo">
            <button class="btn btn-outline-primary btn--icon-text"><i class="zmdi zmdi-plus"></i> Nuevo Registro</button>
        </a>
        <div style="color: green">
            <?= isset($error) ? $error : '' ?>
        </div>
        <br><br>
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th></th>
                        <th>N°Doc.</th>
                        <th>Tipos de Doc.</th>
                        <th>Fecha R.</th>
                        <th>Remitente</th>
                        <th>Asunto</th>
                        <th>Observaciones</th>
                        <th>Caso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $key => $fila) { ?>
                        <tr>
                            <th><?= $key + 1 ?></th>
                            <td><?= $fila->codigo ?></td>
                            <td><?= $fila->tipo_documento ?></td>
                            <td><?= $fila->fecha_ingreso ?></td>
                            <td><?= $fila->remitente ?></td>
                            <td><?= $fila->asunto ?></td>
                            <td><?= $fila->observaciones ?></td>
                            <td><?= $fila->nombre ?></td>
                            <td>
                                <?php if (is_null($fila->archivo)) { ?>
                                    <a href="<?= base_url() ?>doc_recibido/subir_archivo/<?= $fila->iddoc_recibido ?>">
                                        <button class="btn btn-outline-success btn--icon-text">
                                            <i class="zmdi zmdi-download"></i> Subir Archivo
                                        </button>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url() ?>doc_recibido/descargar/<?= $fila->archivo ?>">
                                        <button class="btn btn-outline-success btn--icon-text">
                                            <i class="zmdi zmdi-download"></i> Descargar
                                        </button>
                                    </a>
                                <?php } ?>
                                <a href="<?= base_url() ?>doc_recibido/editar/<?= $fila->iddoc_recibido ?>">
                                    <button class="btn btn-outline-info btn--icon-text">
                                        <i class="zmdi zmdi-edit"></i> Editar
                                    </button>
                                </a>
                                <a href="<?= base_url() ?>doc_recibido/borrar/<?= $fila->iddoc_recibido ?>">
                                    <button class="btn btn-outline-danger btn--icon-text">
                                        <i class="zmdi zmdi-delete"></i> Eliminar
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>