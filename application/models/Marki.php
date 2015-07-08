<?php

class Marki extends Model
{
    public function getMarki()
    {
        $sth = $this->db->prepare('SELECT * FROM Marki ');
        $sth->execute();
        return $sth->fetchAll();
    }
}