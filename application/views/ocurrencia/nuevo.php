<header class="content__title">
    <h1>Ocurrencias</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nuevo Ocurrencia</h4>
        <div class="row">
            <?php
            if (isset($registro)) {
                foreach ($registro as $key => $fila) {
                    $id = $fila->idocurrencia;
                    $ocurrencia = $fila->ocurrencia;
                    $fecha = $fila->fecha;
                }
            }
            ?>
            <form method="POST" action="<?= base_url() ?>ocurrencia/<?= isset($id) ? 'modificar' : 'agregar' ?>" class="col-sm-12">
                <div class="input-group mb-3">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>" >
                    <div class="input-group-prepend">
                        <span class="input-group-text">Fecha</span>
                    </div>
                    <input type="text" class="form-control datetime-picker" name="fecha" value="<?= isset($id) ? $fecha : '' ?>" placeholder="Fecha y Hora de la Ocurrencia">
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ocurrencia</span>
                    </div>
                    <input type="text" class="form-control" name="ocurrencia" value="<?= isset($id) ? $ocurrencia : '' ?>" placeholder="Descripción de la Ocurrencia">
                    <i class="form-group__bar"></i>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>

        </div>
    </div>
</div>

