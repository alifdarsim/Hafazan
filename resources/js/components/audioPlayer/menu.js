import audioPlayer from "./player.js";
import currentVerse from "../../audio.js";
import verse from "../verse.js";
import audio from "../../audio.js";

const reciterButton = document.querySelectorAll(".reciter-button");
const speedButton = document.querySelectorAll(".speed-button");
const scrollToVerseButton = document.querySelector("#scrollToVerse");
const highlightVerseButton = document.querySelector("#highlightVerse");
const highlightWordButton = document.querySelector("#highlightWord");
const downloadButton = document.querySelector("#download");

const menu = {
    init: function () {
        menu.setReciter();
        menu.setSpeed();
        menu.setOption();
        menu.setDownload();
    },

    setDownload: () => {
        downloadButton.addEventListener("click", (event) => {
            event.preventDefault();
            let audioFile = audio.getAudioUrl();
            let a = document.createElement('a');
            a.href = audioFile;
            a.download = `surah-${window.chapter}.mp3`;
            a.click();
        });
    },

    setSpeed: () => {
        speedButton.forEach((button) => {
            let speed = localStorage.getItem("audioSpeed");
            if (speed === button.querySelector(".speed").innerHTML) {
                button.querySelector("i").classList.add("fas", "fa-check");
            }
            button.addEventListener("click", function () {
                let speed = button.querySelector(".speed").innerHTML;
                speedButton.forEach((button) => {
                    let speed_val = button.querySelector(".speed").innerHTML;
                    button.querySelector("i").classList.remove("fas", "fa-check");
                    if (speed_val === speed) {
                        button.querySelector("i").classList.add("fas", "fa-check");
                        localStorage.setItem("audioSpeed", speed);
                        audio.setSpeed(speed);

                    }
                });
            });
        });
    },

    setOption: () => {
        // set highlight radio button to check if localStorage is true
        highlightVerseButton.checked = localStorage.getItem("highlightVerse") === "true";
        highlightWordButton.checked = localStorage.getItem("highlightWord") === "true";
        scrollToVerseButton.checked = localStorage.getItem("scrollToVerse") === "true";

        console.log(highlightVerseButton.checked, highlightWordButton.checked, scrollToVerseButton.checked)
        // set verse option
        verse.setIsVerseScroll(localStorage.getItem('scrollToVerse'));
        verse.setIsVerseHighlighted(localStorage.getItem('highlightVerse'));
        verse.setIsWordHighlighted(localStorage.getItem('highlightWord'));

        highlightVerseButton.addEventListener("change", () => {
            verse.setIsVerseHighlighted(highlightVerseButton.checked.toString());
        });
        highlightWordButton.addEventListener("change", () => {
            verse.setIsWordHighlighted(highlightWordButton.checked.toString());
        });
        scrollToVerseButton.addEventListener("change", () => {
            verse.setIsVerseScroll(scrollToVerseButton.checked.toString());
        });
    },

    setReciter: () => {
        reciterButton.forEach((button) => {
            let reciterId = localStorage.getItem("reciterId");
            if (reciterId === button.getAttribute("reciter-id")) {
                button.classList.add(
                    "bg-slate-300",
                    "dark:bg-navy-500",
                    "text-gray-700"
                );
            }
            button.addEventListener("click", function () {
                const reciterId = button.getAttribute("reciter-id");
                localStorage.setItem("reciterId", reciterId);
                reciterButton.forEach((button) => {
                    button.classList.remove(
                        "bg-slate-300",
                        "dark:bg-navy-500",
                        "text-gray-700"
                    );
                });
                button.classList.add(
                    "bg-slate-300",
                    "dark:bg-navy-500",
                    "text-gray-700"
                );
                audio.setAudioInfo(reciterId, window.chapter).then(r => {
                    audio.playVerse();
                });
            });
        });

    }
}

export default menu;
