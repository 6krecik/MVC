


<table border="1">

    <tr><th>marka</th><th>pokaz</th><th>usun</th></tr>
    <?php foreach($data as $row){ ?>
    <tr>
        <td> <?php echo $row['marka'] ?> </td>
        <td> <a href="<?php echo Url::getUrl( 'auta', 'wyswietlKategorie', array ( 'id' => $row[ 'marki_id' ] ) ) ?> "> Pokaz</a>  </td>
        <td> <a href="<?php echo Url::getUrl( 'marki', 'usun', array ( 'id' => $row[ 'marki_id' ] ) ) ?> "> Usun</a> </td>
        <?php }?>


    <tr>

</table>

