import axios from 'axios';
import verse from "./components/verse.js";

// cherry-pick the translator ids you want to use
let translatorId = [131, 20, 39, 33, 109, 229];
let translatorInfo = {};

const translation = {

    // get a translator list from api
    getTranslatorList: async function () {
        try {
            const response = await axios.get(`https://api.quran.com/api/v4/resources/translations`);
            const data = response.data.translations;
            return Object.values(data.filter(translator => {
                return translatorId.includes(translator.id);
            }));
        } catch (error) {
            throw error; // Handle or log the error as needed
        }
    },

    // set translator dropdown
    setTranslatorDropDown: (translatorId) => {
        let translator = translatorInfo.find(translator => translator.id === parseInt(translatorId));
        let translatorName = document.querySelector('#translator_name');
        let translatorLanguage = document.querySelector('#translator_language');
        translatorName.innerHTML = translator.author_name;
        translatorLanguage.innerHTML = translator.language_name;
    },

    // set click listener for each translator button
    setClickListener: () => {
        // set click event for each translator button
        const translationButton = document.querySelectorAll('.translation-button');
        translationButton.forEach(button => {
            button.addEventListener('click', function () {
                let translatorId = button.getAttribute('translation-id');
                translation.setTranslatorDropDown(translatorId);
                localStorage.setItem('translatorId', translatorId);
                verse.reInit(window.chapter, translatorId);

            });
        });
    },

    // init translator dropdown
    initTranslatorDropDown: function () {
        // get a translator list from api
        translation.getTranslatorList().then(translators => {
            translatorInfo = translators;
            // get the translator template button and its parent
            const translatorButton = document.querySelector('.translation-button');
            // foreach translator, clone translatorButton and set attribute to each button
            translators.forEach(translator => {
                let button = translatorButton.cloneNode(true);
                // get the translator author and language element
                let translatorName = button.querySelector('.author');
                let translatorLanguage = button.querySelector('.language');
                // set attribute, author and language name
                button.setAttribute('translation-id', translator.id);
                translatorName.innerHTML = translator.author_name;
                translatorLanguage.innerHTML = translator.language_name;
                translatorButton.parentNode.appendChild(button);
            });
            // remove the template button
            translatorButton.remove();
            // set change listener
            translation.setClickListener();

        }).catch(error => {
            console.log(error);
        });
    }
}

export default translation;
