@extends('layouts.main')

@section('content')
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
            <!-- Basic Timeline -->
            <div class="card px-4 pb-4 sm:px-5 mt-3">
                <div class="my-3 flex h-8 items-center justify-between">
                    <h2 class=" tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 text-base">
                        Progress Timeline
                    </h2>
                </div>
                <div class="max-w-xl">

                    <label class="relative flex">
                        <input id="filter-verse" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Filter verse key. Eg: 12:1,121,..." type="text">
                        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"></path>
                            </svg>
                        </span>
                    </label>

                    <div class="mt-5">
                        <div class="h-48 min-h-full flex justify-center items-center no-history">
                            <div class="flex flex-col items-center">
                                <div class="">
                                    <div class="text-center text-gray-400 mb-2"><i class="fa-duotone fa-circle-info text-5xl"></i></div>
                                    <div class="text-center text-gray-400 w-60">No progress history yet, add one by mark any verse into read, memorized and unfluent</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <ol class="timeline max-w-sm">
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection

@push('scripts')
    <script type="module" src="{{ Vite::asset('resources/js/view/history/index.js') }}"></script>
@endpush
