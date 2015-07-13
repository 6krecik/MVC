


<table class="table-fill">

<thead>
    <tr>
        <th class="text-center">Marka</th>
        <th class="text-center">Pokaz</th>
        <th class="text-center">Dodaj</th>
        <th class="text-center">Usun</th>
    </tr>
    </thead>
    <tbody class="table-hover">

    <?php foreach($data as $row){ ?>

    <tr>
        <td class="text-center"> <?php echo $row['marka'] ?> </td>
        <td class="text-center"> <a href="<?php echo Url::getUrl( 'auta', 'list', array ( 'id_marki' => $row[ 'marki_id' ] ) ) ?> ">
                <span class="glyphicon glyphicon-eye-open color" aria-hidden="true"></span></a>  </td>

        <td class="text-center"> <a href="<?php echo Url::getUrl( 'marki', 'wyswietlDodaj' , null ) ?> ">
                <span class="glyphicon glyphicon glyphicon-plus color" aria-hidden="true"></span></a>  </td>

        <td class="text-center"> <a href="<?php echo Url::getUrl( 'marki', 'usun', array ( 'id' => $row[ 'marki_id' ] ) ) ?> ">
                <span class="glyphicon glyphicon glyphicon-trash color" aria-hidden="true"></a> </td>
    </tr>
        <?php }?>

</tbody>


</table>

