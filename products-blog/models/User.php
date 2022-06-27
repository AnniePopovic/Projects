<?php

namespace Models\User;

use Models\Model\Model;

class User extends Model
{

    protected $id;
    protected $name;
    protected $last_name;
    protected $e_mail;
    protected $passworduser;
    protected $age;
    protected $gender;

    public function __construct($name, $last_name, $e_mail, $passworduser, $age, $gender)
    {
        $this->name = $name;
        $this->last_name = $last_name;
        $this->e_mail = $e_mail;
        $this->passworduser = $passworduser;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getLastName()
    {
        return $this->last_name;
    }
    public function getEmail()
    {
        return $this->e_mail;
    }
    public function getPasswordUser()
    {
        return $this->passworduser;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getGender()
    {
        return $this->gender;
    }

    public function insertUser()
    {
        $sqlQueryString = "INSERT INTO users (name, last_name, e_mail, password, age, gender)"
            . " VALUES (" . ":name" . ", " . ":last_name" . ", " . ":e_mail" . ", " . ":passworduser" . ", " . ":age" . ", " . ":gender" . ")";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $passwordHash = password_hash($this->passworduser, PASSWORD_DEFAULT);
        $podaci = [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'e_mail' =>  $this->e_mail,
            'passworduser' => $passwordHash,
            'age' => $this->age,
            'gender' => $this->gender
        ];
        $statement->execute($podaci);
    }


    public static function getAllUsers()
    {
        parent::connection('users');
        $allUsers = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $singleUser) {
                $allUsers[] = new self($singleUser["name"], $singleUser["last_name"], $singleUser["e_mail"], $singleUser["password"], $singleUser["age"], $singleUser["gender"]);
            }
        }
        return $allUsers;
    }

    public function UserExists()
    {
        $sqlQueryString = "SELECT count(e_mail) AS num FROM users WHERE e_mail LIKE :e_mail";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $statement->bindValue(':e_mail', $this->e_mail);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($row["num"] > 0) {
            return true;
        } else return false;
    }

    public static function InUsers($emailogin)
    {
        $sqlQueryString = "SELECT count(id) AS num FROM users WHERE e_mail LIKE :e_mail";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $statement->bindValue(':e_mail', $emailogin);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($row["num"] > 0) {
            return true;
        } else return false;
    }
    public static function GetPassword($emaillogin)
    {
        $sqlQueryString = "SELECT password FROM users WHERE e_mail LIKE :e_mail";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $statement->bindValue(':e_mail', $emaillogin);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function GetUserByEmail($emaillogin)
    {
        $sqlQueryString = "SELECT * FROM users WHERE e_mail LIKE :e_mail";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $statement->bindValue(':e_mail', $emaillogin);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public static function UpdateUserByEmail($emaillogin, $nameupdate, $lastnameupdate, $ageupdate, $genderupdate)
    {
        $sqlQueryString = "UPDATE users SET name=:nameupdate,last_name=:lastnameupdate,age=:ageupdate,gender=:genderupdate WHERE e_mail LIKE :e_mail";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $podaci = [
            ':nameupdate' => $nameupdate,
            ':lastnameupdate' => $lastnameupdate,
            ':ageupdate' => $ageupdate,
            ':genderupdate' => $genderupdate,
            ':e_mail' => $emaillogin
        ];
        $statement->execute($podaci);
    }

    public static function InsertImageByEmail($emaillogin, $image)
    {
        $sqlQueryString = "UPDATE users SET profile_image =:image WHERE e_mail LIKE :email";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $podaci = [
            'image' => $image,
            'email' => $emaillogin
        ];
        $statement->execute($podaci);
    }

    public static function ChangePasswordByEmail($emaillogin, $newpassword)
    {
        $sqlQueryString = "UPDATE users SET password =:newpassword WHERE e_mail LIKE :email";
        $statement = parent::connection('users')->prepare($sqlQueryString);
        $passwordHash = password_hash($newpassword, PASSWORD_DEFAULT);
        $podaci = [
            'email' => $emaillogin,
            'newpassword' => $passwordHash
        ];
        $statement->execute($podaci);
    }
}
