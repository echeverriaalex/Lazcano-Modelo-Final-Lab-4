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
                
                if($ticketTypeId != null && $date != null && $name != null && $email != null && $description != null){
                    
                    // me traigo todos los tipos de tickets que existen en la base de datos 
                    // para despues sellecionar en el formulario
                    $ticketsTypeList = $this->ticketTypeDAO->getAll();

                    // para que trae todos los tickets? ni idea no encontre las consignas del parcial
                    // segun otro parcial trae los ticket resgistrados para comprarlo con los datos nuevo que llegan
                    // para no registrar informacion repetida
                    $ticketsList = $this->ticketDAO->getAll();
                    
                    if($ticketsList != null){     
                        
                        $repeatTicket = false;

                        if($repeatTicket == false){

                            foreach ($ticketsList as $ticket) {
                                if($ticket->getTickettypeid() == $ticketTypeId && $ticket->getEmail() == $email && $ticket->getDate() == $date){
                                    $repeatTicket = true;                                    
                                }
                            }

                            if($repeatTicket == false){                                
                                $this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description);
                                require_once(VIEWS_PATH.'ticket-add.php');
                            }else{
                                //print('No se pudo agregar');
                                echo "<script> alert('Ya existe un ticket registrado con estos mismos datos ingresados. Ingrese otro.'); </script>"; // 2
                                require_once(VIEWS_PATH.'ticket-add.php');
                            }
                        }
                    }
                    else{                   
                        $this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description);
                        echo "<script> alert('Ticket registrado con exito'); </script>";
                        echo "<br> SE GRABO CON EXITO <br>";
                    }
                    
                    // estos 3 renglones de codigo es lo que hice para registrar un ticket nuevo 
                    // antes de corregir todo lo que esta arriba con la verificacion de existencia de tickets repetidos y demas 
                    // TODO ESTO ANDA PERFECTO PERO LO COMENTO YA QUE ARREGLE TODO LO QUE ESTA ARRIBA
                    //$this->ticketDAO->add($ticketTypeId, $date, $name, $email, $description); // 1
                    //echo "<script> alert('Ticket registrado con exito'); </script>"; // 2
                    //require_once(VIEWS_PATH.'ticket-add.php'); // 3

                }else{
                    // anotaciones del pibe que hizo este modelo de parcial
                    //print('ENTRA siempre ACA, no llegue a arreglarlo');
                    echo "<script> alert('NO se puede registrar el Ticket porque llegaron datos con NULL'); </script>";
                    require_once(VIEWS_PATH.'ticket-add.php');
                }
            }else{
                echo "<script> alert('Parece que no iniciaste sesion. Inicia sesion primero por favor.'); </script>";
                header("location:".FRONT_ROOT."index.php");
            }
        }
    }
?>