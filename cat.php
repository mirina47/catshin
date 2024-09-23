<?php
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


  function getPathImageColor($part, $form, $color) {//получить нужный путь к к изображению
    $beginPath = 'C:\MAMP\htdocs\catshin\layers';
    $formPath = '\\'.$part.'\\'.$part.'_form'.$form.'_color';//путь к папке
    $filename = $part.'_form'.$form.'_color'.$color;
    $path = $beginPath.$formPath.'\\'.$filename.'.png';
    //echo " ".$path.'<br>';
    return $path;
  }
  function getPathImageForm($part, $form) {
    $beginPath = 'C:\MAMP\htdocs\catshin\layers';
    $formPath = '\\'.$part.'\\'.$part.'_form'.$form.'.png';
    //echo "ImageForm  ".$beginPath.$formPath.'<br>';
    return $beginPath.$formPath;
  }

  function getPathBg($bg) {
    $beginPath = 'C:\MAMP\htdocs\catshin\layers\background\background_color'.$bg.'.png';
    //echo " bg  =  ".$beginPath.'<br>';
    return $beginPath;
  }


  class Cat {
    private $id;
    public $bg;
    public $color;
    public $tail;
    public $body;
    public $head;
    public $eyes;
    public $eyes_color;

    public function __construct($bg, $color, $tail, $body, $head, $eyes, $eyes_color) {//создание кота по набору параметров
      $this->setId();
      $this->bg = $bg;
      $this->color = $color;
      $this->tail = $tail;
      $this->body = $body;
      $this->head = $head;
      $this->eyes = $eyes;
      $this->eyes_color = $eyes_color;

    }

    public function generateCat() {
      $this->bg = rand(1, 9);
      $this->color = rand(1, 7);
      $this->tail = rand(1, 3);
      $this->body = rand(1, 3);
      $this->head = rand(1, 3);
      $this->eyes = rand(1, 4);
      $this->eyes_color = rand(1, 5);
    }

    public function setId() {
      $this->id = spl_object_id($this);
    }

    public function getId() {
      echo $this->id." ";
    }
    public function printCat() {
      createImage(getPathBg($this->bg), getPathImageColor('tail', $this->tail, $this->color), getPathImageForm('tail', $this->tail),
        getPathImageColor('body', $this->body, $this->color), getPathImageForm('body', $this->body), getPathImageColor('head', $this->head, $this->color),
        getPathImageForm('head', $this->head), getPathImageColor('eyes', $this->eyes, $this->eyes_color), getPathImageForm('eyes', $this->eyes)
      );
    }

  }

class Kitty extends Cat{
    public $parent1;
    public $parent2;

    public $genom_bg = Array();
    public $genom_color = Array();
    public $genom_tail = Array();
    public $genom_body = Array();
    public $genom_head = Array();
    public $genom_eyes = Array();
    public $genom_eyes_color = Array();

    public function __construct($parent1, $parent2) {
      $this->setId();

      //if (get_class($parent1)=="Cat" && get_class($parent2)=="Cat") {//генерация котика от стандартных котов
        $this->generateKittyfromCat($parent1, $parent2);

      //}

    }
    public function printKitty() {
      createImage(getPathBg($this->bg), getPathImageColor('tail', $this->tail, $this->color), getPathImageForm('tail', $this->tail),
        getPathImageColor('body', $this->body, $this->color), getPathImageForm('body', $this->body), getPathImageColor('head', $this->head, $this->color),
        getPathImageForm('head', $this->head), getPathImageColor('eyes', $this->eyes, $this->eyes_color), getPathImageForm('eyes', $this->eyes)
      );
    }

    public function generateKittyfromCat($cat1, $cat2) {//генерация котиков от стандартных котиков

      if (get_class($cat1)=='Kitty' && get_class($cat2)=='Kitty') {
        $this->genom_bg = array_merge($cat1->genom_bg, $cat2->genom_bg);
        $this->genom_color = array_merge($cat1->genom_color, $cat2->genom_color);
        $this->genom_tail = array_merge($cat1->genom_tail, $cat2->genom_tail);
        $this->genom_body = array_merge($cat1->genom_body, $cat2->genom_body);
        $this->genom_head = array_merge($cat1->genom_head, $cat2->genom_head);
        $this->genom_eyes = array_merge($cat1->genom_eyes, $cat2->genom_eyes);
        $this->genom_eyes_color = array_merge($cat1->genom_eyes_color, $cat2->genom_eyes_color);
      }
      else if (get_class($cat1)=='Kitty') {
        $this->genom_bg = $cat1->genom_bg;
        $this->genom_color = $cat1->genom_color;
        $this->genom_tail = $cat1->genom_tail;
        $this->genom_body = $cat1->genom_body;
        $this->genom_head = $cat1->genom_head;
        $this->genom_eyes = $cat1->genom_eyes;
        $this->genom_eyes_color = $cat1->genom_eyes_color;
      }
      else if (get_class($cat2)=='Kitty') {
        $this->genom_bg = $cat2->genom_bg;
        $this->genom_color = $cat2->genom_color;
        $this->genom_tail = $cat2->genom_tail;
        $this->genom_body = $cat2->genom_body;
        $this->genom_head = $cat2->genom_head;
        $this->genom_eyes = $cat2->genom_eyes;
        $this->genom_eyes_color = $cat2->genom_eyes_color;
      }


      $this->bg = $this->selectN($cat1->bg, $cat2->bg, 3, $this->genom_bg);//определили фон
      $this->color = $this->selectN($cat1->color, $cat2->color, 7, $this->genom_color);//определили цвет
      $this->tail = $this->selectN($cat1->tail, $cat2->tail, 3, $this->genom_tail);//определили форму хвоста
      $this->body = $this->selectN($cat1->body, $cat2->body, 3, $this->genom_body);//определили форму тела
      $this->head = $this->selectN($cat1->head, $cat2->head, 3, $this->genom_head);//определили форму головы
      $this->eyes = $this->selectN($cat1->eyes, $cat2->eyes, 4, $this->genom_eyes);//определим форму глаз
      $this->eyes_color = $this->selectN($cat1->eyes_color, $cat2->eyes_color, 5, $this->genom_eyes_color);//определим цвет глаз*/


    }
    public function selectN($gen1, $gen2, $k, &$genom) {
      $array = array_fill(0, 5, $gen1);
      $array1 = array_fill(0, 5, $gen2);

      $array = array_merge($array, $array1);
      $randN = rand(1, $k);
      array_push($array, $randN);

      $n = rand(0, 10);

      array_push($genom, $array[$n]);
      array_push($genom, $gen1);
      array_push($genom, $gen2);
      $genom = array_unique($genom);

      return $array[$n];
    }
    public function generateKittyfromKitty() {

    }
  }

?>
