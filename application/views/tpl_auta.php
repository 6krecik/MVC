
<table border="1">

    <tr>
        <td>Nazwa</td>
        <td>Opis</td>
        <td>Zdjecie</td>
        <td>Usun</td>
        <td>Edytuj</td>
    </tr>

    <?php foreach($data as $row){ ?>

    <tr>
        <td> <?php echo $row['nazwa']?> </td>
        <td> <?php echo $row['opis'] ?> </td>
        <td> <image src="./images/<?php echo $row['zdjecie'] ?>" width="50px" heigth="50px"></image> </td>
        <td> <a href="<?php echo Url::getUrl( 'auta', 'usun', array ( 'id' => $row[ 'auta_id' ] , 'id_marki'=>$id_marki)) ?> "> Usuń </a></td>
        <td> <a href="<?php echo Url::getUrl( 'auta', 'edytuj', array ( 'id' => $row[ 'auta_id' ], 'id_marki'=>$id_marki ) ) ?> "> Edytuj </a></td>
        <?php }?>


    </tr>

</table>

<?php  $partial->display( 'pager' ); ?>

