
<table class="table-fill">
    <thead>

    <tr>
        <th class="text-center">Nazwa</th>
        <th class="text-center">Opis</th>
        <th class="text-center">Zdjecie</th>
        <th class="text-center">Edytuj</th>
        <th class="text-center">Usun</th>
    </tr>
    </thead>
    <tbody class="table-hover">

    <?php foreach($data as $row){ ?>

    <?php if (isset($id_edycja) && $id_edycja == $row['auta_id']) { ?>

        <form action="<?php echo Url::getUrl('auta', 'zapisz', array('id' => $row['auta_id'], 'id_marki'=>$id_marki)) ?>" method="POST" enctype="multipart/form-data">
            <tr>
                <td class="text-center"><input type="hidden" name="zdjecie" value="<?php echo $row['zdjecie'] ?>"><input type="text" name="nazwa"></td>
                <td class="text-center"><input type="text" name="opis"</td>
                <td class="text-center"><input type="file" name="zdjecie"/></td>
                <td class="text-center"><input type="submit" name="zapisz" value="zapisz"></td>
                <td class="text-center"> <a href="<?php echo Url::getUrl( 'auta', 'list', array (  'id_marki'=>$id_marki  ) ) ?> "><span class="glyphicon glyphicon glyphicon-off color" aria-hidden="true"></a></td>
            </tr>
        </form>


    <?php }else{ ?>



    <tr>
        <td class="text-center"> <?php echo $row['nazwa']?> </td>
        <td class="text-center"> <?php echo $row['opis'] ?> </td>
        <td class="text-center"> <image src="./images/<?php echo $row['zdjecie'] ?>" width="50px" heigth="50px"></image> </td>
        <td class="text-center"> <a href="<?php echo Url::getUrl( 'auta', 'list', array ( 'id_edycja' => $row[ 'auta_id' ], 'id_marki'=>$id_marki  ) ) ?> "> <span class="glyphicon glyphicon-edit color" aria-hidden="true"> </a></td>
        <td class="text-center"> <a href="<?php echo Url::getUrl( 'auta', 'usun', array ( 'id' => $row[ 'auta_id' ] , 'id_marki'=>$id_marki, 'id_zdjecia'=>$row['zdjecie'])) ?> "> <span class="glyphicon glyphicon glyphicon-trash color" aria-hidden="true"> </a></td>

        <?php }?>
        <?php }?>


    </tr>
</tbody>
</table>

<?php  $partial->display( 'pager' ); ?>

