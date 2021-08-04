<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
    	<title>RPG 禱告提醒工具v2</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js"></script>  
	<script type="text/javascript">
	$(document).ready(function(){
  var audioPlayStatus = 0;
  var countS = 1;
  $("#session").html(countS);
  var countB = 1;
  $("#break").html(countB);
  var pos = "RPG 禱告提醒時鐘";
  var countLama;
  var posLama;
  var count;
  $("#stats").html(pos);
  var clock = $(".timer").FlipClock(0, {
    countdown: false,
    clockFace: 'MinuteCounter',
    autoStart: false,
    callbacks: {
      interval: function(){
        if (clock.getTime() == 0){
          if (pos == "RPG 禱告提醒時鐘"){
            clock.setTime(countB*60);
            clock.start();
            pos = "break";
            $("#stats").html(pos);
          } else if (pos == "break"){
            clock.setTime(countS*60);
            clock.start();
            pos = "RPG 禱告提醒時鐘";
            $("#stats").html(pos);
          }
        }
      }
    }
  })
  //SESSION
  $("#sessInc").on("click", function(){
    if ($("#session").html() > 0){
      countS = parseInt($("#session").html());
      countS+=1;
      $("#session").html(countS);
      //clock.setTime(countS*60);
    }
  });
  $("#sessDec").on("click", function(){
    if ($("#session").html() > 1){
      countS = parseInt($("#session").html());
      countS-=1;
      $("#session").html(countS);
      //clock.setTime(countS*60);
    }
  });
  //BREAK
  $("#breakInc").on("click", function(){
    if ($("#break").html() > 0){
      countB = parseInt($("#break").html());
      countB+=1;
      $("#break").html(countB);
    }
  });
  $("#breakDec").on("click", function(){
    if ($("#break").html() > 1){
      countB = parseInt($("#break").html());
      countB-=1;
      $("#break").html(countB);
    }
  });
  $("#start").on("click", function(){
    if (count != countS || clock.getTime()==0){
      //clock.setTime(countS*60);
      pos="RPG 禱告中";
      $("#stats").html(pos);
    } else {
      pos = posLama;
      $("#stats").html(pos);
    }
    count = countS;
    clock.start();

    audioPlayStatus = 1;
    playAudio();
  });
  $("#stop").on("click", function(){
    clock.stop();
    countLama = clock.getTime();
    posLama = $("#stats").html();
    audioPlayStatus = 0;
  });
  $("#clear").on("click", function(){
    clock.stop();
    pos = "RPG 禱告提醒時鐘";
    $("#stats").html(pos);
    clock.setTime(0);
    audioPlayStatus = 0;
  });

/** my alarm **/
	    function playAudio() {
		var audio = document.getElementById("ding");
		console.log(audioPlayStatus);
                if (audioPlayStatus == 1) {
		    audio.muted = false;
		    audio.play();       //  播放元素的音效
		    //clockColorChange('PlayAudio');
		} else {
		    audio.muted = true;
		    return;
		}

	        var timeoutId = setTimeout(playAudio, countS * 1000 * 60);

	    }
/** my alarm End **/



});
	</script>
	<STYLE type="text/css">
	<!--
	@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
	@import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);
	@import url(https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.css);
	@import url(https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css);

body {
  background: url("bg.jpg") no-repeat center center fixed;
  background-size: cover; 
}
  /*
  background: url("") no-repeat center center fixed;
  */
.pomodoro {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 500px;  
  padding-top: 15px;
  padding-bottom: 25px;  
  background: rgba(255,255,255,0.3);
}
p {
  text-align: center;
}
.flip-clock-wrapper{
  max-width: 460px;
  margin: 3em auto 2em;
  display: flex;
  justify-content: center;
}
.col-md-4{
  display: flex;
  justify-content: center;
}
.col-md-2{
  display: flex;
  justify-content: center;
  height: 34px;
  align-items: center;
}
.counter{
  display: flex;
  justify-content: center;
}
.clock{
  margin-top: 30px;
}
.container {
  width: 500px;
}
.middle{
    display:inline-block;
}
#btns{
  display: flex;
  justify-content: center;
}
#stop {
  margin-left: 10px;
  margin-right: 10px;
}
.btn {
  background-color: #333333;
  color: #CCCCCC;
}
#sessInc, #sessDec, #breakInc, #breakDec {  
  font-weight: bold;
}
#stats {
  background-color: rgb(150,150,150,0.8);
  width: 220px;
  height: 70px;  
  border-radius: 10px;
  color: #000000;
  font-size: 24px;
  text-align: center;
  padding-top: 18px;
}
#statRow {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

	H1 {
	        font-family: ‘Noto Sans TC’, sans-serif;
		font-size: 30px;
		font-weight: 800;
	}

	.small {
	        font-family: ‘cwTeXYen’, sans-serif;
		width:340px;
		padding-top: 8px;
		font-size: 18px;
	}

	-->
	</STYLE>
    </head>
    <body>
<div class="pomodoro">

  <div class="row" id="statRow">
    <div id="stats"></div>
  </div>

  <div class="row">
      <div class="row"><p>設定幾分鐘提醒一次？<p></div>
      <div class="row counter">
        <div class="col-md-2">
          <button class="btn btn-default" id="sessDec">-</button>        
        </div>
        <div class="col-md-2">
          <div class="btn btn-default btn-lg" id="session"></div>
        </div>
        <div class="col-md-2">
          <button class="btn btn-default" id="sessInc">+</button>
        </div>
      </div>
  </div>
    
  <div id="clock" class="row">
    <div class="timer"><div class="middle"></div></div>
  </div>
  <div class="container">
    <div class="row" id="btns">
      <button class="btn btn-default btn-lg" id="start">開始</button>
      <button class="btn btn-default btn-lg" id="stop">停止</button>
      <button class="btn btn-default btn-lg" id="clear">清除</button>
    </div>
  </div>
     
</div>
    <audio id="ding" muted>
        <source src="ding.mp3" type="audio/mpeg">
    </audio>
    	
    </body>
</html>
