import AudioPlayer from "../../components/audioPlayer/player.js";
import Verse from "../../components/verse.js";
import RightSideBar from "../../components/rightSideBar.js";
import Menu from "../../components/audioPlayer/menu.js";

// set a default option if not exist
if (localStorage.getItem('translatorId') === null) localStorage.setItem('translatorId', 131);
if (localStorage.getItem('reciterId') === null) localStorage.setItem('reciterId', 7);
if (localStorage.getItem('audioSpeed') === null) localStorage.setItem('audioSpeed', 1);
if (localStorage.getItem('scrollToVerse') === null) localStorage.setItem('scrollToVerse', true);
if (localStorage.getItem('highlightVerse') === null) localStorage.setItem('highlightVerse', true);
if (localStorage.getItem('highlightWord') === null) localStorage.setItem('highlightWord', true);

let rightSideBar = RightSideBar();
rightSideBar.init();

let verse = Verse;
verse.init(window.chapter, localStorage.getItem('translatorId'));

let audioPlayer = AudioPlayer;
audioPlayer.init(localStorage.getItem('reciterId'), window.chapter, localStorage.getItem('audioSpeed'));
let menu = Menu;
menu.init();

// get the scrolltoverse option from localStorage
let scrollToVerse = localStorage.getItem('scrollToVerse') === 'true';
let highlightVerse = localStorage.getItem('highlightVerse') === 'true';
let highlightWord = localStorage.getItem('highlightWord') === 'true';
audioPlayer.setOption(scrollToVerse, highlightVerse, highlightWord);

// init components
// let menu = AudioPlayer();
// let verse = Verse();
// let rightSideBar = RightSideBar();
//
// // init audio menu
// menu.init(localStorage.getItem('reciterId'), window.chapter, localStorage.getItem('audioSpeed'));
//
// menu.getOnOptionsChangedListener((option) => {
//     verse.setOption(option.scrollToVerse, option.highlightVerse, option.highlightWord)
//     localStorage.setItem('reciteOption', JSON.stringify(option));
// });
// menu.getOnVerseChangedListener((verseKey) => {
//     console.log(verseKey)
//     verse.setRecitedVerse(verseKey);
// });
// menu.getOnWordChangedListener((verseKey, word) => {
//     verse.setRecitedWord(verseKey, word);
// });
// menu.getOnAudioEndedListener(() => {
//     verse.setRecitedVerse(null);
//     verse.setRecitedWord(null, null);
// });
//
// verse.init(window.chapter, localStorage.getItem('translatorId'));
// verse.buttonPlayClick((verse_key) => {
//     menu.playVerse(verse_key);
// });
//
// let reciteOption = JSON.parse(localStorage.getItem('reciteOption'));
// verse.setOption(reciteOption.scrollToVerse, reciteOption.highlightVerse, reciteOption.highlightWord);
//
// rightSideBar.init();
// rightSideBar.translatorChanged( translation_id => {
//     verse.reInit(window.chapter, translation_id);
// });

// Translation.setOnTranslatorChangedListener((translatorId) => {
//     console.log(translatorId)
//     verse.reInit(window.chapter, translatorId);
// });
