window.onload = function() {
	var bgSelect = document.getElementById("bg");
	bgSelect.onchange = function() {
		var bgPreview = document.getElementById("bg-preview");
		bgPreview.style.backgroundImage = "url('backgrounds/bg" + bgSelect.value + ".jpg')";
	};
};

var audio = document.getElementById("spotify-player");

if (typeof playlist !== 'undefined') {
    audio.src = "https://embed.spotify.com/?uri=" + playlist;
    audio.play();
}