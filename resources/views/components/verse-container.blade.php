<div id="{{$key}}" class="verse card p-4 sm:p-5 border-transparent py-10 border-[1px]"  render="false" verse="{{$index}}">
    <div class="flex justify-between">
        <div id="side_panel" class="justify-normal items-center hidden md:flex">

            <div class="skeleton lg:me-5 lg:block animate-pulse">
                <div class="h-5 w-5 rounded-lg bg-slate-200 dark:bg-navy-600 mb-1"></div>
                <div class="h-5 w-5 rounded-lg bg-slate-200 dark:bg-navy-600 my-1"></div>
                <div class="h-5 w-5 rounded-lg bg-slate-200 dark:bg-navy-600 my-1"></div>
                <div class="h-5 w-5 rounded-lg bg-slate-200 dark:bg-navy-600 mt-1"></div>
            </div>

            <div class="!hidden lg:me-5 lg:block">
                <button class="verse-key-button flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8 text-lg" verse-key="{{$key}}">
                    {{$key}}
                </button>
                <button class="bookmark-button group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-regular fa-heart text-lg"></i>
                </button>
                <button class="verse-play-button group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-solid fa-play text-lg"></i>
                </button>
                <button class="group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-solid fa-book text-lg"></i>
                </button>
            </div>

        </div>


        <div class="w-full flex flex-col justify-center">

            <div role="status" class="skeleton animate-pulse">
                <div class="h-12 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4"></div>
                <div class="h-6 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4"></div>
                <div class="h-4 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4 w-1/4"></div>
            </div>

            <p class="text-container text-2xl lg:text-3xl text-right !leading-[50px]"></p>
            <div class="translation-container text-xs lg:text-base flex justify-content-star mt-1 !leading-5 "></div>

            <div id="bottom_buttons" class="flex justify-center lg:hidden space-x-2 mt-1 -mb-2">
                <button class="verse-key-button flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8 text-lg" verse-key="{{$key}}">
                    {{$key}}
                </button>
                <button class="bookmark-button group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-regular fa-heart"></i>
                </button>
                <button class="verse-play-button group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-solid fa-play"></i>
                </button>
                <button class="group flex justify-center items-center hover:bg-teal-500 hover:text-gray-100 rounded-full w-8 h-8" verse-key="{{$key}}">
                    <i class="fa-solid fa-book"></i>
                </button>
            </div>

        </div>
    </div>
</div>

@once
    <script>

        // jump to verse (during page load)
        function jumpToVerse(id) {
            let card = $(`.card#${id.replace(':', '\\:')}`)[0];
            if (!card) return;

            function scrollToCard() {
                let cardRect = card.getBoundingClientRect();
                let cardTopOffset = cardRect.top;

                if (cardTopOffset > 80) {
                    window.scrollBy(0, 1000); // Scroll down by 10 pixels
                    requestAnimationFrame(scrollToCard);
                } else {
                    $('html, body').animate({
                        scrollTop: $(card).offset().top - 100
                    }, 1000);

                    // Add anchor to URL
                    window.location.hash = id.split(':')[1];
                }
            }

            // add delay to scroll
            setTimeout(scrollToCard, 500);
        }
        //
        // // when click the verse key
        // function jumpToVerseSimple(id){
        //     let card = $(`.card#${id.replace(':','\\:')}`)[0];
        //     $('html, body').animate({
        //         scrollTop: $(card).offset().top - 80
        //     }, 500);
        // }
        //
        // // create document ready function
        $(document).ready(function() {
            // get last part of url after '/'
            let key = window.location.href.split('/').pop();
            key = key.replace('#', ':');
            jumpToVerse(key);
        });


    </script>
@endonce


