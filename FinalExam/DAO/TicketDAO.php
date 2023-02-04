<?php 
    namespace DAO;
    use Models\Ticket;

    class TicketDAO{
        private $connection;

        private $tableName = "tickets";

        public function getAll(){
            try {
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query);
                $result = array_map(function($ticket){
                    return new Ticket($ticket['ticketTypeId'], $ticket['name'], $ticket['email'], $ticket['description'], $ticket['date'], $ticket['ticketId']);
                }, $result);
                return $result;
            } catch (Throwable $th) {
                throw $th;
            }
        }

        public function add($ticketTypeId, $date, $name, $email, $description){
            try {
                $query = "insert into $this->tableName (ticketTypeId, date, name, email, description) values (:ticketTypeId, :date, :name, :email, :description);";
                $this->connection = Connection::GetInstance();
                $parameters['ticketTypeId'] = $ticketTypeId;
                $parameters['name'] = $name;
                $parameters['email'] = $email;
                $parameters['description'] = $description;
                $parameters['date'] = $date;
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Throwable $th) {
                throw $th;
            }
        }

        public function delete($ticketId){
            // el pamatro que llega $ticketId debe ser igual 
            // al nombre del dato de la base de datos y luego debo 
            // repetirlo para hacer la query
            try {
                $query = "delete from $this->tableName where (ticketId = :ticketId);";
                $parameters['ticketId'] = $ticketId;
                $this->connection = Connection::GetInstance();                
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (PDOException $th) {
                throw $th;
            }
        }
    }
?>