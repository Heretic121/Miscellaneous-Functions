<?php
function _count($Arr,$CA=false) {
    if ( is_array($Arr) ) {
        $Count = 0;
        foreach ( $Arr as $A ) {
            if ( is_array($A) ) {
                if ( $CA ) $Count += _count($A,true);
                else $Count++;
            } else {
                $Count++;
            }
        }
        return($Count);
    } else {
        return(1);
    }
}
?>
