<?php
function random_color_part() {
    return str_pad( dechex( mt_rand( 127, 255 ) ), 2, '0', STR_PAD_LEFT);
}
?>