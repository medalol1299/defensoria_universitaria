<header class="content__title">
    <h1>Tipo de Documentos</h1>

</header>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Nuevo Tipo de Documento</h4>
        <div class="row">
            <?php
            if (isset($registro)) {
                foreach ($registro as $key => $fila) {
                    $id=$fila->idtipo_documento;
                    $tipo_documento=$fila->tipo_documento;
                }
            }
            ?>
            <form method="POST" action="<?=  base_url()?>tipo_documento/<?= isset($id) ? 'modificar' : 'agregar' ?>" class="col-sm-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tipo de Documento</span>
                    </div>
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : ''?>" >
                    <input type="text" class="form-control" name="tipo_documento" value="<?= isset($tipo_documento) ? $tipo_documento : ''?>" placeholder="Ej. Carta">
                    <i class="form-group__bar"></i>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>

        </div>
    </div>
</div>