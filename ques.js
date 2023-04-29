  const duration = 300;
  var a=0;
  const clock = document.getElementById('clock');
  const sound=document.getElementById("ticsound");
  const over=document.getElementById('timeupsound');
  let timenow= duration;
  inter=null;

  function startt(){
    clock.textContent="300";
   inter=setInterval(() => {
    if(timenow<100){
  clock.textContent = "0"+timenow;}
    else{clock.textContent = timenow;}

   if(timenow%5==0 && timenow<62){
        sound.play();
    };
    timenow--;

  if (timenow < 0) {
    clearInterval(inter);
    sound.pause();
    clock.textContent = "000";
    over.play();
   }
  }, 1000);}

  startt();
  function submitt(){
    
  document.getElementById("scorebox").style.display="block";
    clearInterval(inter);
  var quizForm = document.getElementById("questions");
  var mark=0;
  var q1 = quizForm.elements["q1"].value;
	var q2 = quizForm.elements["q2"].value;
	var q3 = quizForm.elements["q3"].value;
  var q4 = quizForm.elements["q4"].value;
	var q5 = quizForm.elements["q5"].value;
	var q6 = quizForm.elements["q6"].value;
  var q7 = quizForm.elements["q7"].value;
	var q8 = quizForm.elements["q8"].value;
	var q9 = quizForm.elements["q9"].value;
	var q10 = quizForm.elements["q10"].value;

	if (q1 === "a") {
		mark++;
	}
	if (q2 === "a") {
		mark++;
	}
	if (q3 === "a") {
		mark++;
	}
  if (q4 === "a") {
		mark++;
	}
	if (q5 === "a") {
		mark++;
	}
	if (q6 === "a") {
		mark++;
	}if (q7 === "a") {
		mark++;
	}
	if (q8=== "a") {
		mark++;
	}
	if (q9 === "a") {
		mark++;
	}
  if (q10 === "a") {
		mark++;
	}
  
  document.getElementById("score").textContent=mark+"/10";
  document.getElementById("time").textContent=timenow+"seconds";
}
function closee(){
  location.replace("mainpagequizz.html");
 
}