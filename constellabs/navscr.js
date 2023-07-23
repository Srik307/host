
var count=0;

document.addEventListener("scroll",()=>{
    if(document.documentElement.scrollTop>=90 && count==0){
    document.getElementById("nav").style.backgroundColor="black";
}
else{
    if(count==0){
    document.getElementById("nav").style.background="none";}}});

document.addEventListener("load",()=>{
    if(screen.width<800){
    document.getElementById("nav").style.backgroundColor="black";
    count++;
    }
})