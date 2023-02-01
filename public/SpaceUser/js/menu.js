let menu = document.getElementById("SignOutId");
let account = document.getElementById("account");
let content = document.getElementById("container");
let retour = document.getElementById("retour");
let avancer = document.getElementById("avancer");
let repeat = document.getElementById("repeat");
let like = document.getElementById("like");
let likeAlbum = document.getElementById("likeAlbum");
let following = document.getElementById("buttonFollow");

account.addEventListener("click", function() {
    if (menu.style.display !== "none") {
        menu.style.display = "none";
        //document.body.style.overflow = 'auto';
    } else {
        menu.style.display = "block";
        //document.body.style.overflow = 'hidden';
    }
});


//play music

let music = document.getElementById("music");
let play = document.getElementById("play");
let playA = document.getElementById("playA");
let range = document.getElementById("rangeM");
let volume = document.getElementById("volume");
let curr_time = document.getElementById("curr_time");
let total_time = document.getElementById("total_time");
let mouseDownOnSlider = false;

repeat.addEventListener("click", function() {
    if(repeat.className == "fa-solid fa-repeat jerems") {
        repeat.className = "fa-solid fa-repeat";
        repeat.style.color = "#696969";
        music.loop= false;
    }else {
        repeat.className = "fa-solid fa-repeat jerems";
        repeat.style.color = "white";
        music.loop = true;
    }
});

like.addEventListener("click", function() {
    if(like.style.color == "white") {
        like.style.color = "#1ed760";
    }else {
        like.style.color = "white";
    }
});

function seekUpdate() {
    // Check if the current track duration is a legible number
    if (!isNaN(music.duration)) {

        // Calculate the time left and the total duration
        let currentMinutes = Math.floor(music.currentTime / 60);
        let currentSeconds = Math.floor(music.currentTime - currentMinutes * 60);
        let durationMinutes = Math.floor(music.duration / 60);
        let durationSeconds = Math.floor(music.duration - durationMinutes * 60);

        // Add a zero to the single digit time values
        if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
        if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
        if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
        if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

        // Display the updated duration
        curr_time.textContent = currentMinutes + ":" + currentSeconds;
}
}

play.addEventListener("click", function() {
    if(music.duration >= 0 && music.paused) {
        music.play();
        setInterval(seekUpdate, 1000);
        play.className = "fa-solid fa-circle-pause";
        if(playA){
            playA.className = "fa-solid fa-circle-pause";
        }
     } else {
        music.pause();
        clearInterval();
        play.className = "fa-solid fa-circle-play";
        if(playA){
            playA.className = "fa-solid fa-circle-play";
        }
     }
});


music.addEventListener("loadeddata", () => {
    range.value = 0;
    // Calculate the time left and the total duration
    let durationMinutes = Math.floor(music.duration / 60);
    let durationSeconds = Math.floor(music.duration - durationMinutes * 60);

    // Add a zero to the single digit time values
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
    if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

    // Display the updated duration
    total_time.textContent = durationMinutes + ":" + durationSeconds;
});

music.addEventListener("timeupdate", () => {
    if (!mouseDownOnSlider) {
      range.value = music.currentTime / music.duration * 100;
    }
});

music.addEventListener("ended", () => {
    play.className = "fa-solid fa-circle-play";
});

range.addEventListener("change", () => {
    const pct = range.value / 100;
    music.currentTime = (music.duration || 0) * pct;
    // Calculate the time left and the total duration
    let currentMinutes = Math.floor(music.currentTime / 60);
    let currentSeconds = Math.floor(music.currentTime - currentMinutes * 60);
    let durationMinutes = Math.floor(music.duration / 60);
    let durationSeconds = Math.floor(music.duration - durationMinutes * 60);

    // Add a zero to the single digit time values
    if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
    if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
    if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

    // Display the updated duration
    curr_time.textContent = currentMinutes + ":" + currentSeconds;
});

range.addEventListener("mousedown", () => {
    mouseDownOnSlider = true;
});

range.addEventListener("mouseup", () => {
    mouseDownOnSlider = false;
});

//volume
let blockVolume = document.getElementById("blockVolume");
let svg;

music.addEventListener("loadeddata", () => {
    volume.value = 1;
    music.volume = volume.value;
});

volume.addEventListener("change", () => {
    music.volume = volume.value;
});

blockVolume.addEventListener("click", () => {
    if(music.volume > 0){
        svg = volume.value;
        music.volume = 0;
        volume.value = 0;
        blockVolume.className = "fa-solid fa-volume-off";
        blockVolume.style.color = "#696969";
    }else{
        music.volume = svg;
        volume.value = svg;
        blockVolume.className = "fa-solid fa-volume-low";
        blockVolume.style.color = "white";
    }
});


//avancer reculer

avancer.addEventListener("click", function() {
    history.go(+1);
});

if(following){
    following.addEventListener("click", function() {
        if(following.innerText == "FOLLOW") {
            following.innerText = "FOLLOWING";
        }else {
            following.innerText = "FOLLOW";
        }
    });
}

if(playA){
    playA.addEventListener("click", function() {
        if(music.duration >= 0 && music.paused) {
            music.play();
            setInterval(seekUpdate, 1000);
            play.className = "fa-solid fa-circle-pause";
            playA.className = "fa-solid fa-circle-pause";
         } else {
            music.pause();
            clearInterval();
            play.className = "fa-solid fa-circle-play";
            playA.className = "fa-solid fa-circle-play";
         }
    });
}

if(retour){
    retour.addEventListener("click", function() {
        history.go(-1);
    });
}

//like likeAlbum

if(likeAlbum){
    likeAlbum.addEventListener("click", function() {
        if(likeAlbum.style.color == "white") {
            likeAlbum.style.color = "#1ed760";
        }else {
            likeAlbum.style.color = "white";
        }
    });
}

window.onscroll = function() {
    //alert(document.documentElement.scrollTop);
    document.getElementsByTagName("nav")[0].style.transition= ".3s all ease";
    if(document.documentElement.scrollTop > 21){
        document.getElementsByTagName("nav")[0].style.background="black";
    }else{
        document.getElementsByTagName("nav")[0].style.background="transparent";
    }
}

