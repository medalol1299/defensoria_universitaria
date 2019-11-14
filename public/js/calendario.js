'use strict';
$(document).ready(function () {
    var date = new Date();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('.calendar').fullCalendar({
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
        header: {
            right: '',
            center: '',
            left: ''
        },
        buttonIcons: {
            prev: 'calendar__prev',
            next: 'calendar__next'
        },
        theme: false,
        selectable: true,
        selectHelper: true,
        editable: true,
        eventSources: [
            // your event source
            {
                url: base_url + 'actividad/mostrar_actividades',
                type: 'POST',
                data: {
                    custom_param1: 'something',
                    custom_param2: 'somethingelse'
                },
                error: function () {
                    alert('there was an error while fetching events!');
                },
            }
        ],
//        events: [
//            {
//                id: 1,
//                title: 'Fusce dapibus tellus',
//                start: new Date(y, m, 1),
//                allDay: true,
//                className: 'bg-cyan',
//                description: 'Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'
//            },
//        ],
        dayClick: function (date) {
            var isoDate = moment(date).toISOString();
            $('#fecha_evento').val(isoDate);
            $('#new-event').modal('show');
            $('.new-event__title').val('');
            $('.new-event__start').val(isoDate);
            $('.new-event__end').val(isoDate);
        },
        viewRender: function (view) {
            var calendarDate = $('.calendar').fullCalendar('getDate');
            var calendarMonth = calendarDate.month();
            //Set data attribute for header. This is used to switch header images using css
            $('.calendar .fc-toolbar').attr('data-calendar-month', calendarMonth);
            //Set title in page header
            $('.content__title--calendar > h1').html(view.title);
        },
        eventClick: function (event, element) {
            $('#edit-event label.btn').removeClass('active');
            $('#edit-event input[value=' + event.className + ']').prop('checked', true).parent().addClass('active');
            $('#edit-event').modal('show');
            $('.edit-event__id').val(event.id);
            $('.edit-event__title').val(event.title);
            $('.edit-event__description').val(event.description);
        }
    });
    //Add new Event
    $('body').on('click', '.new-event__add', function () {
        $.post(base_url + "actividad/nuevo_evento", $('.new-event__form').serialize(), function (respuesta) {
            var eventTitle = $('.new-event__title').val();
            if (eventTitle != '') {
                $('.calendar').fullCalendar('renderEvent', {
                    id: respuesta.idactividad,
                    title: eventTitle,
                    start: $('.new-event__start').val(),
                    end: $('.new-event__end').val(),
                    allDay: true,
                    className: $('.event-tag input:checked').val(),
                    description: respuesta.descripcion
                }, true);
                $('.new-event__form')[0].reset();
                $('.new-event__title').closest('.form-group').removeClass('has-danger');
                $('#new-event').modal('hide');
            } else {
                $('.new-event__title').closest('.form-group').addClass('has-danger');
                $('.new-event__title').focus();
            }
        }, 'json');
    });
    //Update/Delete an Event
    $('body').on('click', '[data-calendar]', function () {
        var calendarAction = $(this).data('calendar');
        var currentId = $('.edit-event__id').val();
        var currentTitle = $('.edit-event__title').val();
        var currentDesc = $('.edit-event__description').val();
        var currentClass = $('#edit-event .event-tag input:checked').val();
        var currentEvent = $('.calendar').fullCalendar('clientEvents', currentId);
        //console.log(currentClass);
        //Update
        if (calendarAction === 'update') {
            if (currentTitle != '') {
                currentEvent[0].title = currentTitle;
                currentEvent[0].description = currentDesc;
                currentEvent[0].className = [currentClass];
                $.post(base_url + 'actividad/actualizar_evento/' + currentId, $('.edit-event__form').serialize(), function () {

                }, 'json');
                $('.calendar').fullCalendar('updateEvent', currentEvent[0]);
                $('#edit-event').modal('hide');
            } else {
                $('.edit-event__title').closest('.form-group').addClass('has-error');
                $('.edit-event__title').focus();
            }
        }

        //Delete
        if (calendarAction === 'delete') {
            $('#edit-event').modal('hide');
            setTimeout(function () {
                swal({
                    title: '¿Estás seguro que deseas eliminar?',
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Aceptar',
                    cancelButtonClass: 'btn btn-secondary'
                }).then(function (result) {
                    if (result.value) {

                        $.post(base_url + 'actividad/eliminar_evento/' + currentId, $('.edit-event__form').serialize(), function () {

                        }, 'json');
                        $('.calendar').fullCalendar('removeEvents', currentId);
                        swal({
                            title: 'Deleted!',
                            text: 'Your list has been deleted.',
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonClass: 'btn btn-primary'
                        });
                    }
                })
            }, 200);
        }
    });
    //Calendar views switch
    $('body').on('click', '[data-calendar-view]', function (e) {
        e.preventDefault();
        $('[data-calendar-view]').removeClass('actions__item--active');
        $(this).addClass('actions__item--active');
        var calendarView = $(this).attr('data-calendar-view');
        $('.calendar').fullCalendar('changeView', calendarView);
    });
    //Calendar Next
    $('body').on('click', '.actions__calender-next', function (e) {
        e.preventDefault();
        $('.calendar').fullCalendar('next');
    });
    //Calendar Prev
    $('body').on('click', '.actions__calender-prev', function (e) {
        e.preventDefault();
        $('.calendar').fullCalendar('prev');
    });
});
