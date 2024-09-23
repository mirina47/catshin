(function() {
    let cat_n = Math.floor(Math.random() * 5) + 1;
    console.log(cat_n);

    $.ajax({
        url: 'wish_cool_cat.php',         
        method: 'get',
        dataType: 'html',          
        data: {
            cool_cat: cat_n
        },                
        success: function(data){
            let n = data;  
            //let name = data;
            document.getElementById('my_cool_cat').src = ("../layers/cool_cats/" + cat_n + ".png");
            if(n==5) {
                document.getElementById('cool_cat').innerHTML = "???";
                document.getElementById('cool_cat').onclick = function() {
                    document.location='story_end.html';
                }
            }
            //document.location='new_cat.html';
        }
    });


})()