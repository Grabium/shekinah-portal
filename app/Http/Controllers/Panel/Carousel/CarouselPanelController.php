<?php

namespace App\Http\Controllers\Panel\Carousel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\LocalFilesystemAdapter;

class CarouselPanelController extends Controller
{
    protected LocalFilesystemAdapter $disk;
    protected int $limiterMax = 12;


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
        $enabledToAdd = (count($carouselNames) < $this->limiterMax);

        $photosLinks = [];
        foreach ($carouselNames as $name) {
            $photosLinks[] = ['link' => 'linkToCarousel/' . $name, 'name' => $name];
        }

        return [$photosLinks, $enabledToAdd];
    }



    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carouselNames = $this->disk->files();
        $countCarousels = count($carouselNames);



        if(count($carouselNames) >= $this->limiterMax){
            throw new \Exception('Atingida a quantidade máxima de fotos para o carrossel.');
        }

        $nameNewCarousel = ($countCarousels+1).'.jpeg';
        $this->disk->putFileAs('/',$request->file('carouselAdd'), $nameNewCarousel);

        return $this->index();
            
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $fullName)
    {

        if (!preg_match("/^(([0][1-9])|([1][0-2]))/", $fullName, $match)) {
            throw new \Exception('Não validado');
        } 

        if (!$this->disk->exists($fullName)) {
            throw new \Exception('imagem não existe!');
        }

        if(!$this->disk->delete($fullName)){
            throw new \Exception('Não foi possível deletar '.$fullName);
        }

        //reordenar os nomes das fotos que restaram aqui.
        foreach($this->disk->files() as $key => $name){
            
            $num = (string)($key+1);
            if(preg_match("/^(([0]$num)|($num))[.]jpeg$/", $name, $match)){
                continue;
            }
            
            $newName = (strlen($num) == 1) ? '0'.$num : $num;
            $newNameWithExtenssion  = $newName.'.jpeg';
            if(!$this->disk->move($name, $newNameWithExtenssion)){
                dd('Erro ao tentar renomear'. $name. ' para ' . $newNameWithExtenssion);
            }
        }

        return $this->index();
    }

    public function move(string $photoName, string $newName):bool
    {
        $aux = "aux_file.jpeg";
        if(!$this->disk->move($newName, $aux)){
            return false;
        }

        if(!$this->disk->move($photoName, $newName)){
            return false;
        }

        if(!$this->disk->move($aux, $photoName)){
            return false;
        }
        return true;
    }

    public function download(string $photoName)
    {
        if(!$this->disk->exists($photoName)){
            throw new \Exception('get - '.$photoName. ' - NÃO EXISTE');
        }

        return $this->disk->download($photoName);
    }
}
