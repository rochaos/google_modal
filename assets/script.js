var popped = false;

function showModal(){
    if (!popped){
        document.getElementsByClassName("modal")[0].classList.toggle("show");
        popped = true;
        document.getElementsByClassName("close")[0].addEventListener("click",hideModal);
    }
}

function hideModal(){
    if (popped){
        document.getElementsByClassName("modal")[0].classList.toggle("show");
    }
}

window.addEventListener("load",function(){
    var url = document.referrer;
    if (String(url).indexOf("google")!=-1){
        showModal();
    }
});


document.addEventListener("mouseout", function(e){
    if (e.relatedTarget===null){
        showModal();
    }
});