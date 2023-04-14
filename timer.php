<?php
require 'vendor/autoload.php';

use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

$session = new Session(
    '94ebbaab63b44c19adb530869e231caa',
    '7b4fa26db56f4f3d981bf07621ffd636',
    'https://twitter.com/MathIzuki'
);

$api = new SpotifyWebAPI();

	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $minutes = $_POST["minutes"];
        $seconds = $_POST["seconds"];
        $bg = $_POST["bg"];
        $spotify = $_POST["spotify"];
    
        $_SESSION["bg"] = $bg;
    
        if (!empty($spotify)) {
            $session->requestCredentialsToken();
            $accessToken = $session->getAccessToken();
    
            $api->setAccessToken($accessToken);
    
            $playlistId = substr($spotify, strrpos($spotify, '/') + 1);
    
            $tracks = $api->getPlaylistTracks($playlistId)->items;
    
            $playlistTracks = array();
    

			$tracks = $api->getPlaylistTracks($playlistId);

			if (isset($tracks) && isset($tracks->items)) {
				$playlistTracks = array();

				foreach ($tracks->items as $track) {
					$playlistTracks[] = $track->track->uri;
				}

				$playlistString = implode(",", $playlistTracks);

				$_SESSION["spotify"] = $playlistString;
			}
			else {
				http_response_code(500);
    			echo "There was an error retrieving the playlist tracks. Please try again later.";
			}
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>
    Countdown Timer with Background and Spotify Playlist</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>

</head>
<body>
	<div class="container">
		<h1>Countdown Timer</h1>
		<div id="bg-preview" style="background-image: url('backgrounds/bg<?php echo $_SESSION['bg']; ?>.jpg')"></div>
		<div id="countdown"><?php echo $minutes . ":" . $seconds; ?></div>
		<audio id="spotify-player" src="" controls></audio>
	</div>
	<script>
		var countdown = document.getElementById("countdown");
		var minutes = <?php echo $minutes; ?>;
		var seconds = <?php echo $seconds; ?>;
		var bgPreview = document.getElementById("bg-preview");
		var bg = <?php echo $_SESSION['bg']; ?>;
		var audio = document.getElementById("spotify-player");	var timer = setInterval(function() {
		if (minutes == 0 && seconds == 0) {
			clearInterval(timer);
			audio.play();
		}
		else if (seconds == 0) {
			minutes--;
			seconds = 59;
		}
		else {
			seconds--;
		}
		
		countdown.innerHTML = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
	}, 1000);
	
	bgPreview.style.backgroundImage = "url('backgrounds/bg" + bg + ".jpg')";
</script>
</body>
</html>