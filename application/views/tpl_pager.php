<?php

if( isSet( $pagerConfig ) && $pagerConfig['count'] > 0 && $pagerConfig['count'] > $pagerConfig['pack']) {

    echo '<br /><div class="page"><ul class="pagination center">';
    if ($pagerConfig['page'] > 10) {
        echo '<li><a class="paginator" href="' . str_replace( 'key_page', ( $pagerConfig['page'] - 10 ), $pagerConfig['url'] ) . '">-10</a></li> ';
    }
    if ($pagerConfig['page'] > 1) {
        echo '<li><a class="paginator" href="' . str_replace( 'key_page', 1, $pagerConfig['url'] ) . '">FIRST </a></li> ';
        echo '<li><a class="paginator" href="' . str_replace( 'key_page', ( $pagerConfig['page'] - 1 ), $pagerConfig['url'] ) . '">PREV</a></li> ';
    }

    $counter = $pagerConfig['count'];

    $page = $pagerConfig['page'];

    $pack = ceil( $counter  / $pagerConfig['pack'] );

    $starter = ($pagerConfig['page']) - 3;
    if ($starter < 1) {
        $starter = 1;
    }

    $ender = ($pagerConfig['page']) + 3;

    if ($ender - $starter < 6) {
        $ender = 7;
    }

    if ($ender > ceil($counter / 10) + 1) {
        $ender = ceil($counter / 10) + 1;
        $starter = $ender - 6;
    }

    if ($starter < 1) {
        $starter = 1;
    }

    for ($i = $starter; ($i <= $ender) && ($i <= $pack); $i++) {
        $sAdd = ( $i == 1 ) ? '' : ' ';
        $sBold = ( $i == $page ) ? 'id="currentPage"' : '';
        echo $sAdd . '<li><a ' . $sBold . ' class="paginator" href="' . str_replace( 'key_page', $i, $pagerConfig['url'] ) . '">' . $i . '</a></li>';
    }

    if ($pagerConfig['page'] < ceil($counter / 10)) {
        echo ' <li><a class="paginator" href="' . str_replace( 'key_page', ( $pagerConfig['page'] + 1 ), $pagerConfig['url'] ) . '">NEXT</a></li>';
    }

    if ($pagerConfig['page'] <= (ceil($counter / 10)) - 10) {
        echo '<li> <a class="paginator" href="' . str_replace( 'key_page', ( $pagerConfig['page'] + 10 ), $pagerConfig['url'] ) . '">+10</a></li>';
    }

    if ($pagerConfig['page'] != (ceil($counter / 10))) {

        echo '<li> <a class="paginator" href="' . str_replace( 'key_page', (ceil($counter / 10)), $pagerConfig['url'] ) . '">LAST</a></li></ul></div>';
    }
}
