<?php

#require_once 'models/usermodel.php';

class AdminModel extends Model
{

    private $users;

    public function __construct(){
        parent::__construct();

        $this->users = $this->getAll();
    }

    public function getAllUsers(){
        return $this->users;
    }

    public function getAll(){

        $users = [];

        try {
            $query = $this->query('SELECT id, username, email, role FROM task_db.users');

            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            while ($user_query = $query->fetch(PDO::FETCH_ASSOC)) {

                # Agarro to do lo que viene de la consulta y le setteo cada variable al usuario
                $user = new UserModel();
                $user->setId($user_query['id']);
                $user->setUsername($user_query['username']);
                $user->setEmail($user_query['email']);
                $user->setRole($user_query['role']);

                array_push($users, $user);
            }
            return $users;

        } catch (PDOException $ex) {
            error_log("USERMODEL::getAll->PDOException " . $ex);
            return false;
        }
    }
}