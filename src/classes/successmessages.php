<?php

class SuccessMessages{
    #     ESTADO_OBJETO_ACCION
    const SUCCESS_TASK_CREATED = 'SnGZ7LyR';
    const SUCCESS_TASK_DELETED = 'e53yqswG';
    const SUCCESS_TASK_UPDATED = 'dWurK5Xv';

    const SUCCESS_USER_CREATED = 'cb4FqaRe';


    private $success_list = [];

    public function __construct(){
        
        $this->success_list= [
            SuccessMessages::SUCCESS_TASK_CREATED => 'La tarea se creo correctamente!',
            SuccessMessages::SUCCESS_TASK_DELETED => 'La tarea se elimino correctamente!',
            SuccessMessages::SUCCESS_TASK_UPDATED => 'La tarea fue modificada correctamente!',
            SuccessMessages::SUCCESS_USER_CREATED => 'El usuario fue creado correctamente! Ingrese con sus datos.'

        ];

    }

    public function get($hash){
        return $this->success_list[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->success_list)){
            return true;
        }else {
            return false;
        }
    }

}