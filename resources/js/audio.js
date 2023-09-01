import axios from 'axios';
import audioPlayer from "./components/audioPlayer/player.js";
import verse from "./components/verse.js";

const _audio = document.querySelector("#quranAudio");
let audioInfo = null;
let audioTimer = null;
let currentVerse = null;
let currentWord = null;

const audio = {
    currentVerse: currentVerse,
    setAudioInfo: async function (reciterId, chapter) {
        try {
            const response = await axios.get(`https://api.qurancdn.com/api/qdc/audio/reciters/${reciterId}/audio_files?chapter=${chapter}&segments=true`);
            audioInfo = response.data.audio_files[0];
            _audio.src = audioInfo.audio_url;
            return audioInfo;
        } catch (error) {
            throw error; // Handle or log the error as needed
        }
    },
    // get audio url
    getAudioUrl: () => _audio.src,

    // get an audio verse segment and play it
    playVerse: (verse = null) => {
        if (verse === null) verse = currentVerse;
        _audio.pause();
        let info = audioInfo.verse_timings.find((v) => v.verse_key === verse);
        let start = 0;
        if (info !== undefined) start = info.timestamp_from;
        audioPlayer.showPlayer();
        audioPlayer.setAudioPlayerToPlay();
        audio.play(start);
    },

    // pause audio
    pause: () => _audio.pause(),
    // check if audio is paused
    isPaused: () => _audio.paused,

    // play audio
    play: (start = null, end = null) => {
        console.log("audio is start");
        clearTimeout(audioTimer);
        // _audio.changeAudioPlayButton("play");
        // _audio.showPlayer();
        if (start !== null) _audio.currentTime = start / 1000;
        if (end !== null) {
            audioTimer = setTimeout(() => {
                _audio.pause();
            }, end - start);
        }
        _audio.play();
        audio.setSpeed(localStorage.getItem("audioSpeed"));

        audio.getOnVerseChangedListener(() => {
            verse.clearHighlights();
            verse.addVerseHighlight(currentVerse);
            verse.scrollToVerse(currentVerse);
        });

        audio.getOnWordChangedListener((verseKey, word) => {
            verse.setRecitedWord(currentVerse, word);
        });

        audio.getTimeUpdateListener(() => {
            audioPlayer.setCurrentTime(audio.formatTime(_audio.currentTime));
            audioPlayer.setAudioProgress((_audio.currentTime / _audio.duration) * 100);
        });

        audioPlayer.setDuration(audio.formatTime(_audio.duration));

        audio.setOnEndedListener(() => {
            audioPlayer.setAudioPlayerToPause();
            verse.clearHighlights();
        });
    },

    // listen to audio time update and get current verse
    getOnVerseChangedListener: (callback) => {
        _audio.addEventListener("timeupdate", () => {

            if (_audio.currentTime === 0) return;
            let segments = audioInfo.verse_timings;
            let segmented_current_verse = segments.find(
                (e) =>
                    e.timestamp_from <= _audio.currentTime * 1000 + 1 &&
                    e.timestamp_to >= _audio.currentTime * 1000 + 1,
            );
            if (segmented_current_verse === undefined) return;
            if (segmented_current_verse.verse_key !== currentVerse) {
                currentVerse = segmented_current_verse.verse_key;
                callback(segmented_current_verse.verse_key);
            }
        });
    },

    // listen to audio time update and get current word
    getOnWordChangedListener: (callback) => {
        _audio.addEventListener("timeupdate", () => {
            if (_audio.currentTime === 0) return;
            let info = audioInfo.verse_timings;
            let timing = info.find(
                (e) =>
                    e.timestamp_from <= _audio.currentTime * 1000 + 1 &&
                    e.timestamp_to >= _audio.currentTime * 1000 + 1,
            );
            if (timing === undefined) return;
            let verse_key = timing.verse_key;
            let segmented = timing.segments;
            let current_word = segmented.find(
                (e) =>
                    e[1] <= _audio.currentTime * 1000 + 1 &&
                    e[2] >= _audio.currentTime * 1000 + 1,
            );
            if (
                current_word !== undefined &&
                current_word[0] !== currentWord
            ) {
                currentWord = current_word[0];
                callback(verse_key, current_word[0]);
            }
        });
    },

    // get time update
    getTimeUpdateListener: (callback) => {
        _audio.addEventListener("timeupdate", () => {
            callback(_audio.currentTime);
        });
    },

    nextVerse: () => {
        console.log(currentVerse)
        audio.playVerse(audio.incrementKey(currentVerse, true));
    },

    previousVerse: () => {
        console.log(currentVerse)
        audio.playVerse(audio.incrementKey(currentVerse, false));
    },

    incrementKey: (input, increment) => {
        const [x, y] = input.split(":").map(Number);
        if (increment) return `${x}:${y + 1}`;
        else return `${x}:${y - 1}`;
    },

    formatTime: (time) => {
        const minutes = Math.floor(time / 60);
        const seconds = Math.floor(time % 60);
        return `${minutes}:${seconds < 10 ? "0" + seconds : seconds}`;
    },

    // set audio end event
    setOnEndedListener: (callback) => {
        _audio.addEventListener("ended", () => {
            callback();
        });
    },

    setSpeed: (speed) => {
        _audio.playbackRate = speed;
    }

}

export default audio;
