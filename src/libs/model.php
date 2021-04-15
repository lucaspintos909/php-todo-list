<?php
    # Clase modelo base
    include_once 'libs/imodel.php'; # Para implementar la interfaz
    class Model{


        function __construct(){
            $this->db = new Database();    
        }
        
        # Funcion para facilitar las consultas
        function query($query){
            return $this->db->connect()->query($query);
        }
        
        function prepare($query){
            return $this->db->connect()->prepare($query);
        }

    }