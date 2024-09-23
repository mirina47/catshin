(function() {
    let btn = document.getElementById("wish");

    let stars = Math.floor(Math.random() * 3) + 1;
    console.log(stars);

    
    if (stars == 1) {

        btn.onclick = function() {
            console.log("aa");
            $.ajax({
                url: 'wish.php',         
                method: 'get',               
                success: function(data){  

                    document.location='new_cat.html';
                }
            });

        }
    }
    else if (stars == 2) {
        btn.onclick = function() {
            document.location='new_acsess.html';
        }
        
    }
    else {
        btn.onclick = function() {
            document.location='new_cool_cat.html';
        }
    }
})()
