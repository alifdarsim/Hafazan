<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Surah extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $index,
        public string $name,
        public string $arabic,
        public string $meaning,
        public string $page,
        public string $verse,
        public string $verseCount,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.surah');
    }
}
