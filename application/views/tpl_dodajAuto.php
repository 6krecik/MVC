
<div class="login">
    <div class="tresc">
<form enctype="multipart/form-data" action="<?php echo Url::getUrl('auta', 'dodaj', null) ?>" method="POST">
    Podaj Nazwe<br><input type="text" name="nazwa" />
    <br />
    Opis<br><textarea name="opis"></textarea></br>
    <input type="file" name="zdjecie" />
    <br />



<select name="marka">
    <?php foreach($data as $row) { ?>
    <option value="<?php echo $row['marki_id']?>"><?php echo $row['marka']?></option>
    <?php } ?>
    </select><br>
    <input type="submit" value="zapisz">
    <?php echo (isset($info))?  $info: false;  ?>
    </form>

</div >
</div >