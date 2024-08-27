<?php

$dir1 = 'split1.sql';

$dir2 = 'split2.sql';

$dir3 = 'split3.sql';

$dir4 = 'split4.sql';

$file = 'database.sql';

$handle = fopen($file, 'r');

$f = 0; //new file number 

$newFile = fopen($dir1, 'w+');

for($i = 0; $i <= 20; $i++) {
    $import = fgets($handle);

    fwrite($newFile, $import);

    if($i === 20) {
    $f ++;

    break;
    }
}

$newFile2 = fopen($dir2, 'w+');

if($f === 1) {
    for($i = 0; $i <= 20; $i++) {
        $import = fgets($handle);
    
        fwrite($newFile2, $import);

        if($i === 20) {
            $f ++;

            break;
        }
    }
}

$newFile3 = fopen($dir3, 'w+');

if($f === 2) {
    for($i = 0; $i <= 20; $i++) {
        $import = fgets($handle);
    
        fwrite($newFile3, $import);

        if($i === 20) {
            $f ++;

            break;
        }
    }
}

$newFile4 = fopen($dir4, 'w+');

if($f === 3) {
    for($i = 0; $i <= 20; $i++) {
        $import = fgets($handle);
    
        fwrite($newFile4, $import);

        if($i === 20) {
            $f = 0;
        }
    }
}


?>