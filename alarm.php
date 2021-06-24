<html>
    <head>
    	<title>RPG 禱告-時間提醒工具</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-HJD5F7XB6H"></script>
	<script>
	    window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
	    gtag('js', new Date());

	    gtag('config', 'G-HJD5F7XB6H');
	</script>
	<STYLE>
	<!--
	@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
	@import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);

	html, body {
	  height: 100%;
	  margin: 0;
	}
	body {
	  background-color: #F88A73;
	  display: flex; /*使物件依序排列*/
	  flex-direction: column; /*使物件垂直排列*/
	}
	.wrapper {
	  flex-grow: 1; /*可佔滿垂直剩餘的空間*/
	}
	.footer {
	    margin: auto;
	    padding-bottom: 10px;
	}

	#clock{
	    color:white;
	    font: 4em sans-serif;
	    background: black;
	    margin: 5px;
	    padding: 5px;
	    border: solid gray 2px;
	    border-radius: 10px;
	    width:340px;
	    margin: auto;
	    text-align:center;
	 }
	.content {
		max-width: 500px;
		margin: auto;
		text-align:center;
        }
	.title {
                margin-top: 60px;
		text-align: center;
	}
	H1 {
	        font-family: ‘Noto Sans TC’, sans-serif;
		font-size: 30px;
		font-weight: 800;
	}

	.small {
	        font-family: ‘cwTeXYen’, sans-serif;
		width:340px;
		margin: auto;
		padding-top: 8px;
		text-align: left;
		font-size: 18px;
	}

	.btn {
		font-size: 16px;
	}

        .red-ss {
	    color: red;
	}

	-->
	 </STYLE>
	 <script>
	    var allowToPlayAudio = false;
	    var btnToggleIdx = true;

	    function startTime(){
	      var today = new Date();
	      var hh = today.getHours();
	      var mm = today.getMinutes();
	      var ss = today.getSeconds();
	      hh = checkTime(hh);
	      mm = checkTime(mm);
	      ss = checkTime(ss);

	      if (ss == '00') {
		  if (!btnToggleIdx)
		      ss = '<span class="red-ss">' + ss + '</span>';
		  playAudio();
	      }
	      document.getElementById('clock').innerHTML = hh + ":" + mm + ":" + ss;

	      var timeoutId = setTimeout(startTime, 500);
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

	    function btnToggle() {
		var btn = document.getElementById("btn1");
		var audio = document.getElementById("ding");

		if (btnToggleIdx == true) {
		    audio.muted = false;
		    btnToggleIdx = false;
		    btn.style.color = 'grey';
		    allowToPlayAudio = true;
		    playAudio();
		    btn.innerHTML = '-- 結束提醒 --';
		} else  {
		    audio.muted = true;
		    btnToggleIdx = true;
		    btn.disabled = false;
		    btn.style.color = 'black';
		    btn.innerHTML = '-- 開始禱告 --';
		}

	    }

	  </script>
    </head>
  <body onload="startTime()">
    <div class="wrapper">
	<div class="content">
	    <div class="title"><H1>RPG 禱告-時間提醒工具</H1></div>
	    <div id="clock"></div>
	    <p class="small">功能說明：<br/>每整分鐘鳴鐘一次提醒禱告者，以掌握調配自己禱告的時長。</p>
	    <div class="title"><button type="button" class="btn" onClick="btnToggle();" id="btn1">-- 開始禱告 --</button></div>
	</div>
    </div>
    <audio id="ding" muted>
        <source src="ding.mp3" type="audio/mpeg">
    </audio>
    <footer class="footer">
	Copyright © 2021 ciwasiban 版權所有
    </footer>
  </body>
</html>
