import AudioPlayer from "../../components/audioPlayer/player.js";
import {verses, verse_button} from "../../components/verse.js";
import RightSideBar from "../../components/rightSideBar.js";
import Menu from "../../components/audioPlayer/menu.js";

// set a default option if not exist
if (localStorage.getItem('translatorId') === null) localStorage.setItem('translatorId', 131);
if (localStorage.getItem('reciterId') === null) localStorage.setItem('reciterId', 7);
if (localStorage.getItem('audioSpeed') === null) localStorage.setItem('audioSpeed', 1);
if (localStorage.getItem('scrollToVerse') === null) localStorage.setItem('scrollToVerse', true);
if (localStorage.getItem('highlightVerse') === null) localStorage.setItem('highlightVerse', true);
if (localStorage.getItem('highlightWord') === null) localStorage.setItem('highlightWord', true);

// init right sidebar
let rightSideBar = RightSideBar();
rightSideBar.init();

// init verse component
let versess = verses;
versess.init(window.chapter, localStorage.getItem('translatorId'));

// init audio player
let audioPlayer = AudioPlayer;
audioPlayer.init(localStorage.getItem('reciterId'), window.chapter, localStorage.getItem('audioSpeed'));
audioPlayer.hide();

// init audio menu
let menu = Menu;
menu.init();

// get the scroll to a verse option from localStorage
let scrollToVerse = localStorage.getItem('scrollToVerse') === 'true';
let highlightVerse = localStorage.getItem('highlightVerse') === 'true';
let highlightWord = localStorage.getItem('highlightWord') === 'true';
audioPlayer.setOption(scrollToVerse, highlightVerse, highlightWord);
