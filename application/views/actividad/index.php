<header class="content__title">
    <h1>ACTIVIDADES DEL DEFENSOR UNIVERSITARIO</h1>

</header>

<div class="content__inner">
    <header class="content__title content__title--calendar">
        <h1>Calendario</h1>

        <div class="actions actions--calendar">
            <a href="calendar.html" class="actions__item actions__calender-prev"><i class="zmdi zmdi-long-arrow-left"></i></a>
            <a href="calendar.html" class="actions__item actions__calender-next"><i class="zmdi zmdi-long-arrow-right"></i></a>
            <i class="actions__item actions__item--active zmdi zmdi-view-comfy" data-calendar-view="month"></i>
            <i class="actions__item zmdi zmdi-view-week" data-calendar-view="basicWeek"></i>
            <i class="actions__item zmdi zmdi-view-day" data-calendar-view="basicDay"></i>
        </div>
    </header>

    <div class="calendar card"></div>

    <!-- Add new event -->
    <div class="modal fade" id="new-event" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Actividad</h5>
                </div>
                <div class="modal-body">
                    <form class="new-event__form">
                        <div class="form-group">
                            <input type="text" name="actividad" class="form-control new-event__title" placeholder="Actividad">
                            <i class="form-group__bar"></i>
                        </div>
                        <div class="form-group">
                            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                            <i class="form-group__bar"></i>
                        </div>
                        <div class="btn-group btn-group-toggle btn-group--colors event-tag" data-toggle="buttons">
                            <label class="btn bg-light-blue active">
                                <input type="radio" name="color" value="bg-light-blue" autocomplete="off" checked>
                            </label>
                            <label class="btn bg-teal"><input type="radio" name="color" value="bg-teal" autocomplete="off"></label>
                            <label class="btn bg-red"><input type="radio" name="color" value="bg-red" autocomplete="off"></label>
                            <label class="btn bg-purple"><input type="radio" name="color" value="bg-purple" autocomplete="off"></label>
                            <label class="btn bg-amber"><input type="radio" name="color" value="bg-amber" autocomplete="off"></label>
                            <label class="btn bg-cyan"><input type="radio" name="color" value="bg-cyan" autocomplete="off"></label>
                        </div>
                        <input type="hidden" class="new-event__start" />
                        <input type="hidden" class="new-event__end" />
                        <input type="hidden" name="fecha" id="fecha_evento"/>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-link new-event__add" id="agregar_evento">Confirmar</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit event -->
    <div class="modal fade" id="edit-event" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Actividad</h5>
                </div>
                <div class="modal-body">
                    <form class="edit-event__form">
                        <div class="form-group">
                            <input type="text" name="actividad" class="form-control edit-event__title" placeholder="Nombre del Evento">
                            <i class="form-group__bar"></i>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control edit-event__description textarea-autosize" name="descripcion" placeholder="Descripción del Evento"></textarea>
                            <i class="form-group__bar"></i>
                        </div>
                        
                        <div class="btn-group btn-group-toggle btn-group--colors event-tag" data-toggle="buttons">
                            <label class="btn bg-light-blue"><input type="radio" name="color" value="bg-light-blue" autocomplete="off"></label>
                            <label class="btn bg-teal"><input type="radio" name="color" value="bg-teal" autocomplete="off"></label>
                            <label class="btn bg-red"><input type="radio" name="color" value="bg-red" autocomplete="off"></label>
                            <label class="btn bg-purple"><input type="radio" name="color" value="bg-purple" autocomplete="off"></label>
                            <label class="btn bg-amber"><input type="radio" name="color" value="bg-amber" autocomplete="off"></label>
                            <label class="btn bg-cyan"><input type="radio" name="color" value="bg-cyan" autocomplete="off"></label>
                        </div>

                        <input type="hidden" class="edit-event__id">
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-calendar="update">Actualizar</button>
                    <button class="btn btn-link" data-calendar="delete">Eliminar</button>
                    <button class="btn btn-link" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>