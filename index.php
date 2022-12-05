<!DOCTYPE html>

<html>
<head>

<title>RaspiRadio</title>

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">
<meta charset="utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="white">
<link rel="apple-touch-icon" href="/favicon.ico">
<link rel="apple-touch-startup-image" href="images/splash.png">
<script src="js/jquery-3.6.0.min.js"></script>

<!-- 
<script>
const button = document.getElementById('slide');

button.onclick = function () {
  document.getElementById('Scroll').scrollLeft += 20;
};
</script>
 -->


<style>

html {
    -webkit-text-size-adjust: 100%; /* Prevent font scaling in landscape while allowing user zoom */
}

* {
	-moz-user-select: none; /* Firefox */
	-ms-user-select: none; /* Internet Explorer */
	-khtml-user-select: none; /* KHTML browsers (e.g. Konqueror) */
	-webkit-user-select: none; /* Chrome, Safari, and Opera */
	-webkit-touch-callout: none; /* Disable Android and iOS callouts*/
}

body {
	margin: 0px;
	position: fixed;
	top: 0;
	width: 100%
}

@media only screen and (max-height: 486px) {
  body {
  	position: relative;
  }
}


* {
	-webkit-tap-highlight-color: transparent;
}


.grid-container {
  display: grid;
  grid-template-columns: 2fr auto 0.5fr auto 0.5fr auto 2fr;
/*   background-color: #EEE; */
  padding-top: 30px;
  padding-bottom: 30px;
  padding-left: 10px;
  padding-right: 10px;
}

.grid-container > div {
/*   background-color: rgba(255, 255, 255, 0.8); */
  background-color: #FaFaFa;
  border-radius: 20px;
  box-shadow: 2px 2px 5px #eee;
  transition: all .2s ease-in-out;
}


.grid-container > div:active {
	box-shadow: 1px 1px 2px #eee;
	transform: scale(0.95);
}


.scrolling-wrapper {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: scroll;
  padding-top: 10px;
  padding-bottom: 10px;
/*   background-color: #EEE; */
  -webkit-overflow-scrolling: touch;
/* 
  &::-webkit-scrollbar {
  display: none;
  }
 */

.card {
    flex: 0 0 auto;
  } 
}



h1, p {
  text-align: center;
  font-family: helvetica;
}

.sender {
  border-radius: 20px;
  margin-right: 15px;
  margin-left: 15px;
  width: 150px;
  height: auto;
  box-shadow: 2px 2px 10px #777;
  transition: all .2s ease-in-out;
}

.sender:active {
	box-shadow: 1px 1px 3px #333;
	transform: scale(0.97);
}


.button {
    margin: 15px;
    display: block;
}

p.status {
	min-height: 1em;
}

</style>
</head>


<body ontouchstart="">

<h1>RaspiRadio</h1>

<p class="status" id="status"></p>

<p class="status" id="song"></p>

<p class="status" id="sender"></p>

<p class="status" id="volume"></p>



<div class="grid-container">
  <a class="grid-item"></a>
  <div><a href="play-pause.php"		class="grid-item"><img id="play-or-pause-button" class="button" src="images/controll/pause-blue.svg" width="auto" height="50"></a></div>
  <a class="grid-item"></a>
  <div><a href="volume-down.php"	class="grid-item"><img class="button" src="images/controll/low-vol-blue.png" width="auto" height="50"></a></div>
  <a class="grid-item"></a>
  <div><a href="volume-up.php"		class="grid-item"><img class="button" src="images/controll/up-vol-blue.png" width="auto" height="50"></a></div>
  <a class="grid-item"></a>
</div>

