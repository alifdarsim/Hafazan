<div>

    <div class="hidden lg:flex justify-center pb-20 space-x-3">

        @if ($index > 1)
            <button id="previous-surah"
                    class="w-48  btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                <i class="fa-solid fa-chevron-left me-2"></i>
                <span class="inline-block align-middle mt-0.5">Previous Surah</span>
            </button>
        @endif
        <button id="beginning-surah"
                class="w-48 btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
            <span class="inline-block align-middle mt-0.5">Beginning of Surah</span>
        </button>
        @if ($index < 114)
            <button id="next-surah"
                    class="w-48 btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                <span class="inline-block align-middle mt-0.5">Next Surah</span>
                <i class="fa-solid fa-chevron-right ms-2"></i>
            </button>
        @endif


    </div>

    <div class="flex lg:hidden flex-col justify-center pb-20 space-y-3">

        <!-- First Row -->
        <div class="flex justify-center space-x-3"> <!-- Added "justify-center" class -->
            @if ($index > 1)
                <button id="previous-surah"
                        class="w-1/2 btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <i class="fa-solid fa-chevron-left me-2"></i>
                    <span class="inline-block align-middle mt-0.5">Previous Surah</span>
                </button>
                <button id="next-surah"
                        class="w-1/2 btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <span class="inline-block align-middle mt-0.5">Next Surah</span>
                    <i class="fa-solid fa-chevron-right ms-2"></i>
                </button>
            @endif
        </div>

        <!-- Second Row -->
        <div class="flex justify-center">
            @if ($index < 114)
                <button id="beginning-surah"
                        class="btn border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                    <span class="inline-block align-middle mt-0.5">Beginning of Surah</span>
                </button>

            @endif
        </div>

    </div>

</div>

<script>
    const previousSurah = document.getElementById("previous-surah");
    const beginningSurah = document.getElementById("beginning-surah");
    const nextSurah = document.getElementById("next-surah");

    if (previousSurah) {
        previousSurah.addEventListener("click", () => {
            window.location.href = `{{route('chapter.id', ["id" => $index - 1])}}`;
        });
    }

    beginningSurah.addEventListener("click", () => {
        $('html, body').animate({
            scrollTop: 0
        }, 250);
    });

    if (nextSurah) {
        nextSurah.addEventListener("click", () => {
            window.location.href = `{{route('chapter.id', ["id" => $index + 1])}}`;
        });
    }
</script>
