import audio from "../audio.js";
import audioPlayer from "./audioPlayer/player.js";

let page_downloaded = {};
let chapter_id;
let translation_id;
let verseArray = [];
let per_page = 10;
let isVerseScroll = false;
let isVerseHighlighted = false;
let isWordHighlighted = false;

const verses = {

    getVerses: (chapter, page, perPage, reciter, translations, wordTranslationLanguage, mushaf, callback) => {
        let data = {
            "words": true,
            "translation_fields": "resource_name,language_id",
            "per_page": perPage,
            "fields": "text_uthmani,chapter_id,hizb_number,text_imlaei_simple",
            "translations": translations,
            "reciter": reciter,
            "word_translation_language": wordTranslationLanguage,
            "page": page + 1,
            "word_fields": "verse_key,verse_id,page_number,location,text_uthmani,qpc_uthmani_hafs",
            "mushaf": mushaf
        };

        const requestIdentifier = JSON.stringify(data);

        if (!page_downloaded[requestIdentifier]) {
            page_downloaded[requestIdentifier] = true;

            $.ajax({
                url: "https://api.qurancdn.com/api/qdc/verses/by_chapter/" + chapter,
                type: "get",
                data: data,
                dataType: "json",
                success: function (data) {
                    callback(data);
                }
            });

        }

    },

    // set the verse text and translation to the element
    downloadVerses: () => {
        let pages = verseArray.filter((_, index) => index % 1 === 0);
        pages.forEach(page => {

            let __page = (page - 1) / per_page;
            __page = Math.round(__page);
            verses.getVerses(chapter_id, __page, per_page, 7, translation_id, "en", 5, function (data) {
                let verses_info = data.verses.filter(e => e.words);
                verses_info.forEach(function (verse) {
                    let verse_key = verse.verse_key;
                    let words = verse.words;
                    let texts = words.map(e => e.text);
                    let text_type = words.map(e => e.char_type_name);

                    let translation = verse.translations[0].text;
                    translation = translation.replace(/<sup[^>]*>.*?<\/sup>/g, '')
                    verses.setText(verse_key, texts, text_type, translation);
                });
            });
        });
    },

    setText: (key, texts, text_type, translation) => {
        const verse = document.getElementById(key);
        const hidden = verse.querySelectorAll(".\\!hidden");
        hidden.forEach((element) => element.classList.remove("!hidden"));
        const skeleton = verse.querySelectorAll(".skeleton");
        skeleton.forEach((element) => element.classList.add("!hidden"));

        const text_container = verse.querySelector(".text-container")
        text_container.innerHTML = "";

        texts.forEach((text, index) => {
            let button;
            if (text_type[index] === 'word') {
                // Create the span element
                const element = document.createElement('span');
                element.className = 'words';
                element.textContent = text;
                // Create the button element
                const button = document.createElement('button');
                button.className = 'word-holder';
                button.type = 'button';
                button.setAttribute('word', index + 1);
                button.appendChild(element);
                text_container.append(button);
            } else {
                const element = document.createElement('span');
                element.className = 'words';
                element.textContent = text;
                const button = document.createElement('button');
                button.className = 'cursor-default';
                button.appendChild(element);
                text_container.append(button);
            }
        });

        verses.setTranslation(key, translation);
    },

    setTranslation: (key, translation) => {
        const verse = document.getElementById(key);
        const translation_text = verse.querySelector(".translation-container");
        translation_text.innerHTML = translation;
    },

    renderingVerses: () => {
        // get an element within view port and add class to it
        const verseElements = document.querySelectorAll(".card[render='false']");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && entry.target.getAttribute("render") === "false") {
                    const id = entry.target.id;
                    let verseValue = entry.target.getAttribute("verse");
                    // some bug fixing logic which causes the verse to be rendered late
                    verseValue = verseValue - 5;
                    if (verseValue < 1) verseValue = 0;
                    verseArray.push(verseValue);
                    entry.target.setAttribute("render", "true");
                    verses.downloadVerses();
                }
            });
        });

        // Start observing each verse element
        verseElements.forEach(element => {
            observer.observe(element);
        });
    },

    // init the verse component and download the first page
    init: (id, translation) => {
        chapter_id = id;
        translation_id = translation;
        verses.renderingVerses();
        verses.setPlayClickListener();
    },


    reInit: (id, translation) => {
        page_downloaded = {};
        chapter_id = id;
        translation_id = translation;
        const verseElements = document.querySelectorAll(".card[render='true']");
        //change the render attribute to false
        verseElements.forEach(element => {
            element.setAttribute("render", "false");
        });
        verses.renderingVerses();
    },

    setIsVerseScroll: (status) =>  {
        isVerseScroll = status;
        localStorage.setItem("scrollToVerse", status);
    },
    setIsVerseHighlighted: (status) =>  {
        isVerseHighlighted = status;
        localStorage.setItem("highlightVerse", status);
    },
    setIsWordHighlighted: (status) =>  {
        isWordHighlighted = status;
        localStorage.setItem("highlightWord", status);
    },

    setRecitedWord: (verse_key, word) => {
        if (isWordHighlighted === "false") return;
        const verse_container = document.getElementById(verse_key);
        const highlighted = document.querySelectorAll(".word-highlight");
        highlighted.forEach(element => element.classList.remove("word-highlight"));
        if (word === null) return;
        const words = verse_container.querySelectorAll(".word-holder");
        words.forEach(element => {
            element.classList.remove("word-highlight");
            if (element.getAttribute("word") === word.toString()) {
                element.classList.add("word-highlight");
            }
        });
    },

    setRecitedVerse: (verse_key) => {
        verses.clearHighlights();
        if (verse_key === null) return;
        verses.addVerseHighlight(verse_key);
    },

    clearHighlights: () => {
        const highlighted = document.querySelectorAll(".verse-highlight");
        highlighted.forEach(element => {
            element.classList.remove("verse-highlight");
        });
        const highlightedWord = document.querySelectorAll(".word-highlight");
        highlightedWord.forEach(element => {
            element.classList.remove("word-highlight");
        });
    },

    addVerseHighlight: (verse_key) => {
        console.log(isVerseHighlighted)
        if (isVerseHighlighted === "false") return;
        const verse_container = document.getElementById(verse_key);
        verse_container.classList.add("verse-highlight");
    },

    setPlayClickListener: () => {
        const versePlayButton = document.querySelectorAll(`.verse-play-button`);
        versePlayButton.forEach((button) => {
            button.addEventListener("click", function () {
                const verseKey = button.getAttribute("verse-key");
                audio.playVerse(verseKey);
            });
        });
    },

    scrollToVerse: (verseKey) => {
        if (isVerseScroll === "false") return;
        const verse_container = document.getElementById(verseKey);
        verse_container.scrollIntoView({
            behavior: "smooth",
            block: "center",
            inline: "center"
        });
    }



}

