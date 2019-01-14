<?php

function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {


        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
//            $results[] = $path;
        }
    }

    return $results;
}

//ş ü ö İ ğ ı ç

$unicode = ["#U015f", "#U00fc", "#U00f6", "#U0131", "#U011f", "#U00e7", "#U015e", "#U00dc", "#U00d6", "#U0130", "#U011e", "#U00c7"];

$correct = ["ş", "ü", "ö", "ı", "ğ", "ç", "Ş", "Ü", "Ö", "İ", "Ğ", "Ç",];



$images = getDirContents('./image/'); // FILES PATH

//print_r($images);
//var_dump(getDirContents('./image/'));

foreach ($images as $key => $image) {

    $correct_name = str_replace($unicode, $correct, $image, $count);

    $correct_name = str_replace(" ", "\ ", $correct_name);
    
    $image = str_replace(" ", "\ ", $image);

    if ($count > 0) {
        echo $image . ' | ' . $correct_name;
        echo "\xA";
        exec("mv $image $correct_name");
    }
}
