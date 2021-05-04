<?php
class AuthModel extends Model{

    function __construct(){
        parent::__construct();
        
    }

    function login($email, $password){
        try {
            
            $query = $this->prepare('SELECT * FROM task_db.users WHERE email = :email');
            
            $query->execute([
                'email' => $email
            ]);
            
            # Si rowCount() devuelve 0 usuarios es que no existe
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC);

                $user = new UserModel();

                # Ingreso el usuario de la bd en el usuario del modelo
                $user->from($item);
                
                # Verifica que las dos contraseñas sean iguales, y si no son iguales retorna null
                if(password_verify($password, $user->getPassword())) {
                    return $user; 
                }else{
                    return NULL;
                }

            }                

        } catch (PDOException $ex) {
            error_log("LloginModel::login->exception " . $ex);
            return NULL;
        }
    }
} 