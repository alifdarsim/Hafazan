<?php

namespace App\DTO;

class ChaptersDTO
{
    public int $id;
    public string $revelationPlace;
    public int $revelationOrder;
    public bool $bismillahPre;
    public string $nameSimple;
    public string $nameComplex;
    public string $nameArabic;
    public int $versesCount;
    public array $pages;
    public string $translatedName;

    public function __construct(int $id, string $revelationPlace, int $revelationOrder, bool $bismillahPre, string $nameSimple, string $nameComplex, string $nameArabic, int $versesCount, array $pages, string $translatedName)
    {
        $this->id = $id;
        $this->revelationPlace = $revelationPlace;
        $this->revelationOrder = $revelationOrder;
        $this->bismillahPre = $bismillahPre;
        $this->nameSimple = $nameSimple;
        $this->nameComplex = $nameComplex;
        $this->nameArabic = $nameArabic;
        $this->versesCount = $versesCount;
        $this->pages = $pages;
        $this->translatedName = $translatedName;
    }

}
