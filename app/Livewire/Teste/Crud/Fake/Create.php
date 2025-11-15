<?php

namespace App\Livewire\Teste\Crud\Fake;

use App\Livewire\Forms\Fake;
use App\Models\Fake as FakeModel;
use Livewire\Component;

class Create extends Component
{
    public Fake $form;
    public bool $showNotify = false;

    public function render()
    {
        return view('livewire.teste.crud.fake.create');
    }

    public function store()
    {
        $this->validate(); //realiza as validações de Form\Fake. Acho que usa Reflection.
        $this->showNotify = (FakeModel::create($this->form->all())) ? true : false ;
    }

    public function redirectTo()
    {
        $this->showNotify = false;
        $this->redirectRoute('fake.homelist');
    }
}
