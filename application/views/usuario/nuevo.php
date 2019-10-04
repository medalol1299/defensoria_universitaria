<header class="content__title">
    <h1>Usuarios</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nuevo Usuario</h4>
        <div class="row">
            <?php
            if (isset($registro)) {
                foreach ($registro as $key => $fila) {
                    $id = $fila->idusuario;
                    $usuario = $fila->usuario;
                    $clave = $fila->clave;
                    $nombre = $fila->nombre;
                    $apellido = $fila->apellido;
                    $grado = $fila->grado;
                    $cargo = $fila->cargo;
                }
            }
            ?>
            <form method="POST" action="<?= base_url() ?>usuario/<?= isset($id) ? 'modificar' : 'agregar' ?>" class="col-sm-6">
                <div class="input-group mb-3">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" >
                    <div class="input-group-prepend">
                        <span class="input-group-text">Usuario</span>
                    </div>
                    <input type="text" class="form-control" name="usuario" value="<?= isset($id) ? $usuario : '' ?>" placeholder="Escribe un usuario...">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Contraseña</span>
                    </div>
                    <input type="password" class="form-control" name="clave" value="<?= isset($id) ? $clave : '' ?>" placeholder="Escribe una clave...">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombres</span>
                    </div>
                    <input type="text" class="form-control" name="nombre" value="<?= isset($id) ? $nombre : '' ?>" placeholder="Nombre Completo">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Apellidos</span>
                    </div>
                    <input type="text" class="form-control" name="apellido" value="<?= isset($id) ? $apellido : '' ?>" placeholder="Apellidos">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cargo</span>
                    </div>
                    <input type="text" class="form-control" name="cargo" value="<?= isset($id) ? $cargo : '' ?>" placeholder="Ej. Secretario(a)">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Grado</span>
                    </div>
                    <select class="form-control" name="grado">
                        <option>[Seleccione Tipo de Documento]</option>
                        <option value="Ing." <?= isset($grado) ? (($grado=='Ing.') ? 'SELECTED' : '') : '' ?>>Ing.</option>
                        <option value="Doc." <?= isset($grado) ? (($grado=='Doc.') ? 'SELECTED' : '') : '' ?>>Doc.</option>
                        <option value="Lic." <?= isset($grado) ? (($grado=='Lic.') ? 'SELECTED' : '') : '' ?>>Lic.</option>
                        <option value="Est." <?= isset($grado) ? (($grado=='Est.') ? 'SELECTED' : '') : '' ?>>Est.</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>

        </div>
    </div>
</div>