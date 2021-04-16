<?php

class UserModel extends Model implements IModel{
    
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    

    function __construct(){
        parent::__construct();

        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }

    public function saveUser(){
        try {
            $query = $this->prepare('INSERT INTO task_db.users(username, email, password, role) VALUES(:username, :email, :password, :role)');
            $query->execute([
                'username'  =>  $this->username,
                'email'     =>  $this->email,
                'password'  =>  $this->password,
                'role'      =>  $this->role    
            ]);
            return true;
        } catch (PDOException $ex) {
            error_log("USERMODEL::save->PDOException " . $ex);
            return false;
        }
    }

    public function getAllUsers(){

        $users = [];

        try {
            $query = $this->query('SELECT * FROM task_db.users');
            
            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            while ($user_query = $query->fetch(PDO::FETCH_ASSOC)) {

                # Agarro todo lo que viene de la consulta y le setteo cada variable al usuario
                $user = new UserModel();
                $user->setId($user_query['id']);
                $user->setUsername($user_query['username']);
                $user->setEmail($user_query['email']);
                $user->setPassword($user_query['password']);
                $user->setRole($user_query['role']);

                array_push($users, $user);
            }
            return $users;

        } catch (PDOException $ex) {
            error_log("USERMODEL::getAll->PDOException " . $ex);
            return false;
        }
    }
    
    public function getUser($id){

        try {
            $query = $this->prepare('SELECT * FROM task_db.users WHERE id = :id');
            $query->excecute(['id' => $this->id]);

            # FETCH_ASSOC es para que devuelva un array asociativo "clave->valor"
            $user = $query->fetch(PDO::FETCH_ASSOC);

            # Agarro todo lo que viene de la consulta y le setteo cada variable al usuario
            $this->setId($user['id']);
            $this->setUsername($user['username']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setRole($user['role']);

            return $this;
            
        } catch (PDOException $ex) {
            error_log("USERMODEL::getUser->PDOException " . $ex);
            return false;
        }

    }
    
    public function deleteUser($id){

        try {

            $query = $this->prepare('DELETE FROM task_db.users WHERE id = :id');
            $query->excecute(['id' => $id]);

            return true;

        } catch (PDOException $ex) {
            error_log("USERMODEL::delete->PDOException " . $ex);
            return false;
        }

    }
    
    public function updateUser(){

        try {
            $query = $this->prepare('UPDATE task_db.users SET username = :username, email = :email, password = :password, role = :role WHERE id = :id');
            $query->excecute([
                'id'        =>  $this->id,
                'username'  =>  $this->username,
                'email'     =>  $this->email,
                'password'  =>  $this->password,
                'role'      =>  $this->role    
            ]);

            return true;
            
        } catch (PDOException $ex) {
            error_log("USERMODEL::update->PDOException " . $ex);
            return false;
        }

    }
    
    public function from($array){

        $this->id       = $array['id'];
        $this->username = $array['username'];
        $this->email    = $array['email'];
        $this->password = $array['password'];
        $this->role     = $array['role'];

    }

    public function existsUser($username){
        try {
            $query = $this->prepare('SELECT username FROM task_db.users WHERE username = :username');
            $query->execute([ "username" => $username ]);

            # Si la consulta devuelve un elemento quiere decir que ya existe ese usuario
            if($query->rowCount() > 0){
                return true;
            }else {
                return false;
            }

        } catch (PDOException $ex) {
            error_log("USERMODEL::exists->PDOException " . $ex);
            return false;
        }
    }

    public function comparePasswords($password, $id){
        try {
            # Uso la funcion que ya cree para obtener el usuario con el id
            $user = $this->getUser($id);

            # Funcion de php para verificar si la contraseña en texto plano es igual a la encriptada que obtiene de la BD
            return password_verify($password, $user->getPassword());

        } catch (PDOException $ex) {
            error_log("USERMODEL::comparePasswords->PDOException " . $ex);
            return false;
        }
    }

    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
    }

    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getEmail(){     return $this->email;}
    public function getPassword(){  return $this->password;}
    public function getRole(){      return $this->role;}
    
    public function setId($id){              $this->id = $id;}
    public function setUsername($username){  $this->username = $username;}
    public function setEmail($email){        $this->email = $email;}
    public function setPassword($password){  $this->password = $this->getHashedPassword($password);}
    public function setRole($role){          $this->role = $role;}
}
