<?php

namespace App\Http\Controllers\Panel\Carousel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
//use function PHPUnit\Framework\matches;

class CarouselPanelController extends Controller
{
    protected Filesystem $disk;

    public function __construct()
    {
        $this->disk = Storage::disk('carousel');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carouselNames = $this->disk->files();
        $enabledToAdd = (count($carouselNames) < 12);

        $photosLinks = [];
        foreach ($carouselNames as $name) {
            $photosLinks[] = ['link' => 'linkToCarousel/' . $name, 'name' => $name];
        }

        return view('components.panel.carousel', ['photosLinks' => $photosLinks, 'enabledToAdd' => $enabledToAdd]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*if(count($this->disk->files()) >= 12){
            return 'Quantidade máxima atingida';
        }*/
        
        dd($this->disk->put('/', $request->file('carouselAdd')));
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $fullName)
    {

        if (!preg_match("/^(([0][1-9])|([1][0-2]))/", $fullName, $match)) {
            dd('Não validado');
        }
        $name = $match[0];

        $existsBefore = $this->disk->exists($fullName);
        if (!$existsBefore) {
            dd('imagem não existe!');
        }
        $this->disk->delete($fullName);

        return $this->index();
    }
}
