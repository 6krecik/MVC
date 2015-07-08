<html>
<head</head>
<body>


<form enctype="multipart/form-data" action="<?php echo Url::getUrl('auta', 'dodaj', null) ?>" method="POST">
    <input type="text" name="nazwa" />
    <br />
    <input type="file" name="zdjecie" />
    <br />
    <textarea name="opis"></textarea></br>
    <select name="marka">
    <?php foreach($data as $row) { ?>
    <option value="<?php echo $row['marki_id']?>"><?php echo $row['marka']?></option>
    <?php } ?>
    </select><br>
    <input type="submit" value="zapisz">
    </form>

</body>
</html>
