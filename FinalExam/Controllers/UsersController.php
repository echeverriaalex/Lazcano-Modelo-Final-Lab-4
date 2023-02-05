<?php namespace Controllers;

    use DAO\UserDAO;

    class UsersController{

        private $userDAO;

        public function __construct(){
            $this->userDAO = new UserDAO;
        }

        public function login($email, $password){
            if($email != null && $password != null){
                $user = $this->userDAO->getUserByEmail($email);
                if ($user) {
                    $_SESSION['email'] = $user->getEmail();
                    header('location:'.FRONT_ROOT.'Tickets/List');
                }else{
                    require_once(VIEWS_PATH."index.php");
                }
            }else{
                require_once(VIEWS_PATH."index.php");
            }
        }

        public function logout(){
            session_destroy();
            header('location:'.FRONT_ROOT.'index.php');
        }
    }
?>