
<html>
<head>

</head>
<body>

<table border="1">

    <tr>
        <td>Nazwa</td>
        <td>Opis</td>
        <td>Zdjecie</td>
        <td>Usun</td>
        <td>Edytuj</td>
    </tr>

    <?php foreach($data as $row){ ?>

    <?php if ($id_edycja == $row['auta_id']) { ?>

        <form action="<?php echo Url::getUrl('auta', 'zapiszEdycje', array('id' => $row['auta_id'])) ?>" method="POST" enctype="multipart/form-data">
            <tr>
                <td><input type="hidden" name="zdjecie" value="<?php echo $row['zdjecie'] ?>"><input type="text" name="nazwa"></td>
                <td><input type="text" name="opis"</td>
                <td><input type="file" name="zdjecie"/></td>
                <td><input type="submit" name="zapisz" value="zapisz"></td>
            </tr>
        </form>


    <?php }else{ ?>

    <tr>
        <td> <?php echo $row['nazwa'] ?> </td>
        <td> <?php echo $row['opis'] ?> </td>
        <td>
            <image src="./images/<?php echo $row['zdjecie'] ?>" width="50px" heigth="50px"></image>
        </td>
        <td><a href="<?php echo Url::getUrl('auta', 'usun', array('id' => $row['auta_id'])) ?> "> Usuń
            </a></td>
        <td><a href="<?php echo Url::getUrl('auta', 'edytuj', array('id' => $row['auta_id'])) ?> "> Edytuj
            </a></td>
        <?php }
        }
    ?>

</tr>

</table>

</body>
</html>