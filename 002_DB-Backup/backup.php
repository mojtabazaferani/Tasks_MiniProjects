<?php

ini_set('upload_max_filesize', '5000M');

$serverName = 'localhost';

$userName = '???';

$password = '???';

$dataBase = '???';

$dir = dirname(__FILE__) . "/backupdatabase.sql";

$dir2 = dirname(__FILE__) . "/resulsplitdb.sql";

exec("mysqldump --user={$userName} --password={$password} --host={$serverName} {$dataBase} --result-file={$dir} 2>&1", $output);

exec("split -l 100 --result-file={$dir} --result-file={$dir2}", $output2);

print_r($output);

print_r($output2);

?>