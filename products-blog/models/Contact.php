<?php

namespace Models\Contact;

use Models\Model\Model;

class Contact extends Model
{
    public $id;
    public $name;
    public $last_name;
    public $e_mail;
    public $message;

    public function __construct($name, $last_name, $e_mail, $message)
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->e_mail = $e_mail;
        $this->message = $message;
    }
    public function insertContact()
    {
        $sqlQueryString = "INSERT INTO contacts (name, last_name, e_mail, message)"
            . " VALUES (" . ":name" . ", " . ":last_name" . ", " . ":e_mail" . ", " . ":message" . ")";
        $statement = parent::connection('contacts')->prepare($sqlQueryString);
        $podaci = [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'e_mail' =>  $this->e_mail,
            'message' => $this->message
        ];
        $statement->execute($podaci);
    }

    public static function getAllContacts()
    {
        parent::connection('contacts');
        $allContacts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $singleContact) {
                $allContacts[] = new self($singleContact["name"], $singleContact["last_name"], $singleContact["e_mail"], $singleContact["message"]);
            }
        }
        return $allContacts;
    }
}
