<div id="{{$key}}" class="verse card p-4 lg:py-4 border-transparent  border-[1px]" render="false" verse="{{$index}}">
    <div class="flex justify-between">

        <div class="w-full flex flex-col justify-center">

            <div class="flex justify-between">
                <div class="flex gap-0.5">
                    <button
                        onclick="jumpToVerseSimple('{{$key}}')"
                        class="verse-key-button flex justify-center items-center hover:text-gray-100 rounded-full w-7 h-8"
                        verse-key="{{$key}}">
                        {{$key}}
                    </button>
                    <button
                        class="mx-0.5 bookmark-button group flex justify-center items-center hover:text-gray-100 rounded-full w-6 h-8"
                        data-action="bookmark" verse-key="{{$key}}">
                        <i class="fa-regular fa-heart text-sm"></i>
                        <span class="ms-1"></span>
                    </button>
                    <button
                        class="verse-play-button group flex justify-center items-center hover:text-gray-100 rounded-full w-6 h-8"
                        verse-key="{{$key}}">
                        <i class="fa-solid fa-play text-sm"></i>
                    </button>
                </div>

                <div class="flex gap-0.5">
                    <button
                        class="read-button group flex justify-center items-center hover:text-gray-100 rounded-full w-8 h-8"
                        data-action="read" verse-key="{{$key}}">
                        <i class="fa-regular fa-book-open-reader text-sm"></i>
                        <span class="ms-1">0</span>
                    </button>

                    <button
                        class="memorize-button ms-1 group flex justify-center items-center hover:text-gray-100 rounded-full w-8 h-8"
                        data-action="memorize" verse-key="{{$key}}">
                        <i class="fa-regular fa-badge-check text-sm"></i>
                        <span class="ms-1">0</span>
                    </button>

                    <button
                        class="unfluent-button ms-1 group flex justify-center items-center hover:text-gray-100 rounded-full w-8 h-8"
                        data-action="unfluent" verse-key="{{$key}}">
                        <i class="fa-regular fa-diamond-exclamation text-sm"></i>
                        <span class="ms-1">0</span>
                    </button>
                </div>
            </div>


            <div role="status" class="skeleton animate-pulse">
                <div class="h-12 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4"></div>
                <div class="h-6 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4"></div>
                <div class="h-4 rounded-lg bg-slate-200 dark:bg-navy-600 mb-4 w-1/4"></div>
            </div>

            <p class="text-container text-2xl lg:text-3xl text-right !leading-[50px]"></p>
            <div class="translation-container text-xs lg:text-base flex justify-content-star mt-1 !leading-5 "></div>

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

        // when click the verse key
        function jumpToVerseSimple(id) {
            let card = $(`.card#${id.replace(':', '\\:')}`)[0];
            $('html, body').animate({
                scrollTop: $(card).offset().top - 80
            }, 500);
        }

        // // create document ready function
        $(document).ready(function () {
            // get last part of url after '/'
            let key = window.location.href.split('/').pop();
            key = key.replace('#', ':');
            jumpToVerse(key);
        });


    </script>
@endonce


