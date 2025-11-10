<?php

namespace App\Livewire\Teste;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Validations extends Component
{
    #[Validate(['required', 'min:3'])] //valida apenas $name
    public $name;

    #[Validate(['required', 'min:3', 'email'])] //valida apenas $email
    public $email;

    /**
     * as propriedades de formulário (name e email) podem ser encapsuladas em outra classe
     * faça: $ php artisan livewire:form Client
     * Um arquivo seria gerado no: App/Livewire/Form/Cliente.php
     * Já nas tags html, pode-se acessar essas propriedades com wire:model="form.name"
     * Crie a variável que representa o formulário: public Client $form;
     * Acesse um array com as propriedades do form: $this->form->all()
     */

    public $msg;

    public function store()
    {


        $this->validate(); //chama o que voi combinado no ANOTATIONS.

        

        //Simlua que dados foram persistidos
        /*
        User::create(['name'=>$this->name,'email'=>$this->email]);
        $this->redirect('/teste-treinaweb/home');
        */

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
