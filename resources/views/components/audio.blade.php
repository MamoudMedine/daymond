<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
rel="stylesheet">
<div class="player">
    <div class="titles">
<!--         <h1>Homage</h1> -->
<!--         <h2>Dioula</h2> -->
    </div>
    <ul>
       <div class="bubble-arrow alt"></div>
        <li class="cover">
            <img src="http://i1285.photobucket.com/albums/a583/TheGreatOzz1/Hosted-Images/Noisy-Freeks-Image_zps4kilrxml.png"/>
        </li>
        <li class="button-items">
                <audio id="music" preload="auto" loop="false">
                    <source src="https://dl.dropbox.com/s/oswkgcw749xc8xs/The-Noisy-Freaks.mp3?dl=1" type="audio/mp3">
                    <source src="https://dl.dropbox.com/s/75jpngrgnavyu7f/The-Noisy-Freaks.ogg?dl=1" type="audio/ogg">
                </audio>
                <div class="audio-group">
                    <div class="controls">
                        <span id="play">
                            <i class="material-icons">play_arrow</i>
                        </span>
                        <span id="pause">
                            <i class="material-icons">pause</i>
                        </span>
                    </div>
                <div id="slider-timer">
                   <h1>Homage <small>-  Dioula</small></h1>
                    <div id="slider">
                        <div id="elapsed">
                        <span></span>
                    </div>
                    <div class="times">
                        <p id="timer">0:00</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<script>
    var music = document.getElementById("music");
    var playButton = document.getElementById("play");
    var pauseButton = document.getElementById("pause");
    var playhead = document.getElementById("elapsed");
    var timeline = document.getElementById("slider");
    var timer = document.getElementById("timer");
    var duration;
    pauseButton.style.visibility = "hidden";

    var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
    music.addEventListener("timeupdate", timeUpdate, false);

    function timeUpdate() {
        var playPercent = timelineWidth * (music.currentTime / duration);
        playhead.style.width = playPercent + "px";

        var secondsIn = Math.floor(((music.currentTime / duration) / 3.5) * 100);
        if (secondsIn <= 9) {
            timer.innerHTML = "0:0" + secondsIn;
        } else {
            timer.innerHTML = "0:" + secondsIn;
        }
    }

    playButton.onclick = function() {
        music.play();
        playButton.style.visibility = "hidden";
        pause.style.visibility = "visible";
        pause.style.background = "white";
    }

    pauseButton.onclick = function() {
        music.pause();
        playButton.style.visibility = "visible";
        pause.style.visibility = "hidden";
    }

    music.addEventListener("canplaythrough", function () {
        duration = music.duration;
    }, false);
</script>
