<?php

$dir = "1-rename";
$photos = scandir($dir);

$i = -1;
foreach ($photos as $index => $value) {

    if ($value !== '.' && $value !== '..') {
        $oldname = $dir . DIRECTORY_SEPARATOR . $value;
        $newname =$dir . DIRECTORY_SEPARATOR .$i . '.jpg';
        rename($oldname, $newname);
    }
    $i++;
}
print_r($photos);