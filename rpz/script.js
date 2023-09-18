
var sideon;
const s=document.getElementById("side");
function side(){
    if(sideon==undefined || sideon==2){
    s.style.height="fit-content";
    s.style.zIndex=3;
    sideon=1;
    }
    else{
        sideon=2;
        s.style.height="0px";
        s.style.zIndex=-1
    }
}