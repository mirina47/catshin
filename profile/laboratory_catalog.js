var login;
var accessArr = new Array();
var catArr = new Array();

function check() {
    console.log("ok");
}
var i = 1, j = 1, count_cats = document.getElementsByClassName('card').length, count_accessories = accessArr.length;
var count_cool_cat = catArr.length;
var k = 1;

function openBlock(evt, blockName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";  
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" not_active", "");
        tablinks[i].className = tablinks[i].className.replace(" active", " not_active");
        
    }
    document.getElementById(blockName).style.display = "flex";
    evt.currentTarget.className += " active";


    


    /*if (count_cats == 0 && count_accessories == 0) {
        document.querySelector(".active img").src = "images/vopros.png";
        document.querySelector(".not_active img").src = "images/vopros.png";
    }
    else if (count_cats != 0) {
        console.log("wooork");
        document.querySelector(".active img").src = ("../user_cat/"+ login + "/1.png");
        document.querySelector(".not_active img").src = "images/vopros.png";
    }*/
}


//let cards = document.getElementsByClassName('card');
//сonsole.log("Количество элеменотов в popup: " + cards.length);
function imgNextCat() {
    if(count_cats!=0) {
    i++;
    if (i === count_cats + 1) i = 1;
    document.getElementById("image_cat").src=("../user_cat/"+ login + "/" + i + ".png");
    document.querySelector(".active img").src = ("../user_cat/"+ login + "/" + i + ".png");
    }
}

function imgBackCat() {
    if(count_cats!=0) {
    i--;
    if (i === 0) i = count_cats;
    document.getElementById("image_cat").src=("../user_cat/"+ login + "/" + i + ".png");
    document.querySelector(".active img").src = ("../user_cat/"+ login + "/" + i + ".png");
    }
}

function imgNextAccessory() {
    if(count_accessories!=0) {
    j++;
    if (j === count_accessories + 1) j = 1;
    document.getElementById("image_accessory").src=("../layers/acsess/"+ accessArr[j-1] + ".png");
    document.querySelector(".active img").src = ("../layers/acsess/"+ accessArr[j-1] + ".png");
    }
}

function imgBackAccessory() {
    if(count_accessories!=0) {
    j--;
    if (j === 0) j = count_accessories;
    document.getElementById("image_accessory").src=("../layers/acsess/"+ accessArr[j-1] + ".png");
    document.querySelector(".active img").src = ("../layers/acsess/"+ accessArr[j-1] + ".png");
    }
}

function imgNextSpecialCat() {
    if(count_cool_cat!=0) {
    k++;
    if(k == (count_cool_cat+1)) k=1;
    document.getElementById('icon_cool_cat').src = ("../layers/cool_cats/"+ catArr[k-1] + ".png");
    document.getElementById('image_special_cat').src = ("../layers/cool_cats/"+ catArr[k-1] + ".png");
    }
}

function imgBackSpecialCat() {
    if(count_cool_cat!=0) {
    k--;
    if(k == 0) k=count_cool_cat;
    document.getElementById('icon_cool_cat').src = ("../layers/cool_cats/"+ catArr[k-1] + ".png");
    document.getElementById('image_special_cat').src = ("../layers/cool_cats/"+ catArr[k-1] + ".png");
    }
}





var isImage = sessionStorage.getItem('isImage');

//if (isImage !== null) document.getElementById("my_personal_cat").src="images/laboratory/catalog/cat" + $i + ".jpg";

function myPersonalCat() {
    document.getElementById("my_personal_cat").src=("../user_cat/"+ login + "/" + i + ".png");
    sessionStorage.setItem('isImage', '1');
}

function mePersonalAcsec() {


    /*$.ajax({
        url: 'get_login.php',         
        method: 'get',            
        dataType: 'html',          
        data: {
            cat: document.getElementById('personal_cat').src,
            ac
        },    
        success: function(data){  
            //alert(data);
            login = data;
            console.log(login);
            if (count_cats != 0) {
                document.querySelector(".active img").src = ("../user_cat/"+ login + "/1.png");
                document.getElementById('image_cat').src = ("../user_cat/"+ login + "/1.png");
            }
        }
    });*/
}

(function() {

    $.ajax({
        url: 'get_login.php',         
        method: 'get',            
        dataType: 'html',          
        data: {

        },    
        success: function(data){  
            login = data;
            //console.log(login);

            if (count_cats != 0) {
                document.querySelector(".active img").src = ("../user_cat/"+ login + "/1.png");
                document.getElementById('image_cat').src = ("../user_cat/"+ login + "/1.png");
            }
        }
    });

    $.ajax({
        url: 'get_cool_cat_num.php',         
        method: 'get',            
        dataType: 'html',          
        data: {
           
        },    
        success: function(data){  
            catArr = data.split(" ");
            catArr.shift();
            catArr = catArr.map(Number);
            console.log(catArr);
            count_cool_cat = catArr.length

            if(count_cool_cat !=0) {
                document.getElementById('icon_cool_cat').src = ("../layers/cool_cats/"+ catArr[count_cool_cat-1] + ".png");
                document.getElementById('image_special_cat').src = ("../layers/cool_cats/"+ catArr[count_cool_cat-1] + ".png");
            }
            else document.querySelector(".not_active img").src = ("images/laboratory/cat_icon1.png");
            
        }
    });
    
    $.ajax({
        url: 'get_access_num.php',         
        method: 'get',            
        dataType: 'html',          
        data: {
           
        },    
        success: function(data){  
            //alert(data);
            accessArr = data.split(" ");
            accessArr.shift();
            accessArr = accessArr.map(Number);
            //console.log(accessArr);
            count_accessories = accessArr.length

            if(count_accessories !=0) {
                document.querySelector(".not_active img").src = ("../layers/acsess/"+ accessArr[count_accessories-1] + ".png");
                document.getElementById('image_accessory').src = ("../layers/acsess/"+ accessArr[count_accessories-1] + ".png");
            }
            else document.querySelector(".not_active img").src = ("images/laboratory/cat_icon1.png");
                
            //document.querySelector(".not_active img").src = ("../layers/"+ login + "/1.png");
            //document.getElementById('image_cat').src = ("../user_cat/"+ login + "/1.png");
            
        }
    });
    


    let img = document.getElementById('image_cat');
    img.onclick = function() {
        document.getElementById('personal_cat').src = img.src;
    }


    let img_acses = document.getElementById('image_accessory');

    img_acses.onclick = function() {
        $.ajax({
            url: 'wearCat.php',         
            method: 'get',            
            dataType: 'html',          
            data: {
                cat_img: document.getElementById('personal_cat').src,
                acsess: img_acses.src
            },    
            success: function(data){  
                    document.getElementById('personal_cat').src = "personal_cat.png";
                
            }
        });
        //document.getElementById('personal_cat').src = img_acses.src;
    }


    
})()

