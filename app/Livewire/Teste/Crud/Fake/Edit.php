<?php

namespace App\Livewire\Teste\Crud\Fake;

use App\Livewire\Forms\Fake as FormsFake;
use App\Models\Fake;
use Livewire\Component;

class Edit extends Component
{
    public FormsFake $form;//acessado no front-end com: <input wire:model="form.name" .../>
    public Fake $fake;

    public function render()
    {
        return view('livewire.teste.crud.fake.edit');
    }

    //sempre é chamado antes de render()
    public function mount()
    {
        $this->form->fill($this->fake);//clona os valores dos atributos. Recebe array ou Model.
    }

    //chamado do <form> do front-end.
    public function update()
    {
        $this->validate(); //realiza as validações de Form\Fake. Acho que usa Reflection.
        $this->fake->update($this->form->all());
        return redirect()->route('fake.homelist');
    }
}
