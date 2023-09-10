@extends('layouts.main')

@section('content')
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <x-chapter-header number="{{$id}}" chapter="{!! $chapters[$id-1]->nameSimple !!}"/>

        <div id="verse-container"
             class="text-teal-900 mx-auto mt-8 grid grid-cols-1 col-span-2 w-full max-w-6xl gap-4 sm:gap-5 lg:gap-6">

            <div class="flex justify-end -mb-2">
                <div id="reciteButton" class="px-4 py-1 text-slate-700 dark:text-navy-100 cursor-pointer hover:text-teal-500"><i class="fa-solid fa-play me-2"></i>Recite Surah</div>
            </div>

            @for($v=1; $v<=$chapters[$id-1]->versesCount; $v++)
                <x-verse-container key="{{$id}}:{{$v}}" index="{{$v}}"/>
            @endfor

            <x-surah-bottom-panel index="{{$id}}"/>

        </div>

    </main>

    <x-audio-player chapter="{{$id}}"/>

@endsection

@push('scripts')
    <script>
        // declare global variable for surah id
        window.chapter = {{$id}};
    </script>
    <script type="module" src="{{ Vite::asset('resources/js/view/surah/id.js') }}"></script>
@endpush
