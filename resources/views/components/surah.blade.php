<a href="{{route('surah.id', ["id" => $index])}}" class="group">
    <div class="px-4 py-3 card hover:bg-teal-100 dark:hover:bg-teal-900">
        <div class="flex justify-between">
            <div class="flex justify-normal items-center">
                <div class="relative flex items-center justify-center">
                    <i class="fa-solid fa-diamond text-4xl text-gray-300 dark:text-gray-600  group-hover:text-teal-500"></i>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <p class="text-gray-600 dark:text-gray-200 text-lg group-hover:text-white">{{$index}}</p>
                    </div>
                </div>
                <div class="ml-3">
                    <div class="text-lg text-gray-600 dark:text-gray-300 font-bold ">{!!$name!!}</div>
                    <div class="text-sm text-gray-500 group-hover:text-teal-500">{!!$meaning!!}</div>
                </div>
            </div>
            <div>
                <div class="text-xl flex justify-end text-gray-800 dark:text-gray-300"><span>{{$arabic}}</span></div>
                <div class="text-sm text-gray-500 flex justify-content-end group-hover:text-teal-500"> {{$verseCount}} {{$verse}}</div>
            </div>
        </div>
    </div>
</a>
