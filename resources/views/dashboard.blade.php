@extends('layouts.main')

@section('content')
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="col-span-12 lg:col-span-8 xl:col-span-9">
            <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
                <div class="card shadow-none">
                    <div class="flex flex-1 flex-col justify-between rounded-lg bg-teal-500 p-4 sm:p-5">
                        <div>
                            <div class="flex items-start justify-between">
                                <h3 class="mt-0 text-white text-2xl font-bold line-clamp-2">
                                    Juz Completion
                                </h3>
                                <select class="form-select w-20 h-8 rounded-full bg-white px-2.5 pr-9 text-xs+ hover:border-slate-400 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                    <option>Jus 1</option>
                                    <option>Jus 2</option>
                                    <option>Jus 3</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="mt-2">
                                <div class="flex justify-between">
                                    <p class="text-base text-white">Progress</p>
                                    <p class="text-right text-base font-bold text-white">78%</p>
                                </div>
                                <div class="progress my-2 h-1.5 bg-white/30">
                                    <span class="w-8/12 rounded-full bg-white"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card shadow-none">
                    <div class="flex flex-1 flex-col justify-between rounded-lg bg-warning p-4 sm:p-5">
                        <div>
                            <div class="flex items-start justify-between">
                                <h3 class="mt-0 text-white text-2xl font-bold line-clamp-2">
                                    Quran Completion
                                </h3>
                                <p class="text-xs+ text-amber-50 mt-3">May 01, 2021</p>
                            </div>
                        </div>
                        <div>
                            <div class="mt-0">
                                <div class="flex justify-between">
                                    <p class="text-base text-white">Progress</p>
                                    <p class="text-right text-base font-bold text-white">7%</p>
                                </div>
                                <div class="progress my-2 h-1.5 bg-white/30">
                                    <span class="w-1/12 rounded-full bg-white"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-5 card col-span-12 lg:col-span-8 dark:bg-navy-800">
                <div class="flex items-center justify-between py-3 px-4">
                    <h2 class="font-medium tracking-wide text-lg text-slate-700 dark:text-navy-100">
                        Surah Progress
                    </h2>
                    <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>

                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper &amp;&amp; 'show'" style="position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate(-469px, 312px);" data-popper-placement="bottom-end">
                            <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                    </li>
                                </ul>
                                <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                <ul>
                                    <li>
                                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-y-4 pb-3">
                    <div class="scrollbar-sm mt-5 flex space-x-4 overflow-x-auto px-4 sm:px-5 lg:mt-0 lg:pl-0">
                        @foreach($chapters as $chapter)
                            <div class="flex w-36 shrink-0 flex-col items-center">
                                <div class="bg-teal-500 z-10 w-10 h-10 rounded-full flex items-center justify-center"><span class="text-white text-xl font-bold">{{$chapter->id}}</span></div>
                                <div class="card -mt-5 w-full rounded-2xl px-3 py-5 text-center">
                                    <p class="mt-3 text-xs+ font-medium text-slate-700 dark:text-navy-100">{{$chapter->nameSimple}}</p>
                                    <p class="mt-0 text-2xl font-medium text-slate-700 dark:text-navy-100">{{$chapter->nameArabic}}</p>
                                    <div class="flex items-center justify-center scale-75">
                                        <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.employeesTask); $el._x_chart.render() });"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="mt-4 sm:mt-5 lg:mt-6">
                <div class="flex h-8 items-center justify-between">
                    <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Hafazan Exam Schedule
                    </h2>
                    <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View All</a>
                </div>
                <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5">
                    <div class="card flex-row overflow-hidden">
                        <div class="h-full w-1 bg-gradient-to-b from-blue-500 to-purple-600"></div>
                        <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                            <div>
                                <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Exam 1
                                </h3>
                                <p class="text-xl">Mon. 08:00 - 09:00</p>
                                <div class="mt-2 flex space-x-1.5">
                                    <a href="#" class="tag bg-primary py-1 px-1.5 text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                        Surah Al-Fatihah (1-7)
                                    </a>
                                </div>
                            </div>
                            <div class="mt-10 flex justify-between">
                                <div class="flex -space-x-2">
                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar">
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                            jd
                                        </div>
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar">
                                    </div>
                                </div>
                                <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card flex-row overflow-hidden">
                        <div class="h-full w-1 bg-gradient-to-b from-info to-info-focus"></div>
                        <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                            <div>
                                <img class="h-12 w-12 rounded-lg object-cover object-center" src="images/others/design-sm.jpg" alt="image">
                                <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Learn UI/UX Design
                                </h3>
                                <p class="text-xs+">Tue. 10:00 - 11:30</p>
                                <div class="mt-2 flex space-x-1.5">
                                    <a href="#" class="tag bg-info py-1 px-1.5 text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                                        UI/UX Design
                                    </a>
                                </div>
                            </div>
                            <div class="mt-10 flex justify-between">
                                <div class="flex -space-x-2">
                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-20.jpg" alt="avatar">
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <div class="is-initial rounded-full bg-warning text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                            iu
                                        </div>
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-17.jpg" alt="avatar">
                                    </div>
                                </div>
                                <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card flex-row overflow-hidden">
                        <div class="h-full w-1 bg-gradient-to-b from-secondary-light to-secondary"></div>
                        <div class="flex flex-1 flex-col justify-between p-4 sm:px-5">
                            <div>
                                <img class="h-12 w-12 rounded-lg object-cover object-center" src="images/others/sales-presentation-sm.jpg" alt="image">
                                <h3 class="mt-3 font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                    Basic of digital marketing
                                </h3>
                                <p class="text-xs+">Wed. 09:00 - 11:00</p>
                                <div class="mt-2 flex space-x-1.5">
                                    <a href="#" class="tag bg-secondary px-1.5 py-1 text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                                        Marketing
                                    </a>
                                </div>
                            </div>
                            <div class="mt-10 flex justify-between">
                                <div class="flex -space-x-2">
                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-16.jpg" alt="avatar">
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                            jd
                                        </div>
                                    </div>

                                    <div class="avatar h-7 w-7 hover:z-10">
                                        <img class="rounded-full ring ring-white dark:ring-navy-700" src="images/avatar/avatar-19.jpg" alt="avatar">
                                    </div>
                                </div>
                                <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 hover:shadow-lg hover:shadow-slate-200/50 focus:bg-slate-200 focus:shadow-lg focus:shadow-slate-200/50 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </main>

@endsection

@push('scripts')

@endpush
