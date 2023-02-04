<?php 
    namespace DAO;
    use Models\User;

    class UserDAO{

        private $connection;

        public function getUserByEmail($email){
            try {
                $query = 'select * from users where email = :email';
                $this->connection = Connection::GetInstance();
                $parameter['email'] = $email;
                $result = $this->connection->Execute($query, $parameter);
                if($result){
                    $result = $result[0];
                    return new User ($result['email'], $result['password'], $result['userId']);
                }else {
                    return null;
                }

            } catch (Throwable $th) {
                throw $th;
            }
        }
    }
?>