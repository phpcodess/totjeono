<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="galery.css">
    <title>Document</title>
</head>
<body>
<h1 class="galery">Galeria</h1>

<?php
include "header.php";
include "functions.php";
$galleryPath = 'galeria/';

if (is_dir($galleryPath)) {
    $galleryDirs = array_filter(scandir($galleryPath), function ($item) use ($galleryPath) {
        return is_dir($galleryPath . $item) && !in_array($item, ['.', '..']);
    });

    if (!empty($galleryDirs)) {
        echo '<nav>';
        echo '<ul a class="galery">';
        // echo '<li><a href="' . $galleryPath . '">GALERIA</a></li>';
        foreach ($galleryDirs as $dir) {
            if(isset($_GET["part"]) && $_GET['part'] == $dir){
                    echo '<li a class="selected galery"><a class="galery" href="?part='.$dir.'">' . $dir . '</a></li>';
                } else{
                    echo '<li a class="galery"><a class="galery" href="?part='.$dir.'">' . $dir . '</a></li>';
                }
            }

        }
        echo '</ul>';
        echo '</nav>';

        if(isset($_GET["part"])){
            $part = $_GET["part"];
            $direct = "./galeria/".$part;
            $images = glob($direct . "/*.jpg");
            img_count($images);
            echo  '<div class="gallery">';
            foreach($images as $image)
            {

            echo '<div class="gallery-item">
                    <img src="'.$image.'" alt="Image 1">
                    </div>';

            }
            echo  '<div class="gallery">';
        }
    }


?>

</body>
</html>