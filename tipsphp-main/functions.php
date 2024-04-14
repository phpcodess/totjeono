<?php

function img_count($img) {
    $i = 0;
        foreach ($img as $x) {
            $i++;
        }
    echo "Počet obrázkov: $i";
}