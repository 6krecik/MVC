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

    public function zapiszAuta($tab)
    {
        $sth = $this->db->prepare("INSERT INTO Auta(nazwa, marka_id, opis, zdjecie) VALUES (:nazwa, :marka_id, :opis, :zdjecie)");
        $sth->bindParam( ':nazwa', $tab['nazwa'] );
        $sth->bindParam( ':marka_id', $tab['marka'] );
        $sth->bindParam( ':opis', $tab['opis']);
        $sth->bindParam( ':zdjecie', $tab['zdjecie']);

            return $sth->execute();
    }

    public function getKategorieAuta($id)
    {
        $sth = $this->db->prepare('Select * FROM Auta Where marka_id=:id');
        $sth->bindParam('id', $id);
        $sth->execute();
        return $sth->fetchAll();
    }

}
