<footer id="audioPlayer" class="fixed bottom-0 z-20 lg:pl-20 w-full border-t bg-slate-50 dark:bg-navy-800 md:flex md:items-center md:justify-between">

    <div class="fixed bottom-[48px] lg:pr-20 w-full">
        <input class="w-full h-0.5" type="range" id="seekBar" min="0" value="0" step="1" />
    </div>

    <audio id="quranAudio" controls class="hidden"><source src="" type="audio/mpeg"></audio>

    <div id="custom-player" class="w-full  px-4 py-2 flex justify-between items-center">
        <div class="justify-start text-xl w-[46px]">
            <span id="currentTimeDisplay">00:00</span>
        </div>

        <div class="flex justify-center">

            <x-audio-menu chapter="{{$chapter}}" />

            <button id="previousButton" class="flex justify-center items-center hover:bg-teal-500 rounded-full hover:text-white w-10 h-10">
                <i class="fa-solid fa-backward text-lg lg:text-xl"></i>
            </button>
            <button id="playButton" class="group flex justify-center items-center mx-3 hover:bg-teal-500 hover:text-white rounded-full w-10 h-10">
                <i class="fa-solid fa-play text-lg lg:text-xl"></i>
            </button>
            <button id="nextButton" class="flex justify-center items-center hover:bg-teal-500 hover:text-white rounded-full w-10 h-10">
                <i class="fa-solid fa-forward text-lg lg:text-xl"></i>
            </button>
            <button id="closeButton" class="ms-5 flex justify-center items-center hover:bg-teal-500 hover:text-white rounded-full w-10 h-10">
                <i class="fa-solid fa-xmark text-lg lg:text-xl"></i>
            </button>
        </div>
        <div class="justify-end text-xl w-[44px] text-end">
            <span id="durationDisplay">00:00</span>
        </div>
    </div>

</footer>
