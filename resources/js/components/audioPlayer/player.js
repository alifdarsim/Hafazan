import audio from '../../audio.js';
import verse from "../verse.js";

const player_element = document.querySelector('#audioPlayer');
const playButton = player_element.querySelector('#playButton');
const seekBar = player_element.querySelector('#seekBar');
const reciteButton = document.querySelector('#reciteButton');
const durationDisplay = player_element.querySelector('#durationDisplay');
const currentTimeDisplay = player_element.querySelector('#currentTimeDisplay');
const player = {
    // set click event for play button
    init: function (reciterId, chapter) {
        // get a translator list from api
        console.log("player init")
        audio.setAudioInfo(reciterId, chapter).then(r => {
            player.setPlayButton();
            player.setCloseButton();
            player.setNextButton();
            player.setPreviousButton();
            player.setReciteButton();
            player.setSeekBar();
            player.setOption();
        });
    },
    // set click event for play button
    setPlayButton: () => {
        playButton.addEventListener('click', function () {
            if (audio.isPaused()) {
                console.log("audio is paused");
                player.setAudioPlayerToPlay();
                audio.play();
            } else {
                console.log("audio is playing");
                player.setAudioPlayerToPause();
                audio.pause();
            }
        });
    },
    // set click event for close button
    setCloseButton: () => {
        const closeButton = player_element.querySelector('#closeButton');
        closeButton.addEventListener('click', function () {
            player.hide();
            audio.pause();
            verse.clearHighlights();
        });
    },
    // set click event for next button
    setNextButton: () => {
        const nextButton = player_element.querySelector('#nextButton');
        nextButton.addEventListener('click', function () {
            console.log("next button clicked")
            audio.nextVerse();
        });
    },
    // set click event for previous button
    setPreviousButton: () => {
        const previousButton = player_element.querySelector('#previousButton');
        previousButton.addEventListener('click', function () {
            audio.previousVerse();
        });
    },
    // hide menu
    hide: () => {
        player_element.classList.add('!hidden');
        audio.pause();
    },
    showPlayer: () => {
        player_element.classList.remove('!hidden');
    },
    setAudioPlayerToPlay: () => {
        playButton.innerHTML = '<i class="fas fa-pause text-white text-lg"></i>';
        playButton.classList.add('bg-teal-500');
        reciteButton.innerHTML = '<i class="fas fa-pause"></i><span class="ml-2">Recite Surah</span>';
    },
    setAudioPlayerToPause: () => {
        playButton.innerHTML = '<i class="fas fa-play text-lg"></i>';
        playButton.classList.remove('bg-teal-500');
        reciteButton.innerHTML = '<i class="fas fa-play"></i><span class="ml-2">Recite Surah</span>';
    },
    setReciteButton: () => {
        reciteButton.addEventListener('click', () => {
            if (audio.isPaused()) {
                audio.play();
                player.setAudioPlayerToPlay();
            }
            else {
                audio.pause();
                player.setAudioPlayerToPause();
            }
        });
    },
    setSeekBar: () => {
        seekBar.addEventListener('input', function () {
            audio.currentTime = 0
        });
    },
    setAudioProgress: (value) => {
        seekBar.value = value;
    },
    setDuration: (duration) => {
        durationDisplay.innerHTML = duration;
    },
    setCurrentTime: (currentTime) => {
        currentTimeDisplay.innerHTML = currentTime;
    },
    setOption: () => {
        // get the scrolltoverse option from localStorage
        let scrollToVerse = localStorage.getItem('scrollToVerse') === 'true';
        let highlightVerse = localStorage.getItem('highlightVerse') === 'true';
        let highlightWord = localStorage.getItem('highlightWord') === 'true';
        console.log(scrollToVerse, highlightVerse, highlightWord)
    }
}

export default player;
