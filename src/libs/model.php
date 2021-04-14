<?php
    # Clase modelo base
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