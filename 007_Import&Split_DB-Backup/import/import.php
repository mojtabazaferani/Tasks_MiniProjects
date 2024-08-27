<?php

$dir = __DIR__ . '/../database/database.sql';

$file1 = __DIR__ . '/../splits/split1.sql';

$file2 = __DIR__ . '/../splits/split2.sql';

$file3 = __DIR__ . '/../splits/split3.sql';

$file4 = __DIR__ . '/../splits/split4.sql';

$handle1 = fopen($file1, 'r+');

$handle2 = fopen($file2, 'r+');

$handle3 = fopen($file3, 'r+');

$handle4 = fopen($file4, 'r+');

$getContents1 = file_get_contents($file1);

$getContents2 = file_get_contents($file2);

$getContents3 = file_get_contents($file3);

$getContents4 = file_get_contents($file4);

$open = fopen($dir, 'a+');

$write1 = fwrite($open, $getContents1);

$write2 = fwrite($open, $getContents2);

$write3 = fwrite($open, $getContents3);

$write4 = fwrite($open, $getContents4);

fclose($handle1);

fclose($handle2);

fclose($handle3);

fclose($handle4);

?>