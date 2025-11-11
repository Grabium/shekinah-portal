<?php

namespace App\Livewire\Teste\Crud\Fake;

use App\Livewire\Forms\Fake;
use App\Models\Fake as FakeModel;
use Livewire\Component;

class Create extends Component
{
    public Fake $form;

    public function render()
    {
        return view('livewire.teste.crud.fake.create');
    }

    public function store()
    {
        $this->validate(); //realiza as validações de Form\Fake. Acho que usa Reflection.
        FakeModel::create($this->form->all());

        $this->redirectRoute('fake.homelist');
    }
}
