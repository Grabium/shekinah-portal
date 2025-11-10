<?php

namespace App\Livewire\Teste;

use Livewire\Component;

class Validations extends Component
{
    public string $name, $email, $msg;

    public function store()
    {
        //dd($this->name, $this->email);
        //Simlua que dados foram persistidos
        //$this->redirect('/teste-treinaweb/home');
        $this->msg = 
        'Novo cadastro gerado:'.PHP_EOL.
        'Nome: '.$this->name.PHP_EOL.
        'Email: '.$this->email;

    }

    public function render()
    {
        return view('livewire.teste.validations');
    }
}
