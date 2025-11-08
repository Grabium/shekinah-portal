<?php

namespace App\Livewire\Teste;

use Livewire\Component;
use Faker\Factory;

class Teste extends Component
{
    public array $dataExemple = [];
    public string $filter;


    public function render()
    {
        $this->dataBaseExemple();
        $this->filter();
        return view('livewire.teste.teste');
    }

    private function dataBaseExemple()
    {
        $this->dataExemple = [
            ['titulo' => 'Grão-mestre',
            'fullName' => 'Sub-zero'],

            ['titulo' => 'Samurai',
            'fullName' => 'Scorpion'],

            ['titulo' => 'Policial',
            'fullName' => 'Sonya Cage'],

            ['titulo' => 'Monge Chaolin',
            'fullName' => 'Liu Kang'],

            ['titulo' => 'Samurai',
            'fullName' => 'Shao Kan'],

            ['titulo' => 'Traficante',
            'fullName' => 'Kano'],

            ['titulo' => 'Deus Do Trovão',
            'fullName' => 'Raiden'],

            ['titulo' => 'Ator',
            'fullName' => 'Jonhy Cage'],
        ];
    }

    //geração de dados LoremImpsun, recarregam dados diferentes a cada chamada.
    private function getArrayRandom(int $sizeOfArray)
    {
        $this->dataExemple = array_fill(0, $sizeOfArray, null);
        $faker = Factory::create('pt_BR');

        foreach($this->dataExemple as $key => $value){
            $this->dataExemple[$key] = [
                'titulo' => $faker->sentence(5),
                'fullName' => $faker->words(3, true)
            ];
        }
    }

    private function filter()
    {
        if(empty($this->filter)){
            return;
        }

        $filtereds = [];
        foreach($this->dataExemple as $k => $v){
            if(preg_match('/'.strtolower($this->filter).'/', strtolower($v['fullName']), $match)){
                $filtereds[] = $v;
            }
        }
        
        $this->dataExemple = $filtereds;
    }
}
