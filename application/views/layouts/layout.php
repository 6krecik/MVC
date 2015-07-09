<html>
<head>
    <title>MVC - ABC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="/styles/style.css"/>
</head>
<body>
<a href="<?php echo Url::getUrl( 'auta', 'wyswietlDodaj', null ) ?> ">Dodaj auto</a>&nbsp;
<a href="<?php echo Url::getUrl( 'auta', 'list', null  ) ?> ">Wyswietl auto</a>&nbsp;
<a href="<?php echo Url::getUrl( 'marki', 'wypisz', null  ) ?> ">Wyswietl marke</a>&nbsp;
<a href="<?php echo Url::getUrl( 'marki', 'wyswietlDodaj', null  ) ?> ">Dodaj marke</a></br>
<?php echo (isset($layout->info))?  $layout->info: false;  ?>
<?php echo $content; ?>

</body>
</html>





