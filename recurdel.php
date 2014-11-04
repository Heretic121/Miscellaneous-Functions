<?php
function RecursiveDelete ( $Location, $Echo = false ) {
    $DirSep = (stristr(PHP_OS,'win')?"\\":"/");
    if ( $Location{strlen($Location)-1} != $DirSep ) $Location .= $DirSep;
    if ( is_dir($Location) ) {
        $FAF = scandir($Location);
        for ( $i = 0; $i < count($FAF); $i++ ) {
            if ( is_dir($Location.$FAF[$i]) && !in_array($FAF[$i],array('.','..')) ) {
                $Done = RecursiveDelete($Location.$FAF[$i],$Echo);
                if ( !$Done ) {
                    if ( $Echo ) echo "Failed whilst deleting Folder($Location{$FAF[$i]}).\n";
                    return(false);
                }
            }
            elseif ( is_file($Location.$FAF[$i]) ) {
                $Done = (unlink($Location.$FAF[$i])?true:false);
                if ( !$Done ) {
                    if ( $Echo ) echo "Failed whilst deleting File($Location{$FAF[$i]}).\n";
                    return(false);
                }
                if ( $Echo ) echo "File($Location{$FAF[$i]}) Deleted.\n";
            }
        }
        $Done = (rmdir($Location)?true:false);
        if ( $Echo && $Done ) echo "Folder($Location{$FAF[$i]}) Deleted.\n";
        return($Done);
    } else {
        echo "Location($Location) given is not a folder.\n";
        return(false);
    }
}
RecursiveDelete('/path/to/directory',true);
?>
