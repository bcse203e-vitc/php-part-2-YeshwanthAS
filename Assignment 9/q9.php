<?php
date_default_timezone_set("Asia/Kolkata");

$originalFile = "q9.txt";

if (file_exists($originalFile)) {
    $timestamp = date("Y-m-d_H-i");
    $fileInfo = pathinfo($originalFile);
    $backupFile = $fileInfo['filename'] . "_" . $timestamp . "." . $fileInfo['extension'];

    if (copy($originalFile, $backupFile)) {
        echo " Backup created: $backupFile";
    } else {
        echo " Failed to create backup.";
    }
} else {
    echo " File '$originalFile' not found.";
}
?>

