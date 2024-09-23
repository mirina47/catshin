(function() {
    window.addEventListener('load', init);   
    let timer = null;
    var i = 2;
    function slide_show() {
        if (i  > 5) {
            document.getElementById("my_story_end").addEventListener("click", back); 
            return;
        }
        document.getElementById("my_story_end").src = "images/story_end/" + i + ".png";
        console.log("images/story_end/" + i + ".png");
        i++;
   }
    
    function init() {
        console.log("start");
        setInterval(slide_show, 3000);
    }
    
    function back() {
        console.log("back");
        window.location.href = 'laboratory.php';
        return;
    }
})();





