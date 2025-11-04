<?php

namespace App\Http\Controllers\Panel\Carousel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselDownload extends CarouselPanelController
{
        
    public function download(string $photoName)
    {
        if(!$this->disk->exists($photoName)){
            echo 'get - '.$photoName. ' - NÃO EXISTE';
        }
        
        return $this->disk->download($photoName);//Há um problema com a extenssão INTELEPHENSE aqui. Ignore esse bug.
    }

}
