<?php 
    namespace DAO;
    use Models\TicketType;

    class TicketTypeDAO{
        private $connection;

        public function getAll(){
            try {
                $query = 'select * from tickettypes;';
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query);
                $result = array_map(function($ticketType){
                    return new TicketType( $ticketType['description'], $ticketType['ticketTypeId']);
                }, $result);
                return $result;
            } catch (Throwable $th) {
                throw $th;
            }
        }
    }
?>