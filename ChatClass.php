<?php


class ChatClass
{
    private $id_message;
    private $user_id;
    private $message;
    private $date;

    public function __construct($id_message, $user_id, $message, $date){
        $this->id_message = $id_message;
        $this->user_id = $user_id;
        $this->message = $message;
        $this->date = $date;
    }

    public function getIdMessage()
    {
        return $this->id_message;
    }

    public function getUserId()
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

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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