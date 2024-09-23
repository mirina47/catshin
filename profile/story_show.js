(function() {
    window.addEventListener('load', init);   
    let timer = null;
    var i = 2;
    function slide_show() {
        if (i  > 7) {
            document.getElementById("my_story_start").addEventListener("click", back); 
            return;
        }
        document.getElementById("my_story_start").src = "images/story_start/" + i + ".png";
        console.log("images/story_start/" + i + ".png");
        i++;
   }
    
    function init() {
        console.log("start");
        setInterval(slide_show, 3000);
    }
    
    function back() {
        console.log("back");
        window.location.href = 'index.html';
        return;
    }
})();





