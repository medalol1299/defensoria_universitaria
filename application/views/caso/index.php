<header class="content__title">
    <h1>Casos Presentados</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Registro de Casos</h4>
        <a href="<?= base_url() ?>caso/nuevo">
            <button class="btn btn-outline-primary btn--icon-text"><i class="zmdi zmdi-plus"></i> Nuevo Registro</button>
        </a>
        <br><br>
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th></th>
                        <th>CASO</th>
                        <th>ASUNTO</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $key => $fila) { ?>
                        <tr>
                            <th><?= $key + 1 ?></th>
                            <td><?= $fila->nombre ?></td>
                            <td><?= $fila->asunto ?></td>
                            <td>
                                <a href="<?= base_url() ?>caso/editar/<?= $fila->idcaso ?>">
                                    <button class="btn btn-outline-info btn--icon-text">
                                        <i class="zmdi zmdi-edit"></i> Editar
                                    </button>
                                </a>
                                <a href="<?= base_url() ?>caso/borrar/<?= $fila->idcaso ?>">
                                    <button class="btn btn-outline-danger btn--icon-text" id="pregunta">
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
