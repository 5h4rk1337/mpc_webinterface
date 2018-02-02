<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<!– aktueller Sender –>
<?php
sleep( 1 );
$Status = shell_exec('mpc current');
$Song = shell_exec('mpc -f %title% | head -n 1');
$Sender = shell_exec('mpc -f %name% | head -n 1');
    if (isset($_POST['play-button']))
    {
         shell_exec('mpc play');
    }
?>
<!– /aktueller Sender –>

<html>
	<head>
		<title>RaspiRadio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>RaspiRadio</h1>

						<p>
						<?php
						if ($Status == '')
						echo "Im Moment ist kein Sender aktiv.";
						else
						echo "$Song  &nbsp;•  $Sender";
						?>
						</p>

						<!-- <p>Security Chief &nbsp;&bull;&nbsp; Cyborg &nbsp;&bull;&nbsp; Never asked for this</p> -->
						<nav>
							<ul>
							<form method="post">
    <p>
        <!--button name="button" class="icon fa-step-backward">Run Perl</button-->
    </p>
    </form>
								<li><a href="prev.php" class="icon fa-step-backward"><span class="label">step-backward</span></a></li>
								<li><a href="play.php" class="icon fa-play"><span class="label">play</span></a></li>
								<!--li><a name="play-button" data-role="button" class="icon fa-play"><span class="label">play</span></a></li-->
								<li><a href="stop.php" class="icon fa-stop"><span class="label">sotp</span></a></li>
								<li><a href="next.php" class="icon fa-step-forward"><span class="label">step-forward</span></a></li>
								<li><a href="volume-down.php" class="icon fa-volume-down"><span class="label">volume-down</span></a></li>
								<li><a href="volume-up.php" class="icon fa-volume-up"><span class="label">volume-up</span></a></li>
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<!--footer id="footer">
						< span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer-->

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }

			$(document).ready(function() {
                $(".fa-play").click(function (e) {
                    e.preventDefault();
                    $(".icon").fadeOut();
                    $.ajax({
                        type: "GET",
                        url: $(this).attr('href') + "?ajax=1",
                        success: function(data) {
                            $(".icon").fadeIn();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            $(".icon").fadeIn();
                            alert("Fehler. Antwort vom Server: " + xhr.responseText + ". Status: " + textStatus);
                        }
                    });
                });
            });
		</script>
	</body>
</html>
