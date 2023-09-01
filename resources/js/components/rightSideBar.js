import translation from "../translation.js";

const rightSideBar = () => {

    translation.initTranslatorDropDown();

    // init element from blade template
    const translationButton = document.querySelectorAll('.translation-button');
    const fontSizePlus = document.querySelector('#quran_font_plus');
    const fontSizeMinus = document.querySelector('#quran_font_minus');
    const fontText = document.querySelector('#quran_font_text');

    // set click event for font size button
    fontSizePlus.addEventListener('click', function () {
        let fontSize = localStorage.getItem('quranFontSize');
        fontSize++;
        console.log(fontSize);
        if (fontSize > 10) fontSize = 10;
        fontText.innerHTML = fontSize;
        setQuranFontSize(fontSize);
        localStorage.setItem('quranFontSize', fontSize);
    });

    // set click event for font size button
    fontSizeMinus.addEventListener('click', function () {
        let fontSize = localStorage.getItem('quranFontSize');
        fontSize--;
        console.log(fontSize);
        if (fontSize < 1) fontSize = 1;
        fontText.innerHTML = fontSize;
        setQuranFontSize(fontSize);
        localStorage.setItem('quranFontSize', fontSize);
    });

    // if localStorage has no translatorId, set it to 131 (English) default
    if (!localStorage.getItem('translatorId')) {
        localStorage.setItem('translatorId', 131);
    }
    if (!localStorage.getItem('quranFontSize')) {
        localStorage.setItem('quranFontSize', 5);
    }

    // const setTranslatorDropDown = (translatorId) => {
    //     // let translator = translatorInfo.find(translator => translator.id === parseInt(translatorId));
    //     // let translatorName = document.querySelector('#translator_name');
    //     // let translatorLanguage = document.querySelector('#translator_language');
    //     // translatorName.innerHTML = translator.author_name;
    //     // translatorLanguage.innerHTML = translator.language_name;
    // }

    // const translatorChanged = (callback) => {
    //     // set translationButton callback function to changeTranslator
    //     translationButton.forEach(button => {
    //         button.addEventListener('click', function () {
    //             let translatorId = button.getAttribute('translation-id');
    //             localStorage.setItem('translatorId', translatorId);
    //             console.log(translatorId)
    //             setTranslatorDropDown(translatorId);
    //             callback(translatorId);
    //         });
    //     });
    // }

    const setQuranFontSize = (fontSize) => {
        fontText.innerHTML = fontSize;
        let _fontSize = 20 + (4 * parseInt(fontSize)) + "px";
        let x_spacing = (3 + parseInt(fontSize) * 1.2) - (parseInt(fontSize)) + "px";
        let y_spacing = parseInt(fontSize) + (parseInt(fontSize) * 2) + "px";
        document.documentElement.style.setProperty("--main-font-size", _fontSize);
        document.documentElement.style.setProperty("--main-padding-left", x_spacing);
        document.documentElement.style.setProperty("--main-padding-right", x_spacing);
        document.documentElement.style.setProperty("--main-padding-top", y_spacing);
        document.documentElement.style.setProperty("--main-padding-bottom", y_spacing);
    }

    const init = () => {
        let translatorId = localStorage.getItem('translatorId');
        let quranFontSize = localStorage.getItem('quranFontSize');
        setQuranFontSize(quranFontSize);
        // setTranslatorDropDown(translatorId);
    }

    return {
        init
    }
}

export default rightSideBar;
