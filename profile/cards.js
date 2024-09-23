let count = 0;
(function() {


    
    let elements = document.querySelectorAll(".cats");
    let cat1 = document.getElementById('lab_cat1');
    let cat2 = document.getElementById('lab_cat2');
    //console.log("ok");

    for(let i = 0; i < elements.length; i++) {

        elements[i].onclick = function() {
            if (count == 2) {
                cat1.src = "images/vopros.png";
                cat2.src = "images/vopros.png";
                for(let j = 0; j < elements.length; j++) {
                    elements[j].style.opacity = "1";
                }
                count = 0;
            }

            if(count==0) {
                cat1.src = elements[i].src;
                elements[i].style.opacity = "0.5";
            }
            else if (count==1) {
                cat2.src = elements[i].src;
                elements[i].style.opacity = "0.5";
            }
            count++;


        }

       
    }


    $('#get_cat').click(function(){
        console.log('aaa');
        $.ajax({
            url: 'select_cat.php',         
            method: 'get',            
            dataType: 'html',          
            data: {
                cat1: cat1.src,
                cat2: cat2.src
            },    
            success: function(data){  
            }
        });

    })


    
})()