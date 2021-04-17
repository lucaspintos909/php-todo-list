<?php

require_once 'classes/session.php';
require_once 'models/usermodel.php';

class SessionController extends Controller{

    private $user_session;
    private $username;
    private $user_id;

    private $session;
    private $sites;

    private $user;

    public function __construct(){
        parent::__construct();
        $this->init();        
    }

    function init(){
        $this->session = new Session();
        
        $access_json = $this->getJSONFileConfig();

        $this->sites = $access_json['sites'];
        $this->default_sites = $access_json['default-sites'];

        $this->validateSession();
    }

    private function getJSONFileConfig(){
        # Obtiene el contenido del archivo access.json y lo asigna a la variable $string
        $string = file_get_contents('config/access.json');

        # json_decode() -> Decodifica el objeto json
        $access_json = json_decode($string, true);

        return $access_json;
    }

    public function validateSession(){

        if($this->existsSession()){

            # Obtengo el rol del usuario que obtuve de la funcion getUserSessionData() 
            $role = $this->getUserSessionData()->getRole();
            
            # Verifico si la pagina que quiere entrar el usuario es publica
            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
            }else{
                if($this->isAuthorized($role)){
                    # Lo dejo pasar
                }else{
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        
        }else{
            
            if($this->isPublic()){
                # No pasa nada, lo deja entrar
            }else{
                header('Location:' . constant('URL') . 'login');
            }

        }

    }

    function existsSession(){
        if(!$this->session->exists()) return false;

        if($this->session->getCurrentUser() == NULL) return false;

        # Si pasa los dos controles de arriba le asigno el user_id
        $user_id = $this->session->getCurrentUser();

        # Si hay un user_id -> return true
        if($user_id) return true;

        # Si no hay user_id -> return false
        return false;
    }

    function getUserSessionData(){

        # Le asigno a $id el id del usuario
        $id = $this->session->getCurrentUser();

        # Creo un usuario vacio con UserModel
        $this->user = new UserModel();

        # Lleno ese usuario con los datos de la consulta a la DB que hace la funcion getUser()
        $this->user->get($id);

        return $this->user;
    }

    function isPublic(){
        $currentURL = $this->getCurrentPage();

        # Remplazo todos los signos '? . *' que no necesito
        # por un string vacio
        $currentURL = preg_replace("/\?.*/", "", $currentURL);
    
        for ($i=0; $i < sizeof($this->sites); $i++) { 

            # Si la url coincide con uno de los sitios que hay en el array $this->sites y tiene acceso publico
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                return true;
            }
        }

        # Si no coincidio con ninguno de los controles que paso devuelvo un false
        return false;

    }

    function getCurrentPage(){
        
        # Obtengo la url de la peticion
        $actual_link = trim("$_SERVER[REQUEST_URI]"); 
        
        # Separo la url con /
        $url = explode('/', $actual_link);
        
        # Devuelvo el 2do elemento porque el 0 es http, el segundo es el dominio y el tercero es recien el controlador
        # localhost/controlador
        return $url[1];
    }

    private function redirectDefaultSiteByRole($role){
        $url = '';

        for ($i=0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['role'] == $role){
                $url = $this->sites[$i]['site'];
                break;
            }
        }
        header('Location:' . constant('URL') . $url);
    }

    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();

        # Remplazo todos los signos '? . *' que no necesito
        # por un string vacio
        $currentURL = preg_replace("/\?.*/", "", $currentURL);
    
        for ($i=0; $i < sizeof($this->sites); $i++) { 

            # Si la url coincide con uno de los sitios que hay en el array $this->sites y tiene acceso publico
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                return true;
            }
        }
        # Si no coincidio con ninguno de los controles que paso devuelvo un false
        return false;
    }

    function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }

    function authorizeAccess($role){
        
        switch ($role) {
            case 'user':
                $this->redirect($this->default_sites['user'], []);
                break;
            
            case 'admin':
                $this->redirect($this->default_sites['admin'], []);
                break;
            case '':
                $this->redirect($this->default_sites[''], []);
                break;
        }

    }

    function logout(){
        $this->session->closeSession();
    }

    function emptyVariables($variables){
        foreach ($variables as $variable) {
            if($variable == '' || empty($variable)) return true;
        }

        return false;
    } 

}