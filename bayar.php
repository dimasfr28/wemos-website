<?php
switch($_REQUEST['request']){
    case 'pembayaranharian':
        echo "Harian";
        break;
    case 'bulanan' :
        echo "Bulanan";
        break;
}
