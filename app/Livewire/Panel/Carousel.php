<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Panel\Carousel\CarouselDownload;
use App\Http\Controllers\Panel\Carousel\CarouselPanelController;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Carousel extends Component
{
    protected array $photosLinks;
    protected bool $enabledToAdd;
    protected CarouselPanelController $controller;

    //deverá ser apagado
    public function __construct()
    {
        $this->controller = app(CarouselPanelController::class);
    }

    public function render()
    {
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        [$this->photosLinks, $this->enabledToAdd] = $this->controller->index();

        return view('livewire.panel.carousel', ['photosLinks' => $this->photosLinks, 'enabledToAdd' => $this->enabledToAdd]);
    }

    public function store(Request $request)
    {
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        try {
            $this->controller->store($request);
        } catch (\Throwable $th) {
            return ['msg' => $th->getMessage()];
        }
        
        return redirect()->route('lw.panel.carousel.index');          
    }

    public function delete(string $fullName)
    {
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        try {
            $this->controller->destroy($fullName);
        } catch (\Throwable $th) {
            return ['msg' => $th->getMessage()];
        }

        return redirect()->route('lw.panel.carousel.index');
    }

    public function download(string $photoName)
    {        
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        try {
            return ($this->controller->download($photoName));
        } catch (\Throwable $th) {
            return ['msg' => $th->getMessage()];
        }
        
        $this->mount();
        
    }

    public function move(string $photoName, string $sense)
    {
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        preg_match("/^((0[1-9])|(1[0-2]))/", $photoName, $match);
        $photoId = (int)$match[0];

        $newName = ($sense == 'INCREMENT') ? ($photoId+1) : ($photoId-1) ;
        $newName = (string)$newName;
        $newName = (strlen($newName) == 1) ? '0'.$newName : $newName;
        $newName .= '.jpeg';

        if(!$this->controller->move($photoName, $newName)){
            return 'Não foi possível alterar a ordem da foto no carrossel.';
        }

        to_route('lw.panel.carousel.index');
    }
}
