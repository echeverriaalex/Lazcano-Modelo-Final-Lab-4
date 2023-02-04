<?php namespace Models;

class TicketType{
    private $ticketTypeId;
    private $description;

    public function __construct($description, $ticketTypeId = null){
        $this->ticketTypeId = $ticketTypeId;
        $this->description = $description;
    }

    public function getTickettypeid(){
        return $this->ticketTypeId;
    }
    public function setTickettypeid($ticketTypeId){
        $this->ticketTypeId = $ticketTypeId;
    }
    
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}