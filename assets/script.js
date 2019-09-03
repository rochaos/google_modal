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

var url = window.location.href;

if (String(url).includes("google")){
    console.log(String(url));
    showModal();
}

document.addEventListener("mouseleave", showModal);