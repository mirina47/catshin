<?php
    $cat = $_GET['cat_img'];
    $acsess = $_GET['acsess'];


    $cat_img = imagecreatefrompng($cat);
    imagesavealpha($cat_img, true);

    $sizeWM = getimagesize($cat);
    $heightWM = $sizeWM[1]; // высота
    $widthWM = $sizeWM[0];

    $acsess_img = imagecreatefrompng($acsess);
    imagecopy( $cat_img, $acsess_img, 0, 0, 0, 0, $widthWM, $heightWM);

    imagepng($cat_img, __DIR__.'./personal_cat.png');

    imagedestroy($acsess_img);
    imagedestroy($cat_img);

    echo $acsess;
?>