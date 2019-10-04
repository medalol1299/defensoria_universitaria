<?php
if($this->session->userdata('perfil')!='A'){
    header('Location: '.base_url().'home');
}
?>
<header class="content__title">
    <h1>Usuarios</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Listado de Usuarios</h4>
        <a href="<?= base_url() ?>usuario/nuevo">
            <button class="btn btn-outline-primary btn--icon-text"><i class="zmdi zmdi-plus"></i> Nuevo Registro</button>
        </a>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $key => $fila) { ?>
                        <tr>
                            <th><?= $key + 1 ?></th>
                            <td><?= $fila->usuario ?></td>
                            <td><?= $fila->clave ?></td>
                            <td><?= $fila->nombre ?></td>
                            <td><?= $fila->apellido ?></td>
                            <td>
                                <a href="<?= base_url() ?>usuario/editar/<?= $fila->idusuario ?>">
                                    <button class="btn btn-outline-info btn--icon-text">
                                        <i class="zmdi zmdi-edit"></i> Editar
                                    </button>
                                </a>
                                <a href="<?= base_url() ?>usuario/borrar/<?= $fila->idusuario ?>">
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
