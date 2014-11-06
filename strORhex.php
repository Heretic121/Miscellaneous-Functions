<?php
unset($argv[0]);
$String = implode(" ", $argv);
if ( $argc == 2 ) {
    if ( ctype_xdigit(str_replace(array("x",'/'), '', $String)) ) echo hex2str($String);
    else echo str2hex($String);
} elseif ( $argc > 2 ) {
    echo str2hex($String);
} else {
    echo "No string given\n";
}
function str2hex ($String) {
    $Chars = str_split($String);
    $HexStr = '';
    foreach ($Chars as $Char) {
        $HexStr .= "0x".sprintf("%04s",dechex(ord($Char)))."/";
    }
    if ( $HexStr{strlen($HexStr)-1} == '/' ) $HexStr = substr($HexStr, 0, -1);
    return($HexStr."\n");
}
function hex2str ($String) {
    $Chars = explode("/", $String);
    $Str = '';
    foreach ($Chars as $Char) {
        $Str .= chr(hexdec($Char));
    }
    return($Str."\n");
}
?>
