<div class="login">
    <div class="tresc">
<form action="<?php echo Url::getUrl( 'marki', 'zapisz', null  ) ?> " method="POST">
    Podaj marke<br><input type="text" name="marka"><br>
    <input type="submit" name="zapisz" value="zapisz"><br>
    <?php echo (isset($info))?  $info: false;  ?>

</form>
        </div >
</div>