const verse = () => {

    let verseArray = [];
    let per_page = 10;
    let page_downloaded = {};
    let chapter_id;
    let translation_id;
    let playButton = document.querySelectorAll(".verse-play-button");
    let keyButton = document.querySelectorAll(".verse-key-button");
    let isVerseScroll = false;
    let isVerseHighlighted = false;
    let isWordHighlighted = false;

    keyButton.forEach((button) => {
        button.addEventListener("click", function () {
            const verseKey = button.getAttribute("verse-key");
            console.log("Verse Key:", verseKey);
            jumpToVerseSimple(verseKey);
        });
    });

    const changePlayButton = (verseKey, action) => {
        const versePlayButton = document.querySelectorAll(`.verse-play-button`);
        versePlayButton.forEach((button) => {
            if (button.getAttribute("verse-key") === verseKey) {
                if (action === 'pause') {
                    button.classList.remove("bg-gray-500");
                    button.classList.remove("pause");
                    const icon = button.querySelector("i");
                    icon.classList.remove("fa-pause");
                    icon.classList.add("fa-play");
                    return;
                }
                button.classList.add("bg-gray-500");
                button.classList.add("pause");
                const icon = button.querySelector("i");
                icon.classList.remove("fa-play");
                icon.classList.add("fa-pause");
            } else {
                button.classList.remove("bg-gray-500");
                button.classList.remove("pause");
                const icon = button.querySelector("i");
                icon.classList.remove("fa-pause");
                icon.classList.add("fa-play");
            }
        });
    }

    const buttonPlayClick = (callback) => {
        playButton.forEach((button) => {
            button.addEventListener("click", function () {
                const verseKey = button.getAttribute("verse-key");
                callback(verseKey);
            });
        });
    }

    const jumpToVerseSimple = id => {
        let card = document.getElementById(id);
        $('html, body').animate({
            scrollTop: $(card).offset().top - 80
        }, 500);
    };

    const setText = (key, texts, text_type, translation) => {

        // const verse = document.getElementById(key);
        // const hidden = verse.querySelectorAll(".\\!hidden");
        // hidden.forEach((element) => element.classList.remove("!hidden"));
        // const skeleton = verse.querySelectorAll(".skeleton");
        // skeleton.forEach((element) => element.classList.add("!hidden"));
        //
        // const text_container = verse.querySelector(".text-container")
        // text_container.innerHTML = "";
        //
        // texts.forEach((text, index) => {
        //     let button;
        //     if (text_type[index] === 'word') {
        //         // Create the span element
        //         const element = document.createElement('span');
        //         element.className = 'words';
        //         element.textContent = text;
        //         // Create the button element
        //         const button = document.createElement('button');
        //         button.className = 'word-holder';
        //         button.type = 'button';
        //         button.setAttribute('word', index + 1);
        //         button.appendChild(element);
        //         text_container.append(button);
        //     } else {
        //         const element = document.createElement('span');
        //         element.className = 'words';
        //         element.textContent = text;
        //         const button = document.createElement('button');
        //         button.className = 'cursor-default';
        //         button.appendChild(element);
        //         text_container.append(button);
        //     }
        // });
        //
        // setTranslation(key, translation);
    };

    const setTranslation = (key, translation) => {
        // const verse = document.getElementById(key);
        // const translation_text = verse.querySelector(".translation-container");
        // translation_text.innerHTML = translation;
    };

    function renderingVerses() {
        // get element within view port and add class to it
        // const verseElements = document.querySelectorAll(".card[render='false']");
        //
        // const observer = new IntersectionObserver((entries) => {
        //     entries.forEach(entry => {
        //         if (entry.isIntersecting && entry.target.getAttribute("render") === "false") {
        //             const id = entry.target.id;
        //             let verseValue = entry.target.getAttribute("verse");
        //             // some bug fixing logic which cause the verse to be rendered late
        //             verseValue = verseValue - 5;
        //             if (verseValue < 1) verseValue = 0;
        //             verseArray.push(verseValue);
        //             entry.target.setAttribute("render", "true");
        //             downloadVerses();
        //         }
        //     });
        // });
        //
        // // Start observing each verse element
        // verseElements.forEach(element => {
        //     observer.observe(element);
        // });

    }

    const downloadVerses = () => {
        // // console.log(verseArray)
        // let pages = verseArray.filter((_, index) => index % 1 === 0);
        // pages.forEach(page => {
        //     let __page = (page - 1) / per_page;
        //     __page = Math.round(__page);
        //     getVerses(chapter_id, __page, per_page, 7, translation_id, "en", 5, function (data) {
        //         let verses = data.verses;
        //         let verses_info = verses.filter(e => e.words);
        //         verses_info.forEach(function (verse) {
        //             let verse_key = verse.verse_key;
        //             let words = verse.words;
        //             let texts = words.map(e => e.text);
        //             let text_type = words.map(e => e.char_type_name);
        //
        //             let translation = verse.translations[0].text;
        //             translation = translation.replace(/<sup[^>]*>.*?<\/sup>/g, '')
        //             setText(verse_key, texts, text_type, translation);
        //         });
        //     });
        // });
    }

    // getVerses callback function
    const getVerses = (chapter, page, perPage, reciter, translations, wordTranslationLanguage, mushaf, callback) => {
        // let data = {
        //     "words": true,
        //     "translation_fields": "resource_name,language_id",
        //     "per_page": perPage,
        //     "fields": "text_uthmani,chapter_id,hizb_number,text_imlaei_simple",
        //     "translations": translations,
        //     "reciter": reciter,
        //     "word_translation_language": wordTranslationLanguage,
        //     "page": page + 1,
        //     "word_fields": "verse_key,verse_id,page_number,location,text_uthmani,qpc_uthmani_hafs",
        //     "mushaf": mushaf
        // };
        //
        // const requestIdentifier = JSON.stringify(data);
        //
        // if (!page_downloaded[requestIdentifier]) {
        //     page_downloaded[requestIdentifier] = true;
        //
        //     $.ajax({
        //         url: "https://api.qurancdn.com/api/qdc/verses/by_chapter/" + chapter,
        //         type: "get",
        //         data: data,
        //         dataType: "json",
        //         success: function (data) {
        //             callback(data);
        //         }
        //     });
        //
        // }

    };

    const reInit = (id, translation) => {
        // page_downloaded = {};
        // chapter_id = id;
        // translation_id = translation;
        // const verseElements = document.querySelectorAll(".card[render='true']");
        // //change the render attribute to false
        // verseElements.forEach(element => {
        //     element.setAttribute("render", "false");
        // });
        // renderingVerses();
    };

    const setRecitedWord = (verse_key, word) => {
        // if (isWordHighlighted === false) return;
        // const verse_container = document.getElementById(verse_key);
        // const highlighted = document.querySelectorAll(".word-highlight");
        // highlighted.forEach(element => element.classList.remove("word-highlight"));
        // if (word === null) return;
        // const words = verse_container.querySelectorAll(".word-holder");
        // words.forEach(element => {
        //     element.classList.remove("word-highlight");
        //     if (element.getAttribute("word") === word.toString()) {
        //         element.classList.add("word-highlight");
        //     }
        // });
    }

    const setRecitedVerse = (verse_key) => {
        // clearHighlights();
        // if (verse_key === null) return;
        // addVerseHighlight(verse_key);
        // if (isVerseScroll) {
        //     const verse_container = document.getElementById(verse_key);
        //     verse_container.scrollIntoView({
        //         behavior: "smooth",
        //         block: "center",
        //         inline: "center"
        //     });
        // }
    }

    const clearHighlights = () => {
        // const highlighted = document.querySelectorAll(".verse-highlight");
        // highlighted.forEach(element => {
        //     element.classList.remove("verse-highlight");
        // });
        // const highlightedWord = document.querySelectorAll(".word-highlight");
        // highlightedWord.forEach(element => {
        //     element.classList.remove("word-highlight");
        // });
    }

    const addVerseHighlight = (verse_key) => {
        // console.log(isVerseHighlighted)
        // if (isVerseHighlighted === false) return;
        // const verse_container = document.getElementById(verse_key);
        //
        // console.log(verse_key)
        // console.log(verse_container)
        // verse_container.classList.add("verse-highlight");
    }

    return {
        init(id, translation) {
            chapter_id = id;
            translation_id = translation;
            renderingVerses();
        },
        setText,
        buttonPlayClick,
        setTranslation,
        reInit,
        setRecitedVerse,
        setRecitedWord,
        clearHighlights,
        addVerseHighlight,
        setOption(verseScroll, verseHighlighted, wordHighlighted) {
            isVerseScroll = verseScroll;
            isVerseHighlighted = verseHighlighted;
            isWordHighlighted = wordHighlighted;
        }
    };
};

export default verses;
