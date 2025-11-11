<?php

namespace App\Livewire\Teste\Crud\Fake;

use App\Models\Fake;
use Livewire\Component;

class Homelist extends Component
{
    public $records;
    public $filter;

    public function render()
    {
        $this->records = (empty($this->filter)) ? Fake::all() : Fake::where('name', 'like', "%$this->filter%")->get() ;
        return view('livewire.teste.crud.fake.homelist');
    }

    public function toEdit($fake)
    {
        return redirect()->route('fake.edit', ['fake' => $fake]);
    }
}
