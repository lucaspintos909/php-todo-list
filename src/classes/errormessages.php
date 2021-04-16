<?php

class ErrorMessages{

    #     ESTADO_OBJETO_ACCION
    const ERROR_TASK_CREATE = 'AsNF8sgM';
    const ERROR_TASK_DELETE = 'PcAXeF8q';
    const ERROR_TASK_UPDATE = 'd8mXEbmZ';
    const ERROR_TASK_EMPTY = '9HuLDpXu';

    const ERROR_USER_CREATED = '29c7TowW';
    const ERROR_USER_EMPTY = 'aqX2kc7E';
    const ERROR_USER_PASSWORD = 'rp4b463Q';
    const ERROR_USER_EMAIL = 'R8qPVDZP';
    const ERROR_USER_EXISTS = 'Wbht9ACn';
    const ERROR_USER_INCORRECT = '5HtdDbXu';

    


    private $error_list = [];

    public function __construct(){
        
        $this->error_list= [
            ErrorMessages::ERROR_TASK_CREATE => 'Hubo un error al crear la tarea, intente nuevamente.',
            ErrorMessages::ERROR_TASK_DELETE => 'Hubo un error al eliminar la tarea, intente nuevamente.',
            ErrorMessages::ERROR_TASK_UPDATE => 'Hubo un error al modificar la tarea, intente nuevamente.',
            ErrorMessages::ERROR_USER_EMPTY => 'Has dejado campos incompletos.',
            ErrorMessages::ERROR_USER_PASSWORD => 'Las contraseñas no coinciden.',
            ErrorMessages::ERROR_USER_EMAIL => 'El mail ingresado es incorrecto.',
            ErrorMessages::ERROR_USER_EXISTS => 'El email ingresado ya existe, ingrese otro.',
            ErrorMessages::ERROR_USER_CREATED => 'Hubo un error al procesar la solicitud, intente nuevamente.',
            ErrorMessages::ERROR_USER_INCORRECT => 'Email y/o contraseña incorrectos.',
            ErrorMessages::ERROR_TASK_EMPTY => 'Has dejado campos vacios, llenelos e intente nuevamente.',
        ];

    }

    public function get($hash){
        return $this->error_list[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->error_list)){
            return true;
        }else {
            return false;
        }
    }

}