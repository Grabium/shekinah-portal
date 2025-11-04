<?php

namespace App\Http\Controllers\Panel\Carousel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselDownload extends CarouselPanelController
{
        
    public function download(string $photoName)
    {
        //dd($this->disk, $photoName, $this->disk->exists($photoName), Storage::disk('carousel')->download($photoName));
        if(!$this->disk->exists($photoName)){
            echo 'get - '.$photoName. ' - NÃO EXISTE';
        }
        
        return $this->disk->download($photoName);
    }

}
