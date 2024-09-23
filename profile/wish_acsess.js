(function() {
    let stars = Math.floor(Math.random() * 10) + 1;
    console.log(stars);

    $.ajax({
        url: 'wish_acsess.php',         
        method: 'get',
        dataType: 'html',          
        data: {
            acsess: stars
        },                
        success: function(data){  
            //let name = data;
            document.getElementById('my_acsess').src = ("../layers/acsess/" + stars + ".png");
            //document.location='new_cat.html';
        }
    });
})()