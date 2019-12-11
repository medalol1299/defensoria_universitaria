$(document).ready(function () {
    $('.pregunta').click(function () {
        var id = $(this).attr('id');
        swal({
            title: '¿Estás seguro?',
            text: 'Se eliminará el archivo Seleccionado!',
            type: 'warning',
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonClass: 'btn btn-secondary'
        }).then(function (result) {
            if (result.value) {
                swal({
                    title: 'Eliminando',
                    text: 'Este archivo se eliminará',
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary'
                });
                location.href = base_url+"caso/borrar/"+id;
            }
        });
    });
});

