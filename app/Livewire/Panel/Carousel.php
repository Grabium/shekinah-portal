<?php

namespace App\Livewire\Panel;

use App\Http\Controllers\Panel\Carousel\CarouselPanelController;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Carousel extends Component
{
    protected Filesystem $disk;
    protected array $photosLinks;
    protected bool $enabledToAdd;

    public function __construct()
    {
        $this->disk = Storage::disk('carousel');
    }

    public function mount()
    {
        if(!Auth::check()){
            die('Nâo autenticado');
        }

        $controller = app(CarouselPanelController::class);
        [$this->photosLinks, $this->enabledToAdd] = $controller->index();
    }

    public function render()
    {
        return view('livewire.panel.carousel', ['photosLinks' => $this->photosLinks, 'enabledToAdd' => $this->enabledToAdd]);
    }

    public function store(Request $request)
    {
        $carouselNames = $this->disk->files();
        $countCarousels = count($carouselNames);

        if(count($carouselNames) >= 12){
            return 'Atingida a quantidade máxima';
        }

        $nameNewCarousel = ($countCarousels+1).'.jpeg';
        $photoAddedName = $this->disk->putFileAs('/',$request->file('carouselAdd'), $nameNewCarousel);

        return $this->render();
            
    }

    public function delete(string $fullName)
    {
        if (!preg_match("/^(([0][1-9])|([1][0-2]))/", $fullName, $match)) {
            dd('Não validado');
        } 

        if (!$this->disk->exists($fullName)) {
            dd('imagem não existe!');
        }

        if(!$this->disk->delete($fullName)){
            dd('Não foi possível deletar '.$fullName);
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

        return $this->render();
    }

    public function download(string $photoName)
    {
        if(!$this->disk->exists($photoName)){
            echo 'get - '.$photoName. ' - NÃO EXISTE';
        }
        
        return $this->disk->download($photoName);//Há um problema com a extenssão INTELEPHENSE aqui. Ignore esse bug.
    }

    public function move(string $photoName, string $sense)
    {
        preg_match("/^((0[1-9])|(1[0-2]))/", $photoName, $match);
        $photoId = (int)$match[0];

        $newName = ($sense == 'INCREMENT') ? ($photoId+1) : ($photoId-1) ;
        $newName = (string)$newName;
        $newName = (strlen($newName) == 1) ? '0'.$newName : $newName;
        $newName .= '.jpeg';

        $aux = "aux_file.jpeg";
        $this->disk->move($newName, $aux);
        $this->disk->move($photoName, $newName);
        $this->disk->move($aux, $photoName);

        to_route('panel.carousel.index');
    }
}
