<html>
    <head>
    	<title>RPG 禱告 - 時間提醒</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<STYLE>
	<!--
	#clock{
	    color:white;
	    font: 6em sans-serif;
	    background: black;
	    margin: 5px;
	    padding: 5px;
	    border: solid gray 2px;
	    border-radius: 10px;
	    width:500px;
	    text-align:center;
	 }
	.content {
		max-width: 500px;
		margin: auto;
        }
	.title {
		margin-top: 60px;
		text-align: center;
	}
	H1 {
		font-family: "LiGothic", "FangSong", Arial, serif;
		font-size: 40px;
	}

	p {
		font-family: "LiGothic", "FangSong", Arial, serif;
		font-size: 20px;
	}

	.btn {
		font-family: "LiGothic", "FangSong", Arial, serif;
		font-size: 16px;
	}

	-->
	 </STYLE>
	 <script>
	    var allowToPlayAudio = false;

	    function startTime(){
	      var today = new Date();
	      var hh = today.getHours();
	      var mm = today.getMinutes();
	      var ss = today.getSeconds();
	      hh = checkTime(hh);
	      mm = checkTime(mm);
	      ss = checkTime(ss);
	      document.getElementById('clock').innerHTML = hh + ":" + mm + ":" + ss;
	      var timeoutId = setTimeout(startTime, 500);
		if (ss == '00') {
		    playAudio();
                }
	    }

	    function checkTime(i){
	      if(i < 10) {
		i = "0" + i;
	      }
	      return i;
	    }      

	    function playAudio() {
		var audio = document.getElementById("ding");
		if (!allowToPlayAudio) 
		    return;
		if(!audio) 
		    return;  //  如果沒有按到對應的按鍵，則停止此函式
		audio.play();       //  播放元素的音效
	    }

	    function btnStart() {
		document.getElementById("btn-start").style.color = "grey";
		allowToPlayAudio = true;
		playAudio();
	    }

	  </script>
    </head>
  <body onload="startTime()" style="background-color: F88A73;">
    <div class="content">
	<div class="title"><H1>RPG 禱告 - 時間提醒</H1></div>
	<div id="clock"></div>
	<p>功能：每整分鐘敲鐘一次。</p>
	<div class="title"><button class="btn" onClick="btnStart();" id="btn-start">-- 開始禱告 --</button></div>
    </div>
    <audio id="ding" src="ding.mp3"></audio>
  </body>
</html>
