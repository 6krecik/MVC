<html>
<head>
    <title>MVC - ABC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://mvc.pl/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="http://mvc.pl/styles/menu.css"/>
    <script src="http://mvc.pl/styles/alertify.min.js"></script>
    <link rel="stylesheet" href="http://mvc.pl/styles/alertify.core.css" />
    <link rel="stylesheet" href="http://mvc.pl/styles/alertify.default.css" />

</head>
<body>
<div id='cssmenu'>
<ul>


<li ><a  href="<?php echo Url::getUrl( 'auta', 'wyswietlDodaj', null ) ?> ">Dodaj auto</a></li>&nbsp;
<li ><a href="<?php echo Url::getUrl( 'auta', 'list', null  ) ?> ">Wyswietl auto</a></li>&nbsp;
<li ><a href="<?php echo Url::getUrl( 'marki', 'wypisz', null  ) ?> ">Wyswietl marke</a></li>&nbsp;
<li ><a href="<?php echo Url::getUrl( 'marki', 'wyswietlDodaj', null  ) ?> ">Dodaj marke</a></li>&nbsp;
<li ><a href="<?php echo Url::getUrl( 'user', 'wyswietlLogowanie', null  ) ?> ">zaloguj</a></li>&nbsp;&nbsp;
<li ><a href="<?php echo Url::getUrl( 'user', 'wyswietlRejestracje', null  ) ?> ">zarejestruj</a></li>&nbsp;

<?php if ($layout->UserStorage->isAuthenticate()) { ?>
<li ><a href="<?php echo Url::getUrl( 'user', 'wyloguj', null  ) ?> ">wyloguj</a></li>&nbsp;
</ul></div>
<?php }else{echo "</ul></div>";}?>


<?php if(isset($layout->info))
{
  echo '<script type="text/javascript">';
    echo 'alertify.log("'.$layout->info.'", "", 0);';
    echo '</script>';
}
?>
<?php echo $content; ?>

</body>
</html>





