<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <style>
      #h1{font-family:'Gill Sans';text-align: left; font-size:50px;color:black;opacity:2;}
      #h2{color:white;}
      #map {box-shadow:0 10px 10px #FBE4E0;width: 700px; height: 450px; display: flex; float:left;color:red; border-radius: 30px;border: 4px solid rgb(130, 132, 238);}
      #inputs{box-shadow:0 10px 10px #FBE4E0;color:#3D4578;float:right; text-align:center; width: 600px;height:450px;border-radius:30px;border: 4px solid rgb(130, 132, 238);}
      #start{ background-color:white;color:Black; border-radius:4px;width:content;font-size:28px;}
      #stop{ background-color:white;color:Black; border-radius:4px;width:content;font-size:28px;}
      .co{background:none;color:black;border:0.5px;}#lab{color:white;font-size:30px;}
      #busno{color:black;border-radius:5px;height:30px;font-size:27px;}
        body{
        background-image:url('bg.jpg');
      }
      .navbar{background:#568EA6;opacity:0.6;width:100%;box-shadow:0 10px 10px #FBE4E0;}
      #h3{font-weight:bold; font-size:25px;top:20px;right:50px;position:absolute;color:black;}
      </style>
  <style>
      .calculator {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(5, 1fr);
        gap: 10px;
        padding: 10px;
        width:400px;
        height:250px;
      }
      
      .calculator button {
        font-size: 1.5rem;
        padding: 10px;
        border-radius: 5px;
        border: none;
        outline: none;
        background-color: #fff;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      }
      .calculator button:active {
        background-color: #ddd;
        box-shadow: none;}
      
      
        .calculator #display {
        grid-column: 1 / span 3;
        text-align: right;
        font-size: 2rem;
        padding: 10px;
        background-color: #fff;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      }
      
      .calculator #clear {
        grid-column: 1 / span 2;
      }
      
    </style>

  </head>
  <body>
  <nav class="navbar">
  <div id="h1">&nbsp;<b>DRIVER LOCATION</b><div>
  <div><a id="h3" href="home.html">==>HOMEPAGE</a></div>
  </nav><br><br>
    <div id="map">
    </div>
   <div id=inputs>
    <h1 id="h2">Hello</h1><center>
    <div class="calculator">
      <div id="display">ENTER THE BUS NO</div>
      <button id="clear" onclick="clearr()">CLEAR</button>
      <button id="seven" onclick="seven()">7</button>
      <button id="eight" onclick="eight()">8</button>
      <button id="nine" onclick="nine()">9</button>
      <button id="four" onclick="four()">4</button>
      <button id="five" onclick="five()">5</button>
      <button id="six" onclick="six()">6</button>
      <button id="one" onclick="one()">1</button>
      <button id="two" onclick="two()">2</button>
      <button id="three" onclick="three()">3</button>
      <button id="zero" onclick="zero()">0</button>
    </div></center><br><br><br>
    <input type="button" id="start" value="START" onclick="fetchh()"/>
    <input type="button" id="stop" value="STOP" onclick="stopp()"/>

    </div>
   </body>
  <script>
    var bus=L.icon({
      iconUrl:"icon31.png",
      iconSize:[30,30],
      iconAnchor:[15,15]
    })
    var myloc=L.icon({
      iconUrl:"mylocation.png",
      iconSize:[30,30],
      iconAnchor:[15,15]
    })
    var map = L.map('map').setView([12.9709819,80.0423042], 15);
    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=J94sGuRVyXXwRgEQOHUG',{
      tileSize: 512,
      zoomOffset: -1,
      minZoom: 1,
      //attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
      crossOrigin: true
    }).addTo(map);
    //var busmarker=L.marker([12.9709819,80.0423042],{icon: bus}).addTo(map);
</script>


<script>
  var lat=0;var lon=0;

  function locate(){
    if (navigator.geolocation) {
   window.navigator.geolocation.getCurrentPosition(showLocation, checkError);
    } else {
    alert("The browser does not support geolocation");
   }
  }

  //for error check
 function checkError(error) {
    switch (error.code) {
    case error.PERMISSION_DENIED:
      alert("Please allow access to location");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location Information unavailable");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out");
     }
 }

 const showLocation = async (position) => {
  lat=`${position.coords.latitude}`;
  lon=`${position.coords.longitude}`;
  var mymarker=L.marker([lat,lon],{icon: myloc}).addTo(map);
  map.setView(new L.LatLng(lat,lon),13);
  var bus=31;
  fd.append("lat",lat);fd.append("lon",lon);fd.append("bus",a);
  }

let fd= new FormData();interval=null;var j=1;
function fetchh(){
  locate();
    document.getElementById("h2").innerHTML="STARTED SHARING LOCATION";
    interval=setInterval(function (){
        fetch("http://localhost:8080/frontend/connect.php",{method:"POST",body:fd}).then(function(response){
            return response.text();
        }).then(function(){console.log(j++);})
      },1000);}
    
  function stopp(){
    document.getElementById("h2").innerHTML="SHARING STOPPED";
    clearInterval(interval);
  }
    </script>
<script>
 var a="";
 function zero(){ a=a+"0";document.getElementById("display").innerText=a;}
 function one(){ a=a+"1";document.getElementById("display").innerText=a;}
 function two (){a=a+"2";document.getElementById("display").innerText=a;}
 function three(){ a=a+"3";document.getElementById("display").innerText=a;}
 function four(){ a=a+"4";document.getElementById("display").innerText=a;}
 function five(){ a=a+"5";document.getElementById("display").innerText=a;}
 function six(){ a=a+"6";document.getElementById("display").innerText=a;}
 function seven(){ a=a+"7";document.getElementById("display").innerText=a;}
 function eight(){a=a+"8";document.getElementById("display").innerText=a;}
 function nine(){ a=a+"9";document.getElementById("display").innerText=a;}
 function clearr(){a="";document.getElementById("display").innerText=a;}
</script>
</html>

