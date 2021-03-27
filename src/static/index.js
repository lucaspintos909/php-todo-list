'use strict'

/*Funcion para mostrar el modal de editar tarea, poniendole los datos a los inputs*/
function showModal(task_id, task_title, task_description) {
    $('#editTaskModal').modal('show');
    $('#modal_id_input').val(task_id);
    $('#modal_title_input').val(task_title);
    $('#modal_description_input').val(task_description);
}

