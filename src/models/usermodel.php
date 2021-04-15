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

    public function save(){
        try {
            $query = $this->prepare('INSERT INTO task_db.users(user_name, email, password, role) VALUES(:username, :email, :password, :role)');
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

    public function getAll(){

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
            error_log("USERMODEL::getALL->PDOException " . $ex);
            return false;
        }
    }
    
    public function get($id){}
    
    public function delete($id){}
    
    public function update(){}
    
    public function from($array){}

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
