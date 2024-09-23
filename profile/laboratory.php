<?php
    session_start();
    require_once('vendor/connect.php');
    require_once('../cat.php');
    //include 'signin.php';
    ini_set('display_errors', '1');
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Лаборатория</title>
        <link href="index.css" type="text/css" rel="stylesheet" />
        <link href="laboratory.css" type="text/css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.3">
        <script src="jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="laboratory_catalog.js" type="text/javascript"></script>
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <!--<script src="laboratory_catalog.js" type="text/javascript"></script>-->
        
    </head>
    
    <body>
        <p id="pic1" class="help">www</p>
        <p id="pic2" class="help">www</p>
        <div class="all">
            <div class="laboratory_header">   
                <div class="laboratory_ul">
                    <div class="laboratory_menu">
                        <ul>
                            <li><img src="images/main_page/user_icon.png" alt="user icon"></li>
                            <li><a href="index.html">Главная</a><br><p class="user-name">Пользователь: <?= $_SESSION['user']['name']?></p></li>
                        </ul> 
                    </div>
                    <div class="quantity">
                        <ul>
                            <li>Общее количество котиков: 
                                <?php
                                   $name_table = $_SESSION['user']['name'];
                                   $sql = "SELECT COUNT(1) FROM $name_table";
                                   $ans = mysqli_query($connect, $sql);
                                   $num_rows = mysqli_fetch_row( $ans )[0];

                                   $name_table = $_SESSION['user']['name']."_cool";
                                   $sql = "SELECT COUNT(1) FROM $name_table";
                                   $ans = mysqli_query($connect, $sql);
                                   $num_rows2 = mysqli_fetch_row( $ans )[0];                                   
                                   echo $num_rows+$num_rows2;
                                ?>
                            </li>
                            <li>Количество редких котиков: 
                                <?php
                                    $name_table = $_SESSION['user']['name']."_cool";
                                    $sql = "SELECT COUNT(1) FROM $name_table";
                                    $ans = mysqli_query($connect, $sql);
                                    $num_rows = mysqli_fetch_row( $ans )[0];
                                    echo $num_rows;
                                ?>
                            </li>
                            <li>Количество аксессуаров: 
                                <?php
                                     $name_table = $_SESSION['user']['name']."_acces";
                                     $sql = "SELECT COUNT(1) FROM $name_table";
                                     $ans = mysqli_query($connect, $sql);
                                     $num_rows = mysqli_fetch_row( $ans )[0];
                                     echo $num_rows;
                                ?>
                            </li>
                            <li id="exit"><a href="index.html">Выйти из аккаунта</a></li>
                            <!--<li>Количество полученных аксессуаров</li>-->
                        </ul> 
                    </div>
                </div>
                <div class="personal_cat">
                    <img id="personal_cat" src="images/laboratory/personal_cat.png" alt="user icon">
                </div>
                <div class="wish_star">
                    <input class="wish_button" type="image" src="images/laboratory/pray.png" alt="Кнопка «Play»" onclick="document.location='wish.html'">
      
                </div>
                
            </div> 
                
            <div id="my_catalog" class="laboratory_catalog">
                <h2>Каталог</h2>
                <div class="cats_accessories">
                    <!-- Tab links -->
                    <div class="tab">
                        <button class="tablinks active" onclick="openBlock(event, 'my_cats')">
                            <img src="images/laboratory/cat_icon1.png" alt="button icon">
                        </button>
                        <button class="tablinks not_active" id="access" onclick="openBlock(event, 'my_accessories')">
                        <!--onclick="openBlock(event, 'my_accessories')"-->
                            <img src="images/laboratory/cat_icon2.png" alt="button icon">
                        </button>
                        <button class="tablinks not_active" onclick="openBlock(event, 'my_special_cats')">
                            <img id="icon_cool_cat" src="images/laboratory/cat_icon2.png" alt="button icon">
                        </button>
                        
                    </div>
                        <!-- Tab content -->
                    <div id="my_cats" class="tabcontent">
                        <button id="back_cat" class="article-select" onClick="imgBackCat();">Назад</button>
                        <img id="image_cat" src="images/vopros.png" alt="cat" onclick="myPersonalCat();">
                        <button id="next_cat" class="article-select" onClick="imgNextCat();">Вперед</button>
                    </div>

                    <div id="my_accessories" class="tabcontent">
                        <button id="back_accessory" class="article-select" onClick="imgBackAccessory();">Назад</button>
                        <img id="image_accessory" src="images/vopros.png" alt="cat">
                        <button id="next_accessory" class="article-select" onClick="imgNextAccessory();">Вперед</button>
                    </div>

                    <div id="my_special_cats" class="tabcontent">
                        <style>
                            .laboratory_catalog .cats_accessories #my_special_cats {
                                display: none;
                        }
                        </style>
                        <button id="back_special_cat" class="article-select" onClick="imgBackSpecialCat();">Назад</button>
                        <img id="image_special_cat" src="images/vopros.png" alt="cat">
                        <button id="next_special_cat" class="article-select" onClick="imgNextSpecialCat();">Вперед</button>
                    </div>
                    

                    
                </div>
                <!--<div class="Puhlya">
                    <img src="images/laboratory/Puhlya.png" alt="Puhlya">
                </div>-->
            </div>
                
            
            <div id="my_laboratory" class="laboratory_h">
                <h2>Лаборатория</h2>  
            </div>
         

            <?php
                $firstСat = 0; //отвечает за выбранного кота в одной из двух карточек
            ?>
            <div class="laboratory_creation">
                <div class="laboratory_cats">
                    <div class="laboratory_cat1">
                        <a href="#popup"><img id="lab_cat1" src="images/vopros.png" alt="cat 1" class="parent"></a>
                        <h2>Кот 1</h2>
                    </div>
                

                    <div class="laboratory_cat2">
                        <a href="#popup"><img id="lab_cat2" src="images/vopros.png" alt="cat 2" class="parent"></a>
                        <h2>Кот 2</h2>
                    </div> 
                </div>
                
                
                <div class="laboratory_button">
                        <a onclick="document.location='new_cat.html'"><button id="get_cat">Призвать</button></a>
                        <!--onclick="document.location='new_cat.html'"-->
                </div>
                
                
            </div>
            
            <div class="footer">
                <p>
                    <a href="index.html">Главная</a>
                    <a href="wish.html">Молитвы</a>
                    <a href="laboratory.php#my_catalog">Каталог</a>
                    <a href="laboratory.php#my_laboratory">Лаборатория</a>
                    <a href="registration.php">Регистрация</a>
                </p>
            </div>
        </div>

        <div id="popup" class="popup">
            <div class="popup_body">
                <div class="popup_content">
                    <a id="close" href="#my_laboratory" class="popup_close">X</a>
                    <div class="title">
                        <p>Выберите кота</p>
                    </div>
                    <div class="popup_text">
                        <div class="cats_card">
                            <?php
                                $name_table = $_SESSION['user']['name'];
                                $sql = "SELECT * FROM $name_table";

                                $k = 0;
                                if($result = $connect->query($sql)){
                                    foreach($result as $row){
                                        
                                        $cat1 = new Cat($row["bg"], $row["color"], $row["tail"], $row["body"],
                                        $row["head"], $row["eyes"], $row["eyes_color"]);

                                        $cat1->printCat();
                                        
                                        $globalPath = "../user_cat/".$name_table."/".$row["id"].".png";
                                        //echo $globalPath;
                                        $nRow = $row["id"];
                                        $updateCat = "UPDATE `$name_table` SET `cat` = '$globalPath' WHERE `id` = '$nRow'";
                                        $connect->query($updateCat);

                                        if (!file_exists($globalPath))
                                            rename("../result.png", $globalPath);
                                        
                                        $id_card = $row["id"];
                                        echo "
                                            <button class='card'>
                                                
                                                <a href='#popup' id='card1'><img src='$globalPath' class='cats'></a>
                                            </button>
                                            ";
                                            
                                    
                                        
                                        /*$cat1 = new Cat(3, 1, 2, 1, 2, 1, 2);
                                        $cat2 = new Cat(2, 2, 3, 1, 3, 4, 3);
                                        $kitty = new Kitty($cat1, $cat2);
                                        $kitty2 = new Kitty($cat1, $kitty);
                                        $kitty3 = new Kitty($kitty, $kitty2);
                                        $kitty3->printKitty();
                                        //$kitty->printKitty();*/
                                        $k++;
                                        //echo "<script> console.log(1); </script>";
                                    }
                                    if ($k==0) {
                                        echo "<p class='cat_msg'>".'У вас нет котиков для скрещивания'."</p>";
                                        exit();
                                    }

                                    if($k==1) {
                                        echo "<p class='cat_msg'>".'У вас недостаточно котиков для скрещивания'."</p>";
                                        echo "
                                            <style> 
                                                .card {
                                                    display:none;
                                                }
                                            </style>
                                        ";
                                    }
                                }
                                else echo "error";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="cards.js" type="text/javascript"></script>
    <script src="laboratory_catalog.js" type="text/javascript"></script>
</html>