<div class="scrolling-wrapper">
  <div><a href="switch-sender.php?sender_id=1"	class="card"><img class="sender" src="images/streams/live.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=2"	class="card"><img class="sender" src="images/streams/harte-saite.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=3"	class="card"><img class="sender" src="images/streams/wacken.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=4"	class="card"><img class="sender" src="images/streams/parabelritter.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=5"	class="card"><img class="sender" src="images/streams/punk.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=6"	class="card"><img class="sender" src="images/streams/mittelalter.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=7"	class="card"><img class="sender" src="images/streams/queen.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=8"	class="card"><img class="sender" src="images/streams/southern.png"></a></div>
  <div><a href="switch-sender.php?sender_id=9"	class="card"><img class="sender" src="images/streams/death.png"></a></div>
  <div><a href="switch-sender.php?sender_id=10"	class="card"><img class="sender" src="images/streams/myrock.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=11"	class="card"><img class="sender" src="images/streams/dlf.jpg"></a></div>
  <div><a href="switch-sender.php?sender_id=12"	class="card"><img class="sender" src="images/streams/rockland.png"></a></div>
</div>

<script>
		// Alles aktualisieren
		function updateStatus() {
			//console.log("updateStatus");
			$.ajax({
					url: "status.php",
					success: function(data) {
						//console.log(data);
						var data = $.parseJSON(data);
						//console.log(data);
						
						var p_status = $("#status");
						var p_song = $("#song");
						var p_sender = $("#sender");
						var p_volume = $("#volume");
						var img_play_or_pause_button = $("#play-or-pause-button");
						
						//console.log(data);
						if (data.status == null) {
							p_status.text("Im Moment ist kein Sender aktiv.").show();
							p_song.text("");
							p_sender.text("");
						} else {
							p_status.text("");				
							p_song.text(data["song"]);
							p_sender.text(data["sender"]);
						}
						
						p_volume.text(data["volume"]);
						
						if (data.play_status == "playing") {
							img_play_or_pause_button.attr('src', 'images/controll/pause-blue.svg');
						} else {
							img_play_or_pause_button.attr('src', 'images/controll/play-blue.svg');
						}
						
						//$("img").attr('src', 'images/controll/pause-blue.png');
					},
                    error: function(xhr, textStatus, errorThrown)
                    {
                        alert("Fehler. Antwort vom Server: " + xhr.responseText + ". Status: " + textStatus);
                    }
            });
		}
			// Volume aktualisieren.
			function updateStatusVolume() {
			//console.log("updateStatus");
			$.ajax({
					url: "status-volume.php",
					success: function(data) {
						//console.log(data);
						var data = $.parseJSON(data);
						//console.log(data);
						
						var p_volume = $("#volume");
						//var img_play_or_pause_button = $("#play-or-pause-button");
						
						//console.log(data);
						
						p_volume.text(data["volume"]);

					},
                    error: function(xhr, textStatus, errorThrown)
                    {
                        alert("Fehler. Antwort vom Server: " + xhr.responseText + ". Status: " + textStatus);
                    }
            });
		}

		// Quasi "onload" alles aktualisieren. 
		$(document).ready(function() {
             $("a.card").click(function (e) {
                  e.preventDefault();
                  $.ajax({
                      url: $(this).attr('href') + "?ajax=1",
                      success: function(data) {
                      		updateStatus();
                      },
                      error: function(xhr, textStatus, errorThrown)
                      {
                          alert("Fehler. Antwort vom Server: " + xhr.responseText + ". Status: " + textStatus);
                      }
                  });
              });
              
              updateStatus();
          });
        
        // Bei klick auf Play/Pause, lauter, oder leiser die Anzeige für Volume aktualisieren.
		$("a.grid-item").click(function (e) {
                  e.preventDefault();
                  $.ajax({
                      url: $(this).attr('href') + "?ajax=1",
                      success: function(data) {
                      		updateStatus();
                      },
                      error: function(xhr, textStatus, errorThrown)
                      {
                          alert("Fehler. Antwort vom Server: " + xhr.responseText + ". Status: " + textStatus);
                      }
                  });
                  updateStatusVolume();
		});
        
        // Alle 5s den Status aktualisieren  
        $(document).ready(function() {              
              setInterval(updateStatus, 6000);
        });
          
</script>

</body>
</html>
