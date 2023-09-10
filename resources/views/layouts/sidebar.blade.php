
<!-- Sidebar -->
<div class="sidebar print:hidden">
    <!-- Main Sidebar -->
    <div class="main-sidebar">
        <div
            class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800"
        >
            <!-- Application Logo -->
            <div class="flex pt-4">
                <a href="/">
                    <img
                        class="h-11 w-11 transition-transform duration-500 ease-in-out hover:scale-110"
                        src="{{asset('assets/images/quran.svg')}}"
                        alt="logo"
                    />
                </a>
            </div>

            <!-- Main Sections Links -->
            <div
                class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6"
            >

                <a
                    href="{{ route('dashboard') }}"
                    class="flex h-16 w-14 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    x-tooltip.placement.right="'Dashboard'"
                >
                    <div class="flex flex-col justify-center items-center">
                        <i class="fa-duotone fa-house text-2xl"></i>
                        <p class="mt-1 text-sm text-slate-400 dark:text-navy-300">Home</p>
                    </div>
                </a>

                <a
                    href="{{ route('surah') }}"
                    class="flex h-16 w-14 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    x-tooltip.placement.right="'Surah'"
                >
                    <div class="flex flex-col justify-center items-center">
                        <i class="fa-duotone fa-book-quran text-2xl"></i>
                        <p class="mt-1 text-sm text-slate-400 dark:text-navy-300">Surah</p>
                    </div>
                </a>

                <a
                    href="{{ route('history') }}"
                    class="flex h-16 w-14 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                    x-tooltip.placement.right="'History'"
                >
                    <div class="flex flex-col justify-center items-center">
                        <i class="fa-solid fa-timeline text-2xl"></i>
                        <p class="mt-1 text-sm text-slate-400 dark:text-navy-300">History</p>
                    </div>
                </a>
            </div>

            <!-- Bottom Links -->
            <div class="flex flex-col items-center space-y-3 py-3">

                <!-- Profile -->
                <div
                    x-data="usePopper({placement:'right-end',offset:12})"
                    @click.outside="isShowPopper && (isShowPopper = false)"
                    class="flex"
                >
                    <button
                        @click="isShowPopper = !isShowPopper"
                        x-ref="popperRef"
                        class="avatar h-12 w-12"
                    >
                        <img
                            class="rounded-full"
                            src="{{asset('assets/images/avatar/avatar_empty.jpg')}}"
                            alt="avatar"
                        />
                        <span
                            class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"
                        ></span>
                    </button>

                    <div
                        :class="isShowPopper && 'show'"
                        class="popper-root fixed"
                        x-ref="popperRoot"
                    >
                        <div
                            class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700"
                        >
                            <div
                                class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800"
                            >
                                <div class="avatar h-14 w-14">
                                    <img
                                        class="rounded-full"
                                        src="{{asset('assets/images/avatar/avatar_empty.jpg')}}"
                                        alt="avatar"
                                    />
                                </div>
                                <div>
                                    <a
                                        href="#"
                                        class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"
                                    >
                                        Travis Fuller
                                    </a>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">
                          Product Designer
                        </p>
                                </div>
                            </div>
                            <div class="flex flex-col pt-2 pb-5">
                                <a
                                    href="#"
                                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            Profile
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            Your profile setting
                                        </div>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            Messages
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            Your messages and tasks
                                        </div>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            Team
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            Your team activity
                                        </div>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            Activity
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            Your activity and events
                                        </div>
                                    </div>
                                </a>
                                <a
                                    href="#"
                                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600"
                                >
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>

                                    <div>
                                        <h2
                                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light"
                                        >
                                            Settings
                                        </h2>
                                        <div
                                            class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300"
                                        >
                                            Webapp settings
                                        </div>
                                    </div>
                                </a>
                                <div class="mt-3 px-4">
                                    <button
                                        class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                            />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Panel -->
    <div class="sidebar-panel">
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
            <!-- Sidebar Panel Header -->
            <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                Dashboards
              </p>
                <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </button>
            </div>

            <div x-data="{expandedItem:null}"
                class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                x-init="$el._x_simplebar = new SimpleBar($el);">
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li>
                        <a
                            x-data="navLink"
                            href="/"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            CRM Analytics
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-orders.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Orders
                        </a>
                    </li>
                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li x-data="accordionItem('menu-item-1')">
                        <a
                            :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);"
                        >
                            <span>Cryptocurrency</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-crypto-1.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Cryptocurrency v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-crypto-2.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Cryptocurrency v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="accordionItem('menu-item-2')">
                        <a
                            :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);"
                        >
                            <span>Banking</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-banking-1.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Banking v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-banking-2.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Banking v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-personal.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Personal
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-cms-analytics.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            CMS Analytics
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-influencer.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Influencer
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-travel.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Travel
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-teacher.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Teacher
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-education.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Education
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-authors.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Authors
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-doctor.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Doctors
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-employees.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Employees
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-workspace.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Workspaces
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-meeting.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Meetings
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-project-boards.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Project Boards
                        </a>
                    </li>
                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-widget-ui.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Widget UI
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-widget-contacts.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Widget Contacts
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="sidebar-panel">
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
            <!-- Sidebar Panel Header -->
            <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                    Dashboards
                </p>
                <button @click="$store.global.isSidebarExpanded = false" class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </button>
            </div>

            <div x-data="{expandedItem:null}"
                 class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
                 x-init="$el._x_simplebar = new SimpleBar($el);">
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li>
                        <a
                            x-data="navLink"
                            href="/"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            CRM Analytics
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-orders.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Orders
                        </a>
                    </li>
                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li x-data="accordionItem('menu-item-1')">
                        <a
                            :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);"
                        >
                            <span>Cryptocurrency</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-crypto-1.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Cryptocurrency v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-crypto-2.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Cryptocurrency v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="accordionItem('menu-item-2')">
                        <a
                            :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'"
                            @click="expanded = !expanded"
                            class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out"
                            href="javascript:void(0);"
                        >
                            <span>Banking</span>
                            <svg
                                :class="expanded && 'rotate-90'"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                        <ul x-collapse x-show="expanded">
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-banking-1.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Banking v1</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a
                                    x-data="navLink"
                                    href="dashboards-banking-2.html"
                                    :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                                    class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4"
                                >
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-1.5 w-1.5 rounded-full border border-current opacity-40"
                                        ></div>
                                        <span>Banking v2</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-personal.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Personal
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-cms-analytics.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            CMS Analytics
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-influencer.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Influencer
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-travel.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Travel
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-teacher.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Teacher
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-education.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Education
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-authors.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Authors
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-doctor.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Doctors
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-employees.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Employees
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-workspace.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Workspaces
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-meeting.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Meetings
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-project-boards.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Project Boards
                        </a>
                    </li>
                </ul>
                <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-widget-ui.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Widget UI
                        </a>
                    </li>
                    <li>
                        <a
                            x-data="navLink"
                            href="dashboards-widget-contacts.html"
                            :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'"
                            class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out"
                        >
                            Widget Contacts
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
