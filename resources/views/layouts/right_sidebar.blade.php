<!-- Right Sidebar -->
<div x-show="$store.global.isRightSidebarExpanded" @keydown.window.escape="$store.global.isRightSidebarExpanded = false">
    <div
        class="fixed inset-0 z-[150] bg-slate-900/60 transition-opacity duration-200"
        @click="$store.global.isRightSidebarExpanded = false"
        x-show="$store.global.isRightSidebarExpanded"
        x-transition:enter="ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>
    <div class="fixed right-0 top-0 z-[151] h-full w-80">
        <div
            x-data="{activeTab:'tabHome'}"
            class="relative flex h-full w-full transform-gpu flex-col bg-white transition-transform duration-200 dark:bg-navy-750"
            x-show="$store.global.isRightSidebarExpanded"
            x-transition:enter="ease-out"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="ease-in"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <div class="flex items-center justify-between py-2 px-4">
                <p x-show="activeTab === 'tabHome'" class="flex shrink-0 items-center space-x-1.5">
                    <i class="fa-duotone fa-gear"></i>
                    <span class="">Setting</span>
                </p>

                <button
                    @click="$store.global.isRightSidebarExpanded=false"
                    class="btn -mr-1 h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>

            <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pt-1">

                <div class="mt-4">
                    <h2 class="px-3 text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        Quran Translation
                    </h2>
                    <div class="mt-3 space-y-3 px-2">

                        <div
                            x-data="usePopper({placement:'bottom-start',offset:4})"
                            @click.outside="isShowPopper && (isShowPopper = false)"
                            class="w-full inline-flex"
                        >
                            <button class="w-full flex justify-between btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                                x-ref="popperRef"
                                @click="isShowPopper = !isShowPopper">
                                <div class="text-start">
                                    <p id="translator_name" class="text-slate-700 line-clamp-1 dark:text-navy-100">Dr. Mustafa Khattab</p>
                                    <p id="translator_language" class="capitalize text-xs text-slate-700 dark:text-navy-300">English</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 transition-transform duration-200"
                                    :class="isShowPopper && 'rotate-180'"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div class="popper-box w-72 rounded-md border border-slate-150 bg-white dark:border-navy-600 dark:bg-navy-700">
                                    <h3 class="px-4 py-3 font-medium tracking-wide text-slate-700 dark:text-navy-100">Choose Translation</h3>
                                    <ul class="my-2">
                                        <li>
                                            <button translation-id="131" class="translation-button w-full flex items-center space-x-3.5 px-4 py-2 pr-8 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                                <div class="text-start">
                                                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100"><span class="language capitalize">English</span></p>
                                                    <p class="text-sm text-slate-700 dark:text-navy-300"><span class="author">Dr. Mustafa Khattab</span></p>
                                                </div>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 px-3">
                    <h2 class="text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">Quran Font Size</h2>
                    <div class="mt-2 flex flex-col space-y-2">
                        <div class="flex -space-x-px">
                            <button class="flex items-center justify-center h-6 w-6 rounded bg-slate-200 dark:bg-navy-600 dark:hover:bg-navy-200" id="quran_font_minus"><i class="fa-solid fa-minus"></i></button>
                            <p class="flex items-center px-6 h-6 w-6 justify-center text-xl" id="quran_font_text">1</p>
                            <button class="flex items-center justify-center h-6 w-6 rounded bg-slate-200 dark:bg-navy-600" id="quran_font_plus"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="mt-3 px-3">
                    <h2 class="text-xs+ font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">Theme</h2>
                    <div class="mt-2 flex flex-col space-y-2">
                        <label class="inline-flex items-center space-x-2">
                            <input
                                x-model="$store.global.isDarkModeEnabled"
                                class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:bg-slate-500 checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-navy-400 dark:checked:before:bg-white"
                                type="checkbox"
                            />
                            <span>Dark Mode</span>
                        </label>
                        <label class="inline-flex items-center space-x-2">
                            <input
                                x-model="$store.global.isMonochromeModeEnabled"
                                class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:bg-slate-500 checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-navy-400 dark:checked:before:bg-white"
                                type="checkbox"
                            />
                            <span>Monochrome Mode</span>
                        </label>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
