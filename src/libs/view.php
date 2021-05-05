<?php

    class View{

        private $data;

        function __construct(){

        }


        function render($name, $data = [], $user_data = []){
            $this->data['data'] = $data;
            $this->data['user_data'] = $user_data;
            $this->handleMessages();

            require_once 'views/' . $name . '.php';
        }

        private function handleMessages(){
            if(isset($_GET['error']) && isset($_GET['success'])){
                # No pueden haber mensajes de error y success al mismo tiempo
            }else if(isset($_GET['success'])){
                $this->handleSuccess();
            }else if(isset($_GET['error'])){
                $this->handleError();
            }
        }

        private function handleError(){
            $hash = $_GET['error'];

            $error = new ErrorMessages();

            if($error->existsKey($_GET['error'])){
                $this->data['error'] = $error->get($hash);
            }
        }

        private function handleSuccess(){
            $hash = $_GET['success'];

            $success = new SuccessMessages();

            if($success->existsKey($hash)){
                $this->data['success'] = $success->get($hash);
            }
        }

        public function showMessages(){
            $this->showErrors();
            $this->showSuccess();
        }

        public function showErrors(){
            if(array_key_exists('error',$this->data)){
                echo '<div class="alert alert-danger alert-dismissible fade show fixed-bottom alert-fit-content" role="alert">' . $this->data['error'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        }

        public function showSuccess(){
            if(array_key_exists('success',$this->data)){
                echo '<div class="alert alert-success alert-dismissible fade show fixed-bottom alert-fit-content" role="alert">' . $this->data['success'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        }

    }