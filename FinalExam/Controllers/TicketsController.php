<?php namespace Controllers;

use DAO\TicketDAO;
use DAO\TicketTypeDAO;

class TicketsController{
    private $ticketDAO;
    private $ticketTypeDAO;

    public function __construct(){
        $this->ticketDAO = new TicketDAO();
        $this->ticketTypeDAO = new TicketTypeDAO;
    }

    public function List(){
        if(isset($_SESSION['email'])){
            $ticketsTypeList = $this->ticketTypeDAO->getAll();
            $ticketsList = $this->ticketDAO->getAll();
            require_once(VIEWS_PATH.'ticket-list.php');
        }else{
            header("location:".FRONT_ROOT."index.php");
        }
    }

    public function Delete($ticketId){

        //echo "<br><br>El id a borrar es ---> $ticketId";
        $this->ticketDAO->delete($ticketId);
        echo "<script> alert('Ticket eliminado con exito'); </script>";
        $ticketsTypeList = $this->ticketTypeDAO->getAll();
        $ticketsList = $this->ticketDAO->getAll();
        require_once(VIEWS_PATH.'ticket-list.php');
    } 

    public function Add($ticketTypeId = null, $date = null, $name = null, $email = null, $description = null){
        
        /*
        // Muestro en pantalla los datos que contengan los parametros que recibo
        echo "Controller Ticket: ADD <br>";
        echo "ticketTypeId ---> $ticketTypeId<br>"; 
        echo "date ---> $date <br>";
        echo "name ---> $name<br>";
        echo "email ---> $email<br>";
        echo "description ---> $description<br>";
        */
       
        if(isset($_SESSION['email'])){
            
            // me traigo todos los tipos de ticket para despues sellecionar en el formulario
            $ticketsTypeList = $this->ticketTypeDAO->getAll();

            if($ticketTypeId != null && $date != null && $name != null && $email != null && $description != null){
                
                //echo "<br> IF DE LOS NULLS <br>";                
                // para que trae todos los tickets? ni idea
                //$ticketsList = $this->ticketDAO->getAll();
                //echo "<br> MUESTRO TICKET LIST DE GET ALL <br>";
                //var_dump($ticketsList);
                //echo "<br> GET ALL <br>";

                /*
                if($ticketsList != null){                

                    foreach ($ticketsList as $ticket) {
                        if($ticket->getTickettypeid() != $ticketTypeId && $ticket->getEmail() != $email && $ticket->getDate() != $date){
                            echo "<br> IF DEL DAO <br>";
                            $this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description);
                            //require_once(VIEWS_PATH.'ticket-add.php');
                        }else{
                            print('No se pudo agregar');
                            require_once(VIEWS_PATH.'ticket-add.php');
                        }
                    }
                }
                else{                   
                    $this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description);
                    echo "<br> SE GRABO CON EXITO <br>";
                }
                */
                $this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description);
                echo "<script> alert('Ticket registrado con exito'); </script>";
                require_once(VIEWS_PATH.'ticket-add.php');

            }else{
                //print('ENTRA siempre ACA, no llegue a arreglarlo');
                require_once(VIEWS_PATH.'ticket-add.php');
            }
        }else{
            header("location:".FRONT_ROOT."index.php");
        }
    }
}