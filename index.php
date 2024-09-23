<?php
      include 'cat.php';
      ini_set('display_errors', 1);

      function createImage($bg_path, $tail_color_path, $tail_border_path, $body_color_path, $body_border_path,//создание картинки котика из слоев
        $head_color_path, $head_border_path, $eyes_color_path, $eyes_border_path) {

          $bg = imagecreatefrompng($bg_path);
          imagesavealpha($bg, true);

          $bg_src = $bg_path;
          $sizeWM = getimagesize($bg_src);
          $heightWM = $sizeWM[1]; // высота
          $widthWM = $sizeWM[0];

          $tail_color = imagecreatefrompng($tail_color_path);
          imagecopy( $bg, $tail_color, 0, 0, 0, 0, $widthWM, $heightWM);

          $tail_border = imagecreatefrompng($tail_border_path);
          imagecopy( $bg, $tail_border, 0, 0, 0, 0, $widthWM, $heightWM);

          $body_color = imagecreatefrompng($body_color_path);
          imagecopy( $bg, $body_color, 0, 0, 0, 0, $widthWM, $heightWM);

          $body_border = imagecreatefrompng($body_border_path);
          imagecopy( $bg, $body_border, 0, 0, 0, 0, $widthWM, $heightWM);

          $head_color = imagecreatefrompng($head_color_path);
          imagecopy( $bg, $head_color, 0, 0, 0, 0, $widthWM, $heightWM);

          $head_border = imagecreatefrompng($head_border_path);
          imagecopy( $bg, $head_border, 0, 0, 0, 0, $widthWM, $heightWM);

          $eyes_color = imagecreatefrompng($eyes_color_path);
          imagecopy( $bg, $eyes_color, 0, 0, 0, 0, $widthWM, $heightWM);

          $eyes_border = imagecreatefrompng($eyes_border_path);
          imagecopy( $bg, $eyes_border, 0, 0, 0, 0, $widthWM, $heightWM);



          imagepng($bg, __DIR__.'./result.png');


          imagedestroy($tail_color);
          imagedestroy($tail_border);
          imagedestroy($body_color);
          imagedestroy($body_border);
          imagedestroy($head_color);
          imagedestroy($head_border);
          imagedestroy($eyes_color);
          imagedestroy($eyes_border);
          imagedestroy($bg);

      }


      /*$cat1 = new Cat(3, 1, 2, 1, 2, 1, 2);
      $cat2 = new Cat(2, 2, 3, 1, 3, 4, 3);
      $kitty = new Kitty($cat1, $cat2);
      $kitty2 = new Kitty($cat1, $kitty);
      $kitty3 = new Kitty($kitty, $kitty2);
      $kitty3->printKitty();
      //$kitty->printKitty();*/
?>

