<?php


class Chat
{
    private $id_message;
    private $message;
    private $date;

    public function __construct($id_message, $message, $date){
        $this->id_message = $id_message;
        $this->message = $message;
        $this->date = $date;
    }

    public function getIdMessage()
    {
        return $this->id_message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setIdMessage($id_message)
    {
        $this->id_message = $id_message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
}