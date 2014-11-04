<?php
function _array_sum($Arr,$CA=false) {
    if ( is_array($Arr) ) {
        $Total = 0;
        foreach ( $Arr as $A ) {
            if ( is_array($A) ) {
                if ( $CA ) $Total += _array_sum($A,true);
            } else {
                $Total += $A;
            }
        }
        return($Total);
    } else {
        return(NULL);
    }
}
?>
