<?php

class Cars extends Model
{



    public function getAuta()
    {
        $sth = $this->db->prepare('SELECT * FROM Auta ');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function deleteAuta($id)
    {
        $sth = $this->db->prepare('DELETE FROM Auta Where auta_id=:id');
        $sth->bindParam(':id', $id);
        $sth->execute();
    }

    public function zapiszEdycjeAuta($nazwa, $opis, $zdjecie, $baza_nazwa, $baza_opis, $baza_zdjecie, $auta_id)
    {

        $sth = $this->db->prepare("UPDATE Auta SET " . $baza_nazwa . $nazwa . $baza_opis . $opis . $baza_zdjecie . $zdjecie . " Where auta_id=" . $auta_id . "");


            return $sth->execute();

    }

}
