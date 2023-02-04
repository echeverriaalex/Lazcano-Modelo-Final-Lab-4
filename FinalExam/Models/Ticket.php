<?php namespace Models;

class Ticket{
    private $ticketTypeId;
    private $name;
    private $email;
    private $description;
    private $date;
    private $ticketId;
    
    public function __construct($ticketTypeId, $name, $email, $description, $date, $ticketId = null){
        $this->ticketTypeId = $ticketTypeId;
        $this->name = $name;
        $this->email = $email;
        $this->description = $description;
        $this->date = $date;
        $this->ticketId = $ticketId;
    }
    
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getTickettypeid(){
        return $this->ticketTypeId;
    }
    public function setTickettypeid($ticketTypeId){
        $this->ticketTypeId = $ticketTypeId;
    }
    
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    
    public function getTicketid(){
        return $this->ticketId;
    }
    public function setTicketid($ticketId){
        $this->ticketId = $ticketId;
    }
}