<div
    x-data="usePopper({ offset: 12, placement: 'auto', modifiers: [{name: 'preventOverflow', options: {padding: 10}}] })"
    @click.outside="isShowPopper && (isShowPopper = false)" class="flex">

    <button id="audio-menu" class="me-5 group flex justify-center items-center hover:bg-teal-500 hover:text-white rounded-full w-10 h-10"
            x-ref="popperRef"
            @click="isShowPopper = !isShowPopper">
        <i class="fa-solid fa-ellipsis-vertical text-lg lg:text-xl"></i>
    </button>

    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
        <div class="popper-box max-w-[16rem]">
            <div class="rounded-md border border-slate-200 bg-white dark:border-navy-500 dark:bg-navy-700">

                <div id="audio-main-tab" class="card min-w-[13rem]">
                    <div class="px-2 my-3">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <a id="download"
                                   class="cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-download"></i>
                                        <span>Download</span>
                                    </div>
                                </a>
                            </li>
                            <div class="my-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                            <li>
                                <a id="chooseOption"
                                   class="cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-list-music"></i>
                                        <span>Options</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-xs"></i>
                                </a>
                            </li>
                            <li>
                                <a id="chooseSpeed"
                                   class="cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-rabbit-running"></i>
                                        <span>Speed</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-xs"></i>
                                </a>
                            </li>
                            <li>
                                <a id="chooseReciter"
                                   class="cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-user-vneck"></i>
                                        <span>Reciter</span>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-xs"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="audio-reciter-tab" class="hidden card min-w-[13rem]">
                    <div class="px-2 my-3">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <a class="audio_back hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-chevron-left"></i>
                                        <span>Choose Reciter</span>
                                    </div>
                                </a>
                            </li>
                            <li class="border-b border-gray-300 dark:border-gray-700"/>
                            <li>
                                <a reciter-id="7"
                                   class="reciter-button hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span>Mishari Rashid al-`Afasy</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a reciter-id="4"
                                   class="reciter-button hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span>Abu Bakr al-Shatri</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a reciter-id="10"
                                   class="reciter-button hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span>Sa`ud ash-Shuraym</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a reciter-id="11"
                                   class="reciter-button hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span>Mohamed al-Tablawi</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a reciter-id="3"
                                   class="reciter-button hover:cursor-pointer group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span>Abdur-Rahman as-Sudais</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="audio-speed-tab" class="hidden card min-w-[13rem]">
                    <div class="px-2 my-3">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <a class="audio_back hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-chevron-left"></i>
                                        <span>Choose Speed</span>
                                    </div>
                                </a>
                            </li>
                            <li class="border-b border-gray-300 dark:border-gray-700"/>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">0.5</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">0.75</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">1.25</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">1.5</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="speed-button hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-4"><i></i></span>
                                        <span class="speed">2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="audio-option-tab" class="hidden card min-w-[13rem]">
                    <div class="px-2 my-3">
                        <ul class="space-y-1.5 font-inter font-medium">
                            <li>
                                <a class="audio_back hover:cursor-pointer group flex items-center rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                    <div class="flex items-center space-x-2">
                                        <i class="fa-solid fa-chevron-left"></i>
                                        <span>Select Option</span>
                                    </div>
                                </a>
                            </li>
                            <li class="border-b border-gray-300 dark:border-gray-700"/>
                            <li>
                                <div
                                    class="group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all">
                                    <div class="flex items-center space-x-2">
                                        <span>Scroll to Verse</span>
                                    </div>
                                    <label class="inline-flex items-center space-x-2">
                                        <input
                                            id="scrollToVerse"
                                            class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                                            type="checkbox"
                                        />
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all">
                                    <div class="flex items-center space-x-2">
                                        <span>Highlight Verse</span>
                                    </div>
                                    <label class="inline-flex items-center space-x-2">
                                        <input
                                            id="highlightVerse"
                                            class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                                            type="checkbox"
                                        />
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div
                                    class="group flex items-center justify-between rounded-lg px-2 py-2.5 tracking-wide outline-none transition-all">
                                    <div class="flex items-center space-x-2">
                                        <span>Highlight Word</span>
                                    </div>
                                    <label class="inline-flex items-center space-x-2">
                                        <input
                                            id="highlightWord"
                                            class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                                            type="checkbox"
                                        />
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="h-4 w-4" data-popper-arrow>
                <svg
                    viewBox="0 0 16 9"
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute h-4 w-4"
                    fill="currentColor"
                >
                    <path
                        class="text-slate-150 dark:text-navy-600"
                        d="M1.5 8.357s-.48.624 2.754-4.779C5.583 1.35 6.796.01 8 0c1.204-.009 2.417 1.33 3.76 3.578 3.253 5.43 2.74 4.78 2.74 4.78h-13z"
                    />
                    <path
                        class="text-white dark:text-navy-700"
                        d="M0 9s1.796-.017 4.67-4.648C5.853 2.442 6.93 1.293 8 1.286c1.07-.008 2.147 1.14 3.343 3.066C14.233 9.006 15.999 9 15.999 9H0z"
                    />
                </svg>
            </div>
        </div>
    </div>
</div>

<script>

    const hideAll = () => {
        $('#audio-main-tab').hide();
        $('#audio-reciter-tab').hide();
        $('#audio-speed-tab').hide();
        $('#audio-option-tab').hide();
    }

    $('.audio_back').click(e => {
        hideAll();
        $('#audio-main-tab').show();
    });

    $('#chooseReciter').click(e => {
        hideAll();
        $('#audio-reciter-tab').show();
    });

    $('#chooseOption').click(e => {
        hideAll();
        $('#audio-option-tab').show();
    });

    $('#chooseSpeed').click(e => {
        hideAll();
        $('#audio-speed-tab').show();
    });

    $('#audio-menu').click(e => {
        hideAll();
        $('#audio-main-tab').show();
    });

    let option = {
        scrollToVerse: true,
        highlightVerse: true,
        highlightWord: false,
    };
    if (localStorage.getItem('reciteOption')) {
        option = JSON.parse(localStorage.getItem('reciteOption'));
    }
    $('#scrollToVerse').prop('checked', option.scrollToVerse);
    $('#highlightVerse').prop('checked', option.highlightVerse);
    $('#highlightWord').prop('checked', option.highlightWord);
</script>

