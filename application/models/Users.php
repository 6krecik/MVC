<?php

class Users extends Model
{



    public function loguj($login,$haslo)
    {
        $stmt = $this->db->prepare("Select * from Users Where login=:login and haslo=:haslo");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':haslo', $haslo);
        $stmt->execute();
        return $stmt->fetchAll();
    }



}