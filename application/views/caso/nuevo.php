<header class="content__title">
    <h1>Casos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nuevo Caso</h4>
        <div class="row">
            <?php
            if (isset($registro)) {
                foreach ($registro as $fila) {
                    $id = $fila->idcaso;
                    $nombre = $fila->caso;
                    $descripcion = $fila->descripcion;
                }
            }
            ?>
            <form method="POST" action="<?= base_url() ?>caso/<?= isset($id) ? 'modificar' : 'agregar' ?>" class="col-sm-12">
                <?php if(isset($id)){ ?>
                <input type="hidden" value="<?=$id?>" name="id">
                <?php } ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre del Caso</span>
                    </div>
                    <input type="text" class="form-control" value="<?= isset($id) ? $nombre : '' ?>" name="caso" >
                    <i class="form-group__bar"></i>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Asunto</span>
                    </div>
                    <input type="text" class="form-control" value="<?= isset($id) ? $descripcion : '' ?>" name="descripcion" >
                    <i class="form-group__bar"></i>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</div>