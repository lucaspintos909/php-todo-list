<?php

class ErrorMessages{

    #     ESTADO_OBJETO_ACCION
    const ERROR_TASK_CREATE = 'AsNF8sgM';
    const ERROR_TASK_DELETE = 'PcAXeF8q';
    const ERROR_TASK_UPDATE = 'd8mXEbmZ';

    private $error_list = [];

    public function __construct(){
        
        $this->error_list= [
            ErrorMessages::ERROR_TASK_CREATE => 'Hubo un error al crear la tarea, intente nuevamente.',
            ErrorMessages::ERROR_TASK_DELETE => 'Hubo un error al eliminar la tarea, intente nuevamente.',
            ErrorMessages::ERROR_TASK_UPDATE => 'Hubo un error al modificar la tarea, intente nuevamente.'
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