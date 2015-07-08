
<html>
<head>

</head>
<body>

<table border="1">

    <tr><td>nazwa</td><td>opis</td><td>zdjecie</td><td>usun</td><td>edytuj</td></tr>
    <?php foreach($data as $row){ ?>
    <tr>
        <td> <?php echo $row['marki_id']?> </td>
        <td> <?php echo $row['marka'] ?> </td>
        <?php }?>
        <td>  </td>
        <td>  </td>

    <tr>

</table>

</body>
</html>