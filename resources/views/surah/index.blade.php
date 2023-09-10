@extends('layouts.main')
@section('content')

    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div id="verse-container"
             class="text-teal-900 mx-auto mt-8 grid grid-cols-1 col-span-2 w-full max-w-4xl gap-4 sm:gap-5 lg:gap-6">
            <div id="surahContainer" class="grid lg:grid-cols-3 md:grid-cols-2 gap-5">
                @foreach($chapters as $chapter)
                    <x-surah index="{{$chapter->id}}" meaning="{{$chapter->translatedName}}" name="{{$chapter->nameSimple}}"  verse="Ayat" verse-count="{{$chapter->versesCount}}" page="{{$chapter->pages[0]}}" arabic="{{$chapter->nameArabic}}"/>
                @endforeach
            </div>
        </div>
    </main>

@endsection
