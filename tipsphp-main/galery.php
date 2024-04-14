<?php include('header.php') ?>
<h1 class="galery">Galeria</h1>

<?php
function count_images($img) {
    $i = 0;
        foreach ($img as $x) {
            $i++;
        }
    echo "Počet obrázkov: $i";
}

$files = glob('gallery/*');
$file = str_replace("gallery/", "", $files);
echo "<ul class='gal-files'>";
foreach ($file as $value) {
    if (isset($_GET['part']) && $_GET['part'] == $value) {
        echo "<li class='selected'><a href=\"?part=$value\">$value</a></li>";
    }
    else echo "<li class='nselected'><a href=\"?part=".$value."\">$value</a></li>";
}
echo "</ul>";

if(isset($_GET['part'])) {
    $x = $_GET['part'];

    $images = glob("gallery/$x/*");
    count_images($images);
    echo "<ul class=\"gal-image\">";
    foreach ($images as $value) {
        $value2 = str_replace("small", "big", $value);
        echo "<li><a href=\"$value2\"><img src=\"$value\" width=300></a></li>";
    }
    echo "</ul>";
}

?>

