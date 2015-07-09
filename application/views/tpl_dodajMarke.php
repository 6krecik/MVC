<form action="<?php echo Url::getUrl( 'marki', 'zapisz', null  ) ?> " method="POST">
    <input type="text" name="marka">
    <input type="submit" name="zapisz" value="zapisz"><br>
    <?php echo (isset($info))?  $info: false;  ?>

</form>