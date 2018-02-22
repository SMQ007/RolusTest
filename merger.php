<?php

if (file_exists('queries.sql')) {
    unlink('queries.sql');
}

$files = scandir('sql_files/');
if (count($files) > 2) {
    $Dir = "sql_files";

//Name of the output file
    $OutputFile = "queries.sql";


//Scan the files in the directory into an array
    $Files = scandir($Dir);


//Create a stream to the output file
    $Open = fopen($OutputFile, "w"); //Use "w" to start a new output file from zero. If you want to increment an existing file, use "a".
//Loop through the files, read their content into a string variable and write it to the file stream. Then, clean the variable.
    foreach ($Files as $k => $v) {
        if ($v != "." AND $v != "..") {
            $Data = file_get_contents($Dir . "/" . $v);
            fwrite($Open, $Data);
        }
        unset($Data);
    }


//Close the file stream
    fclose($Open);
}

echo "<pre>";
print_r('done all');
exit;
