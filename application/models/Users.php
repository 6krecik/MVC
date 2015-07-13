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

    public function sprawdzCzyWBazie($login)
    {
        $stmt = $this->db->prepare(' Select * from Users Where login=:login');
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function zapiszRejestracje($login, $haslo)
    {
        $stmt = $this->db->prepare("Insert into Users (login, haslo) VALUES (:login, :haslo)");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':haslo', $haslo);

            return $stmt->execute();
    }


}