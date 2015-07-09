<?php

class Marki extends Model
{
    public function getMarki()
    {
        $sth = $this->db->prepare('SELECT * FROM Marki ');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function zapiszMarki($marka)
    {
        $sth = $this->db->prepare('Insert Into Marki (marka) VALUES (:marka)');
        $sth->bindParam(':marka',$marka);

        return $sth->execute();
    }


    public function usunMarki($id)
    {
        $sth = $this->db->prepare('DELETE FROM Marki Where marki_id=:id');
        $sth->bindParam(':id', $id);

        return $sth->execute();
    }
}